const express = require('express');
const mysql = require('mysql2');
const cors = require('cors');



const app = express();
app.use(cors());
const PORT = process.env.PORT || 3000;

// Configuración de la conexión a la base de datos en Hostinger
const dbConfig = {
    host: '151.106.97.147',
    user: 'u777467137_Erick_d',
    password: 'Tramontyna56',
    database: 'u777467137_E_Sql'
};



// Ruta para obtener datos de la tabla kpis
app.get('/', (req, res) => {
    const connection = mysql.createConnection(dbConfig);

    connection.query('SELECT * FROM kpis', (error, results) => {
        if (error) {
            console.error('Error al obtener datos:', error);
            res.status(500).json({ error: 'Error al obtener datos' });
        } else {
            res.json(results);
        }
        connection.end();
    });
});


app.listen(PORT, () => {
    console.log(`Servidor corriendo en el puerto ${PORT}`);
});
