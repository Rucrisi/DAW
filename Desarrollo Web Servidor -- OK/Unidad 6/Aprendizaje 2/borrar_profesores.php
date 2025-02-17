<?php
require("conexionBD.php");

// Eliminar todos los registros de la tabla
$sql_delete = "DELETE FROM Profesores";
if ($conn->query($sql_delete) === TRUE) {
    echo "Registros eliminados correctamente.<br>";
} else {
    echo "Error al eliminar registros: " . $conn->error . "<br>";
}

// Reiniciar el contador del ID
$sql_reset_id = "ALTER TABLE Profesores AUTO_INCREMENT = 1";
if ($conn->query($sql_reset_id) === TRUE) {
    echo "ID reiniciado correctamente.";
} else {
    echo "Error al reiniciar ID: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

    <!-- Botón para regresar al listado -->
    <br>
    <br>
    <a href="listar_profesores.php">
        <button>Volver al Listado</button>
    </a>