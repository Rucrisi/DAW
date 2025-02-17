<?php
session_start();

// Verificar si la sesión contiene datos de usuarios
if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
    echo "<h1>Usuarios Registrados</h1>";
    echo "<pre>";
    print_r($_SESSION['usuarios']); // Muestra los datos de los usuarios en el array
    echo "</pre>";
} else {
    echo "<h1>No hay usuarios registrados en la sesión.</h1>";
}
?>
