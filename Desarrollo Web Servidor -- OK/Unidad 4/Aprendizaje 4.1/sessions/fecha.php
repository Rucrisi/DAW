<?php
session_start();

if (isset($_SESSION['fecha_nacimiento'])) {
    echo "Tu fecha de nacimiento es: " . $_SESSION['fecha_nacimiento'];
} else {
    echo "No se encontro la fecha de nacimiento.";
}
?>
