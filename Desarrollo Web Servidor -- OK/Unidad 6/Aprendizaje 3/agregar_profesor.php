<?php
require("conexionBD_PDO.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $asignaturas = $_POST['asignaturas'];

    try {
        // Preparar la consulta para insertar
        $sql = "INSERT INTO Profesores (nombre, apellidos, asignaturas) VALUES (:nombre, :apellidos, :asignaturas)";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta con los datos
        $stmt->execute([
            ':nombre' => $nombre,
            ':apellidos' => $apellidos,
            ':asignaturas' => $asignaturas,
        ]);

        // Redirigir al listado después de insertar
        header("Location: listar_profesores.php");
        exit();
    } catch (PDOException $e) {
        die("Error al insertar el profesor: " . $e->getMessage());
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

    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="asignaturas">Asignaturas:</label><br>
        <textarea id="asignaturas" name="asignaturas" rows="4" required></textarea><br><br>

        <button type="submit">Guardar Profesor</button>
    </form>

    <a href="listar_profesores.php">
        <br>
        <button>Volver al Listado</button>
    </a>
</body>
</html>

