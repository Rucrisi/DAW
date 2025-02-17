<?php
require("conexionBD.php");

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$asignaturas = $_POST['asignaturas'];

// Insertar los datos en la tabla
$sql = "INSERT INTO Profesores (nombre, apellidos, asignaturas) VALUES ('$nombre', '$apellidos', '$asignaturas')";
if ($conn->query($sql) === TRUE) {
    echo "Profesor guardado exitosamente.";
} else {
    echo "Error al guardar el profesor: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
