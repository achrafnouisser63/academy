import { JSONFilePreset } from 'lowdb/node';

const defaultData = {
  products: [],
  customers: [],
  stockMovements: [],
  invoices: []
};

export const db = await JSONFilePreset('db.json', defaultData);
