// api-kpis/app.js
const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');
const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());

// Conexión a la base de datos de Hostinger
const db = mysql.createConnection({
  host: 'sqlXXX.main-hosting.eu', // <-- Reemplaza esto por tu host real
  user: 'u123456789_user',        // <-- Reemplaza por tu usuario
  password: 'tu_contraseña',         // <-- Reemplaza por tu password
  database: 'u123456789_mibd'     // <-- Reemplaza por tu BD
});

db.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err.message);
  } else {
    console.log('Conexión exitosa a la base de datos.');
  }
});

// Ruta para obtener todos los KPIs
app.get('/kpis', (req, res) => {
  db.query('SELECT * FROM kpis', (err, results) => {
    if (err) {
      return res.status(500).json({ error: err.message });
    }
    res.json(results);
  });
});

app.listen(PORT, () => {
  console.log(`API escuchando en el puerto ${PORT}`);
});
