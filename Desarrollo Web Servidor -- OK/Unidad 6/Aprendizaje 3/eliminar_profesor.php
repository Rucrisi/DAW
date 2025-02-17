<?php
require("conexionBD_PDO.php");

try {
    // Verificar si se recibió el ID
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Preparar la consulta
        $sql = "DELETE FROM Profesores WHERE id = :id";
        $stmt = $conn->prepare($sql);

        // Vincular el parámetro
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Profesor eliminado exitosamente.";
        } else {
            echo "Error al eliminar profesor.";
        }
    } else {
        die("ID no especificado o inválido.");
    }
} catch (PDOException $e) {
    echo "Error al eliminar profesor: " . $e->getMessage();
}
?>

<br>
<br>
<a href="listar_profesores.php">
    <button>Volver al Listado</button>
</a>
