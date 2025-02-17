<?php
require("conexionBD.php");

// Verificar si se recibió el ID del empleado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurarse de que el ID sea un número

    // Consultar los datos del empleado
    $sql = "SELECT * FROM Empleados WHERE id = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Si el empleado existe, obtener los datos
        $empleado = $resultado->fetch_assoc();
    } else {
        echo "<p>Empleado no encontrado.</p>";
        exit();
    }
} else {
    die("ID no especificado.");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Empleado</title>
</head>
<body>
    <h1>Detalle del Empleado</h1>

    <table border="1" cellspacing="2" cellpadding="5">
        <tr>
            <th>ID</th>
            <td><?= $empleado['id'] ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= $empleado['nombre'] ?></td>
        </tr>
        <tr>
            <th>Apellidos</th>
            <td><?= $empleado['apellidos'] ?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?= $empleado['edad'] ?></td>
        </tr>
        <tr>
            <th>Cargo</th>
            <td><?= $empleado['cargo'] ?></td>
        </tr>
        <tr>
            <th>Sueldo Bruto Anual</th>
            <td><?= $empleado['sueldo_bruto_anual'] ?></td>
        </tr>
    </table>

<!-- Botones de interacción -->
<br>
<a href="editar_empleado.php?id=<?= $empleado['id'] ?>">
    <button>Editar</button>
</a>

<a href="eliminar_empleado.php?id=<?= $empleado['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
    <button>Eliminar</button>
</a>

<a href="principal_empleados.php">
    <button>Volver al Listado</button>
</a>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
