<?php
require 'db.php'; // Incluye la conexión

// Prepara la sentencia
$stmt = $conn->prepare("
    INSERT INTO kpis (
        etapa_journey, gestion, nombre_kpi, definicion_kpi, formula_kpi,
        frecuencia_medicion, frecuencia_presentacion, espacio_presentacion,
        responsable, personal_responsable, fuente_datos, tablas_origen,
        prioridad, sistema_asociado, sede, tipo_indicador, evaluacion_desempeno,
        anio_2024, anio_2025
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
");

// Verifica si se preparó correctamente
if (!$stmt) {
    die("Error en la preparación: " . $conn->error);
}

// Asocia los parámetros
$stmt->bind_param(
    "sssssssssssssssssss",
    $_POST['etapa_journey'],
    $_POST['gestion'],
    $_POST['nombre_kpi'],
    $_POST['definicion_kpi'],
    $_POST['formula_kpi'],
    $_POST['frecuencia_medicion'],
    $_POST['frecuencia_presentacion'],
    $_POST['espacio_presentacion'],
    $_POST['responsable'],
    $_POST['personal_responsable'],
    $_POST['fuente_datos'],
    $_POST['tablas_origen'],
    $_POST['prioridad'],
    $_POST['sistema_asociado'],
    $_POST['sede'],
    $_POST['tipo_indicador'],
    $_POST['evaluacion_desempeno'],
    $_POST['anio_2024'],
    $_POST['anio_2025']
);

// Ejecuta la inserción
if ($stmt->execute()) {
    header("Location: index.php");
    exit(); // Asegura que no se ejecute más código
} else {
    echo "❌ Error al guardar KPI: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>