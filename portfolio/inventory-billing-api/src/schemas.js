import { z } from 'zod';

export const productSchema = z.object({
  sku: z.string().min(2).max(50),
  name: z.string().min(2).max(160),
  price: z.number().nonnegative(),
  quantity: z.number().int().nonnegative().default(0),
  lowStockThreshold: z.number().int().nonnegative().default(5)
});

export const movementSchema = z.object({
  productId: z.string().uuid(),
  type: z.enum(['IN', 'OUT', 'ADJUSTMENT']),
  quantity: z.number().int().positive(),
  note: z.string().max(250).optional()
});

export const customerSchema = z.object({
  name: z.string().min(2).max(160),
  email: z.string().email(),
  phone: z.string().max(40).optional()
});

export const invoiceSchema = z.object({
  customerId: z.string().uuid(),
  items: z.array(
    z.object({
      productId: z.string().uuid(),
      quantity: z.number().int().positive()
    })
  ).min(1),
  taxRate: z.number().min(0).max(1).default(0.2)
});
