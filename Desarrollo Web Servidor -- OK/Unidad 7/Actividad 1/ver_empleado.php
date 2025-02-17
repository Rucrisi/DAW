<?php
require_once("clases.php");
require("conexionBD.php");

// Verificar si se recibió el ID del empleado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurarse de que el ID sea un número

    // Consultar los datos del empleado
    $sql = "SELECT * FROM empleados WHERE id = $id";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        // Si el empleado existe, obtener los datos
        $empleadoData = $resultado->fetch_assoc();

        // Crear la instancia correspondiente según el cargo del empleado
        switch ($empleadoData['cargo']) {
            case 'Recursos Humanos':
                $empleado = new RecursosHumanos(
                    $empleadoData['id'],
                    $empleadoData['nombre'],
                    $empleadoData['apellidos'],
                    $empleadoData['edad'],
                    $empleadoData['sueldo_bruto_anual'],
                    $empleadoData['sueldo_base']
                );
                break;
            case 'Marketing':
                $empleado = new Marketing(
                    $empleadoData['id'],
                    $empleadoData['nombre'],
                    $empleadoData['apellidos'],
                    $empleadoData['edad'],
                    $empleadoData['sueldo_bruto_anual'],
                    $empleadoData['sueldo_base']
                );
                break;
            case 'Atención al Cliente':
                $empleado = new AtencionAlCliente(
                    $empleadoData['id'],
                    $empleadoData['nombre'],
                    $empleadoData['apellidos'],
                    $empleadoData['edad'],
                    $empleadoData['sueldo_bruto_anual'],
                    $empleadoData['sueldo_base']
                );
                break;
            default:
                die("Cargo no válido.");
        }
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
            <td><?= $empleadoData['id'] ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= $empleadoData['nombre'] ?></td>
        </tr>
        <tr>
            <th>Apellidos</th>
            <td><?= $empleadoData['apellidos'] ?></td>
        </tr>
        <tr>
            <th>Edad</th>
            <td><?= $empleadoData['edad'] ?></td>
        </tr>
        <tr>
            <th>Cargo</th>
            <td><?= $empleadoData['cargo'] ?></td>
        </tr>
        <tr>
            <th>Sueldo Bruto Anual</th>
            <td><?= $empleadoData['sueldo_bruto_anual'] ?></td>
        </tr>
    </table>

<!-- Botones de interacción -->
<br>
<a href="editar_empleado.php?id=<?= $empleadoData['id'] ?>">
    <button>Editar</button>
</a>

<a href="eliminar_empleado.php?id=<?= $empleadoData['id'] ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?');">
    <button>Eliminar</button>
</a>

<a href="listado_empleados.php">
    <button>Volver al Listado</button>
</a>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>