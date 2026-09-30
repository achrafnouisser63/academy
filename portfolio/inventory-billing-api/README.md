# Inventory & Billing API

A business-oriented REST API for **stock management, inventory movements, customer records and invoicing**, built with Node.js and Express.

## Business Features

- Product and SKU management
- Real-time stock quantities
- IN / OUT / ADJUSTMENT stock movements
- Low-stock alerts
- Customer management
- Invoice generation with multiple line items
- Automatic stock deduction when an invoice is issued
- Tax, subtotal and total calculations
- Sequential human-readable invoice numbers
- Dashboard KPIs for stock value, revenue and low-stock products
- Input validation with Zod
- Security headers with Helmet
- Structured request logging

## API Endpoints

| Method | Endpoint | Purpose |
| --- | --- | --- |
| GET | `/health` | Service health |
| GET | `/api/products` | List products |
| POST | `/api/products` | Create product |
| GET | `/api/products/low-stock` | Low-stock report |
| POST | `/api/stock-movements` | Register inventory movement |
| POST | `/api/customers` | Create customer |
| GET | `/api/invoices` | List invoices |
| POST | `/api/invoices` | Issue invoice and reduce stock |
| GET | `/api/dashboard` | Business KPIs |

## Tech Stack

- Node.js 18+
- Express
- LowDB JSON persistence
- Zod
- Helmet
- CORS
- Morgan

## Run Locally

```bash
cd portfolio/inventory-billing-api
npm install
npm run dev
```

The API starts at `http://localhost:3000`.

## Example Product

```json
{
  "sku": "LAPTOP-001",
  "name": "Business Laptop",
  "price": 899.90,
  "quantity": 12,
  "lowStockThreshold": 3
}
```

## Example Invoice

```json
{
  "customerId": "CUSTOMER_UUID",
  "taxRate": 0.2,
  "items": [
    {
      "productId": "PRODUCT_UUID",
      "quantity": 2
    }
  ]
}
```

## Portfolio Value

This project demonstrates backend business logic that is common in ERP and SME software: inventory integrity, billing calculations, validation, reporting and REST API design.

**Author:** Achraf Nouisser  
GitHub: https://github.com/achrafnouisser63
