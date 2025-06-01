const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');

const app = express();
app.use(cors());

const PORT = process.env.PORT || 3000;

// ✅ Crear pool de conexión UNA VEZ al iniciar
const pool = mysql.createPool({
  host: '151.106.110.1',
  user: 'u777467137_Erick_d',
  password: 'Tramontyna56',
  database: 'u777467137_E_Sql'
});

// ✅ Probar conexión al iniciar (opcional pero recomendable)
pool.getConnection((err, connection) => {
  if (err) {
    console.error('❌ Error al conectar a la base de datos:', err.message);
    process.exit(1); // Detiene el servidor si hay error
  } else {
    console.log('✅ Conectado exitosamente a la base de datos');
    connection.release();
  }
});

// ✅ Ruta principal para obtener datos
app.get('/', (req, res) => {
  pool.query('SELECT * FROM kpis', (error, results) => {
    if (error) {
      console.error('Error al obtener datos:', error);
      res.status(500).json({ error: 'Error al obtener datos' });
    } else {
      res.json(results);
    }
  });
});

// ✅ Iniciar el servidor
app.listen(PORT, () => {
  console.log(`🚀 Servidor corriendo en el puerto ${PORT}`);
});
