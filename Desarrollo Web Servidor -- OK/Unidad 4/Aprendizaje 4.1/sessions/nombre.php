<?php
session_start();

if (isset($_SESSION['nombre'])) {
    echo "Hola, " . $_SESSION['nombre'] . "!";
} else {
    echo "No se encontro el nombre.";
}
?>
