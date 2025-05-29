
const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');
const app = express();
const PORT = process.env.PORT || 3000;

app.use(cors());


const db = mysql.createConnection({
$host = '151.106.97.147';
$db = 'u777467137_E_Sql';
$user = 'u777467137_Erick_d';
$pass = 'Tramontyna56';
});

db.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err.message);
  } else {
    console.log('Conexión exitosa a la base de datos.');
  }
});

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
