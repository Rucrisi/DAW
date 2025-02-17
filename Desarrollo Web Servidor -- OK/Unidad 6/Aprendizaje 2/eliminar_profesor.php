<?php
require("conexionBD.php");

// Verificar si se recibió el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM Profesores WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Profesor eliminado exitosamente.";
    } else {
        echo "Error al eliminar profesor: " . $conn->error;
    }
} else {
    die("ID no especificado.");
}

// Cerrar la conexión
$conn->close();
?>

<br>
<br>
    <a href="listar_profesores.php">
        <button>Volver al Listado</button>
    </a>