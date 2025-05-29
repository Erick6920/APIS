<?php
header("Content-Type: application/json");
require 'db.php';

$sql = "SELECT * FROM kpis";
$result = $conn->query($sql);

$rows = array();
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

echo json_encode($rows, JSON_UNESCAPED_UNICODE);
$conn->close();
?>
