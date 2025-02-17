<?php
require("conexionBD_PDO.php");

try {
    // Verificar si se recibió el ID del profesor
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Consultar los datos del profesor
        $sql = "SELECT * FROM Profesores WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $profesor = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$profesor) {
            die("Profesor no encontrado.");
        }
    } else {
        die("ID no especificado o inválido.");
    }

    // Guardar los cambios al enviar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $asignaturas = $_POST['asignaturas'];

        // Actualizar los datos del profesor
        $sql_update = "UPDATE Profesores SET nombre = :nombre, apellidos = :apellidos, asignaturas = :asignaturas WHERE id = :id";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_update->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt_update->bindParam(':asignaturas', $asignaturas, PDO::PARAM_STR);
        $stmt_update->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt_update->execute()) {
            echo "Profesor actualizado exitosamente.";
        } else {
            echo "Error al actualizar profesor.";
        }
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
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
        <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($profesor['nombre']) ?>" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" value="<?= htmlspecialchars($profesor['apellidos']) ?>" required><br><br>

        <label for="asignaturas">Asignaturas:</label><br>
        <textarea id="asignaturas" name="asignaturas" rows="4" required><?= htmlspecialchars($profesor['asignaturas']) ?></textarea><br><br>

        <button type="submit">Guardar Cambios</button>
    </form>

    <!-- Botón para regresar al listado -->
    <br>
    <a href="listar_profesores.php">
        <button>Volver al Listado</button>
    </a>
</body>
</html>
