<!DOCTYPE html>
<html>
<head>
    <title>Agregar KPI</title>
</head>
<body>
    <h2>Agregar nuevo KPI</h2>
    <form action="store.php" method="POST">
        <label>Etapa del Journey:</label><br>
        <input type="text" name="etapa_journey" required><br><br>

        <label>Gestión:</label><br>
        <input type="text" name="gestion" required><br><br>

        <label>Nombre KPI:</label><br>
        <input type="text" name="nombre_kpi" required><br><br>

        <label>Definición de KPI:</label><br>
        <textarea name="definicion_kpi" required></textarea><br><br>

        <label>Fórmula KPI:</label><br>
        <textarea name="formula_kpi" required></textarea><br><br>

        <label>Frecuencia de medición:</label><br>
        <input type="text" name="frecuencia_medicion"><br><br>

        <label>Frecuencia de presentación:</label><br>
        <input type="text" name="frecuencia_presentacion"><br><br>

        <label>Espacio de presentación:</label><br>
        <input type="text" name="espacio_presentacion"><br><br>

        <label>Responsable:</label><br>
        <input type="text" name="responsable"><br><br>

        <label>Personal Responsable:</label><br>
        <input type="text" name="personal_responsable"><br><br>

        <label>Fuente de datos:</label><br>
        <input type="text" name="fuente_datos"><br><br>

        <label>Tablas origen:</label><br>
        <input type="text" name="tablas_origen"><br><br>

        <label>Prioridad:</label><br>
        <input type="text" name="prioridad"><br><br>

        <label>Sistema asociado:</label><br>
        <input type="text" name="sistema_asociado"><br><br>

        <label>Sede:</label><br>
        <input type="text" name="sede"><br><br>

        <label>Tipo de Indicador:</label><br>
        <input type="text" name="tipo_indicador"><br><br>

        <label>Evaluación de Desempeño:</label><br>
        <textarea name="evaluacion_desempeno"></textarea><br><br>

        <label>Año 2024:</label><br>
        <input type="text" name="anio_2024"><br><br>

        <label>Año 2025:</label><br>
        <input type="text" name="anio_2025"><br><br>

        <button type="submit">Guardar KPI</button>
    </form>
</body>
</html>
