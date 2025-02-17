<?php
require("conexionBD.php");

// Verificar si se recibió el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM empleados WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Empleado eliminado exitosamente.";
    } else {
        echo "Error al eliminar empleado: " . $conn->error;
    }
} else {
    die("ID no especificado.");
}

// Cerrar la conexión
$conn->close();
?>

<br>
<br>
    <a href="principal_empleados.php">
        <button>Volver al Listado</button>
    </a>