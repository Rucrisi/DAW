<?php
require("conexionBD.php");

// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $asignaturas = $_POST['asignaturas'];

    // Insertar en la base de datos
    $sql_insert = "INSERT INTO Profesores (nombre, apellidos, asignaturas) VALUES ('$nombre', '$apellidos', '$asignaturas')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<p>Nuevo profesor añadido exitosamente.</p>";
        // Redireccionar al listado
        header("Location: listar_profesores.php");
        exit();
    } else {
        echo "<p>Error al añadir profesor: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Profesor</title>
</head>
<body>
    <h1>Agregar Nuevo Profesor</h1>

    <!-- Formulario para agregar profesor -->
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="asignaturas">Asignaturas:</label><br>
        <textarea id="asignaturas" name="asignaturas" rows="4" required></textarea><br><br>

        <button type="submit">Guardar Profesor</button>
    </form>

    <!-- Botón para regresar al listado -->
    <br>
    <a href="listar_profesores.php">
        <button>Volver al Listado</button>
    </a>
</body>
</html>
<?php
$conn->close();
?>
