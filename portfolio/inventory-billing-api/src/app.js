import express from 'express';
import cors from 'cors';
import helmet from 'helmet';
import morgan from 'morgan';
import { randomUUID } from 'node:crypto';
import { db } from './db.js';
import {
  customerSchema,
  invoiceSchema,
  movementSchema,
  productSchema
} from './schemas.js';

const app = express();
app.use(helmet());
app.use(cors());
app.use(express.json());
app.use(morgan('combined'));

const fail = (res, error) =>
  res.status(422).json({ error: 'validation_error', details: error.flatten?.() ?? error });

app.get('/health', (_req, res) => {
  res.json({ status: 'ok', service: 'inventory-billing-api' });
});

app.get('/api/products', (_req, res) => {
  res.json(db.data.products);
});

app.post('/api/products', async (req, res) => {
  const parsed = productSchema.safeParse(req.body);
  if (!parsed.success) return fail(res, parsed.error);

  if (db.data.products.some((product) => product.sku === parsed.data.sku)) {
    return res.status(409).json({ error: 'sku_already_exists' });
  }

  const product = {
    id: randomUUID(),
    ...parsed.data,
    createdAt: new Date().toISOString()
  };

  db.data.products.push(product);
  await db.write();

  res.status(201).json(product);
});

app.get('/api/products/low-stock', (_req, res) => {
  const products = db.data.products.filter(
    (product) => product.quantity <= product.lowStockThreshold
  );
  res.json(products);
});

app.post('/api/stock-movements', async (req, res) => {
  const parsed = movementSchema.safeParse(req.body);
  if (!parsed.success) return fail(res, parsed.error);

  const product = db.data.products.find((item) => item.id === parsed.data.productId);
  if (!product) return res.status(404).json({ error: 'product_not_found' });

  const delta =
    parsed.data.type === 'IN'
      ? parsed.data.quantity
      : parsed.data.type === 'OUT'
        ? -parsed.data.quantity
        : parsed.data.quantity - product.quantity;

  if (product.quantity + delta < 0) {
    return res.status(409).json({ error: 'insufficient_stock' });
  }

  product.quantity += delta;

  const movement = {
    id: randomUUID(),
    ...parsed.data,
    previousQuantity: product.quantity - delta,
    newQuantity: product.quantity,
    createdAt: new Date().toISOString()
  };

  db.data.stockMovements.push(movement);
  await db.write();

  res.status(201).json(movement);
});

app.post('/api/customers', async (req, res) => {
  const parsed = customerSchema.safeParse(req.body);
  if (!parsed.success) return fail(res, parsed.error);

  const customer = {
    id: randomUUID(),
    ...parsed.data,
    createdAt: new Date().toISOString()
  };

  db.data.customers.push(customer);
  await db.write();

  res.status(201).json(customer);
});

app.get('/api/invoices', (_req, res) => {
  res.json(db.data.invoices);
});

app.post('/api/invoices', async (req, res) => {
  const parsed = invoiceSchema.safeParse(req.body);
  if (!parsed.success) return fail(res, parsed.error);

  const customer = db.data.customers.find(
    (item) => item.id === parsed.data.customerId
  );
  if (!customer) return res.status(404).json({ error: 'customer_not_found' });

  const lines = [];

  for (const item of parsed.data.items) {
    const product = db.data.products.find((row) => row.id === item.productId);
    if (!product) return res.status(404).json({ error: 'product_not_found', productId: item.productId });
    if (product.quantity < item.quantity) {
      return res.status(409).json({ error: 'insufficient_stock', productId: item.productId });
    }

    lines.push({
      productId: product.id,
      sku: product.sku,
      description: product.name,
      quantity: item.quantity,
      unitPrice: product.price,
      lineTotal: Number((product.price * item.quantity).toFixed(2))
    });
  }

  const subtotal = Number(lines.reduce((sum, line) => sum + line.lineTotal, 0).toFixed(2));
  const tax = Number((subtotal * parsed.data.taxRate).toFixed(2));
  const total = Number((subtotal + tax).toFixed(2));

  for (const line of lines) {
    const product = db.data.products.find((row) => row.id === line.productId);
    product.quantity -= line.quantity;

    db.data.stockMovements.push({
      id: randomUUID(),
      productId: product.id,
      type: 'OUT',
      quantity: line.quantity,
      note: 'Automatic stock movement from invoice',
      previousQuantity: product.quantity + line.quantity,
      newQuantity: product.quantity,
      createdAt: new Date().toISOString()
    });
  }

  const invoice = {
    id: randomUUID(),
    number: `INV-${new Date().getFullYear()}-${String(db.data.invoices.length + 1).padStart(5, '0')}`,
    customer,
    lines,
    subtotal,
    taxRate: parsed.data.taxRate,
    tax,
    total,
    status: 'issued',
    issuedAt: new Date().toISOString()
  };

  db.data.invoices.push(invoice);
  await db.write();

  res.status(201).json(invoice);
});

app.get('/api/dashboard', (_req, res) => {
  const stockValue = db.data.products.reduce(
    (sum, product) => sum + product.price * product.quantity,
    0
  );
  const revenue = db.data.invoices.reduce((sum, invoice) => sum + invoice.total, 0);
  const lowStockCount = db.data.products.filter(
    (product) => product.quantity <= product.lowStockThreshold
  ).length;

  res.json({
    products: db.data.products.length,
    customers: db.data.customers.length,
    invoices: db.data.invoices.length,
    lowStockCount,
    stockValue: Number(stockValue.toFixed(2)),
    revenue: Number(revenue.toFixed(2))
  });
});

const port = process.env.PORT || 3000;
app.listen(port, () => {
  console.log(`Inventory & Billing API listening on port ${port}`);
});
