<?php
require("conexionBD.php");

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $cargo = $_POST['cargo'];
    $sueldo_bruto_anual = $_POST['sueldo_bruto_anual'];

    // Insertar en la base de datos
    $sql_insert = "INSERT INTO empleados (nombre, apellidos, edad, cargo, sueldo_bruto_anual) VALUES ('$nombre', '$apellidos', '$edad', '$cargo', '$sueldo_bruto_anual')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Nuevo empleado añadido exitosamente.</p>";
        // Redireccionar al listado
        header("Location: listar_empleados.php");
        exit();
    } else {
        echo "<p>Error al añadir empleado: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empleado</title>
</head>
<body>
    <h1>Agregar Nuevo Empleado</h1>

    <!-- Formulario para agregar empleado -->
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="edad">Edad:</label><br>
        <input type="number" id="edad" name="edad" min="18" max="100" required><br><br>

        <label for="cargo">Cargo:</label><br>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="sueldo_bruto_anual">Sueldo Bruto Anual:</label><br>
        <input type="number" id="sueldo_bruto_anual" name="sueldo_bruto_anual" step="0.01" min="0" required><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <!-- Botón para regresar al listado -->
    <br>
    <a href="principal_empleados.php">
        <button>Volver al Listado</button>
    </a>
</body>
</html>
<?php
$conn->close();
?>
