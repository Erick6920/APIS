<?php
$host = '151.106.97.147';
$db = 'u777467137_E_Sql';
$user = 'u777467137_Erick_d';
$pass = 'Tramontyna56';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
