const express = require('express');
const fs = require('fs');
const cors = require('cors');
const app = express();
const PORT = 3000;

// Middleware
app.use(cors());
app.use(express.json());

// Ambil data produk dari file
const getProducts = () => {
  const data = fs.readFileSync('./products.json', 'utf-8');
  return JSON.parse(data);
};

// Tampilkan semua produk atau filter berdasarkan kategori
app.get('/api/products', (req, res) => {
  const category = req.query.category;
  let products = getProducts();

  if (category) {
    products = products.filter(p => p.category === category);
  }

  res.json(products);
});

// Tambah produk baru
app.post('/api/products', (req, res) => {
  const products = getProducts();
  const newProduct = req.body;

  if (!newProduct.name || !newProduct.price || !newProduct.category) {
    return res.status(400).json({ error: 'Data produk tidak lengkap' });
  }

  newProduct.id = Date.now();
  products.push(newProduct);
  fs.writeFileSync('./products.json', JSON.stringify(products, null, 2));
  res.status(201).json({ message: 'Produk berhasil ditambahkan', product: newProduct });
});

// Jalankan server
app.listen(PORT, () => {
  console.log(`Server berjalan di http://localhost:${PORT}`);
});
