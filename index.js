require('dotenv').config();
const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

const PORT = process.env.PORT || 3000;

const pool = mysql.createPool({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_NAME
});

// Probar conexión al iniciar
pool.getConnection((err, connection) => {
    if (err) {
        console.error('Error de conexión a MySQL:', err);
        process.exit(1);
    } else {
        console.log('Conexión a MySQL exitosa');
        connection.release();
    }
});

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

app.listen(PORT, () => {
    console.log(`Servidor corriendo en el puerto ${PORT}`);
});
