<?php
require("conexionBD.php");
require_once("clases.php"); // Incluir el archivo de clases

// Verificar si se recibió el ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM empleados WHERE id = $id";
    $resultado = $conn->query($sql);
    $empleadoData = $resultado->fetch_assoc();
    }

    // Proceder a eliminar el empleado
    $sqlDelete = "DELETE FROM empleados WHERE id = " . $empleadoData['id'];
    if ($conn->query($sqlDelete) === TRUE) {
        echo "Empleado eliminado exitosamente.";
    } else {
        echo "Error al eliminar empleado: " . $conn->error;
    }


// Cerrar la conexión
$conn->close();
?>

<br>
<br>
<a href="index_empleados.php">
    <button>Volver al Listado</button>
</a>
