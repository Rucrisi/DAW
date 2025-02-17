<?php
session_start();

if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
    $_SESSION = []; // Vaciar todas las variables de sesión
    session_unset(); // Elimina las variables de sesión
    session_destroy(); // Destruye la sesión completamente

    echo "<h1>Usuarios Borrados</h1>";
} else {
    echo "<h1>No hay usuarios</h1>";
}
