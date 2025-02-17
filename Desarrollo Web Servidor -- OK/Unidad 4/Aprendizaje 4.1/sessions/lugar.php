<?php
session_start();

if (isset($_SESSION['lugar'])) {
    echo "Eres de " . $_SESSION['lugar'];
} else {
    echo "No se encontro el lugar donde vives.";
}
?>
