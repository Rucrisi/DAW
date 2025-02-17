<?php
require("conexionBD.php");

// Verificar si se recibió el ID del profesor
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Profesores WHERE id = $id";
    $resultado = $conn->query($sql);
    $profesor = $resultado->fetch_assoc();
} else {
    die("ID no especificado.");
}

// Guardar los cambios al enviar el formulario y volver
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $asignaturas = $_POST['asignaturas'];

    $sql = "UPDATE Profesores SET nombre = '$nombre', apellidos = '$apellidos', asignaturas = '$asignaturas' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Profesor actualizado exitosamente.";
    } else {
        echo "Error al actualizar profesor: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Profesor</title>
</head>
<body>
    <h1>Editar Profesor</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?= $profesor['nombre'] ?>" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?= $profesor['apellidos'] ?>" required><br><br>

        <label for="asignaturas">Asignaturas:</label><br>
        <textarea id="asignaturas" name="asignaturas" rows="4" required><?= $profesor['asignaturas'] ?></textarea><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>
    
    <!-- Botón para regresar al listado -->
    <br>
    <a href="listar_profesores.php">
        <button>Volver al Listado</button>
    </a>
</body>
</html>
