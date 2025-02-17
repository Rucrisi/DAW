<?php
require("conexionBD_PDO.php");

try {
    // Eliminar todos los profesores
    $sql = "DELETE FROM Profesores";
    $conn->exec($sql); // Ejecutar el borrado
    echo "Todos los profesores han sido eliminados.<br>";

    // Reiniciar el contador del ID
    $sql_reset_id = "ALTER TABLE Profesores AUTO_INCREMENT = 1";
    $conn->exec($sql_reset_id); // Ejecutar el reinicio del contador
    echo "ID reiniciado correctamente.<br>";

    // Redirigir al listado
    header("Location: listar_profesores.php");
    exit; // Terminar el script después de la redirección
} catch (PDOException $e) {
    die("Error al eliminar los profesores: " . $e->getMessage());
}
?>
