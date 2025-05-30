const axios = require('axios');
const mssql = require('mssql');

const config = {
    user: 'tu_usuario_sql_server',
    password: 'tu_password_sql_server',
    server: 'localhost', // O la IP si es remoto
    database: 'TuBaseDeDatos',
    options: {
        encrypt: false, // Cambia a true si usas Azure o TLS
        trustServerCertificate: true
    }
};

async function migrateData() {
    try {
        // 1. Traer datos de la API en Render
        const response = await axios.get('https://tu-app-en-render.onrender.com/datos');
        const datos = response.data;

        // 2. Conectar a SQL Server local
        const pool = await mssql.connect(config);

        for (const row of datos) {
            await pool.request()
                .input('etapa_journey', mssql.NVarChar(255), row.etapa_journey)
                .input('gestion', mssql.NVarChar(255), row.gestion)
                .input('nombre_kpi', mssql.NVarChar(255), row.nombre_kpi)
                .input('definicion_kpi', mssql.NVarChar(mssql.MAX), row.definicion_kpi)
                .input('formula_kpi', mssql.NVarChar(mssql.MAX), row.formula_kpi)
                .input('frecuencia_medicion', mssql.NVarChar(255), row.frecuencia_medicion)
                .input('frecuencia_presentacion', mssql.NVarChar(255), row.frecuencia_presentacion)
                .input('espacio_presentacion', mssql.NVarChar(255), row.espacio_presentacion)
                .input('responsable', mssql.NVarChar(255), row.responsable)
                .input('personal_responsable', mssql.NVarChar(255), row.personal_responsable)
                .input('fuente_datos', mssql.NVarChar(255), row.fuente_datos)
                .input('tablas_origen', mssql.NVarChar(255), row.tablas_origen)
                .input('prioridad', mssql.NVarChar(50), row.prioridad)
                .input('sistema_asociado', mssql.NVarChar(255), row.sistema_asociado)
                .input('sede', mssql.NVarChar(100), row.sede)
                .input('tipo_indicador', mssql.NVarChar(100), row.tipo_indicador)
                .input('evaluacion_desempeno', mssql.NVarChar(mssql.MAX), row.evaluacion_desempeno)
                .input('anio_2024', mssql.NVarChar(50), row.anio_2024)
                .input('anio_2025', mssql.NVarChar(50), row.anio_2025)
                .query(`
                    INSERT INTO kpis (
                        etapa_journey, gestion, nombre_kpi, definicion_kpi, formula_kpi,
                        frecuencia_medicion, frecuencia_presentacion, espacio_presentacion,
                        responsable, personal_responsable, fuente_datos, tablas_origen,
                        prioridad, sistema_asociado, sede, tipo_indicador,
                        evaluacion_desempeno, anio_2024, anio_2025
                    ) VALUES (
                        @etapa_journey, @gestion, @nombre_kpi, @definicion_kpi, @formula_kpi,
                        @frecuencia_medicion, @frecuencia_presentacion, @espacio_presentacion,
                        @responsable, @personal_responsable, @fuente_datos, @tablas_origen,
                        @prioridad, @sistema_asociado, @sede, @tipo_indicador,
                        @evaluacion_desempeno, @anio_2024, @anio_2025
                    )
                `);
        }

        console.log('Migración completada correctamente.');
        await pool.close();
    } catch (error) {
        console.error('Error durante la migración:', error);
    }
}

migrateData();
