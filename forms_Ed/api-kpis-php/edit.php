<?php
require 'db.php';

if (!isset($_GET['id'])) {
    die("ID no especificado.");
}

$id = $_GET['id'];

// Obtener los datos actuales
$stmt = $conn->prepare("SELECT * FROM kpis WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$kpi = $result->fetch_assoc();

if (!$kpi) {
    die("KPI no encontrado.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar KPI</title>
</head>
<body>
    <h2>Editar KPI</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $kpi['id'] ?>">

        <label>Etapa del Journey:</label><br>
        <input type="text" name="etapa_journey" value="<?= $kpi['etapa_journey'] ?>"><br><br>

        <label>Gestión:</label><br>
        <input type="text" name="gestion" value="<?= $kpi['gestion'] ?>"><br><br>

        <label>Nombre KPI:</label><br>
        <input type="text" name="nombre_kpi" value="<?= $kpi['nombre_kpi'] ?>"><br><br>

        <label>Definición de KPI:</label><br>
        <textarea name="definicion_kpi"><?= $kpi['definicion_kpi'] ?></textarea><br><br>

        <label>Fórmula KPI:</label><br>
        <textarea name="formula_kpi"><?= $kpi['formula_kpi'] ?></textarea><br><br>

        <label>Frecuencia de medición:</label><br>
        <input type="text" name="frecuencia_medicion" value="<?= $kpi['frecuencia_medicion'] ?>"><br><br>

        <label>Frecuencia de presentación:</label><br>
        <input type="text" name="frecuencia_presentacion" value="<?= $kpi['frecuencia_presentacion'] ?>"><br><br>

        <label>Espacio de presentación:</label><br>
        <input type="text" name="espacio_presentacion" value="<?= $kpi['espacio_presentacion'] ?>"><br><br>

        <label>Responsable:</label><br>
        <input type="text" name="responsable" value="<?= $kpi['responsable'] ?>"><br><br>

        <label>Personal Responsable:</label><br>
        <input type="text" name="personal_responsable" value="<?= $kpi['personal_responsable'] ?>"><br><br>

        <label>Fuente de datos:</label><br>
        <input type="text" name="fuente_datos" value="<?= $kpi['fuente_datos'] ?>"><br><br>

        <label>Tablas origen:</label><br>
        <input type="text" name="tablas_origen" value="<?= $kpi['tablas_origen'] ?>"><br><br>

        <label>Prioridad:</label><br>
        <input type="text" name="prioridad" value="<?= $kpi['prioridad'] ?>"><br><br>

        <label>Sistema asociado:</label><br>
        <input type="text" name="sistema_asociado" value="<?= $kpi['sistema_asociado'] ?>"><br><br>

        <label>Sede:</label><br>
        <input type="text" name="sede" value="<?= $kpi['sede'] ?>"><br><br>

        <label>Tipo de Indicador:</label><br>
        <input type="text" name="tipo_indicador" value="<?= $kpi['tipo_indicador'] ?>"><br><br>

        <label>Evaluación de Desempeño:</label><br>
        <textarea name="evaluacion_desempeno"><?= $kpi['evaluacion_desempeno'] ?></textarea><br><br>

        <label>Año 2024:</label><br>
        <input type="text" name="anio_2024" value="<?= $kpi['anio_2024'] ?>"><br><br>

        <label>Año 2025:</label><br>
        <input type="text" name="anio_2025" value="<?= $kpi['anio_2025'] ?>"><br><br>

        <button type="submit">Actualizar KPI</button>
    </form>
</body>
</html>
