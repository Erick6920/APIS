<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>KPI CRUD</title>
</head>
 
<body>
<h2>Lista de KPIs</h2>
<a href="create.php">Agregar nuevo KPI</a>
<table border="1">
  <tr>
    <th>Nombre KPI</th>
    <th>Responsable</th>
    <th>2024</th>
    <th>2025</th>
    <th>Acciones</th>
  </tr>
  <?php
    $result = $conn->query("SELECT * FROM kpis");
    while ($row = $result->fetch_assoc()):
  ?>
  <tr>
    <td><?= $row['nombre_kpi'] ?></td>
    <td><?= $row['responsable'] ?></td>
    <td><?= $row['anio_2024'] ?></td>
    <td><?= $row['anio_2025'] ?></td>
    <td>
    <a href="edit.php?id=<?= $row['id'] ?>">Editar</a>

      <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este KPI?');">Eliminar</a>

    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>
