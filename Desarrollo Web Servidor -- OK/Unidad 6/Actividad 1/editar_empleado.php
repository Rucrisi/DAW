<?php
require("conexionBD.php");

// Verificar si se recibió el ID del empleado
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM empleados WHERE id = $id";
    $resultado = $conn->query($sql);
    $empleado = $resultado->fetch_assoc();
} else {
    die("ID no especificado.");
}

// Guardar los cambios al enviar el formulario y volver
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $cargo = $_POST['cargo'];
    $sueldo_bruto_anual = $_POST['sueldo_bruto_anual'];

    $sql = "UPDATE empleados SET nombre = '$nombre', apellidos = '$apellidos', edad = '$edad' , cargo = '$cargo' , sueldo_bruto_anual = '$sueldo_bruto_anual' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado actualizado exitosamente.";
    } else {
        echo "Error al actualizar empleado: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empleado</title>
</head>
<body>
    <h1>Editar Empleado</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?= $empleado['nombre'] ?>" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?= $empleado['apellidos'] ?>" required><br><br>

        <label for="edad">Edad:</label><br>
        <input type="text" id="edad" name="edad"  min="18" max="100" value="<?= $empleado['edad'] ?>" required><br><br>

        <label for="cargo">Cargo:</label><br>
        <input type="text" id="cargo" name="cargo" value="<?= $empleado['cargo'] ?>" required><br><br>

        <label for="sueldo_bruto_anual">Sueldo Bruto Anual:</label><br>
        <input type="text" id="sueldo_bruto_anual" name="sueldo_bruto_anual" step="0.01" min="0" value="<?= $empleado['sueldo_bruto_anual'] ?>" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <!-- Botón para regresar al listado -->
    <br>
    <a href="principal_empleados.php">
        <button>Volver al Listado</button>
    </a>
</body>
</html>
