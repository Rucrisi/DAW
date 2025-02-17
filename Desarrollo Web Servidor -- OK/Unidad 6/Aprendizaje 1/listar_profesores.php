<?php
require("conexionBD.php");

// Consultar la tabla Profesores
$sql = "SELECT * FROM Profesores";
$resultado = $conn->query($sql);

echo "<h1>Listado de Profesores</h1>";
if ($resultado->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Asignaturas</th></tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['nombre'] . "</td>";
        echo "<td>" . $fila['apellidos'] . "</td>";
        echo "<td>" . $fila['asignaturas'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay profesores registrados.";
}

// Cerrar la conexión
$conn->close();
?>
