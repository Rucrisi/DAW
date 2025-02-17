<?php
if (isset($_COOKIE['nombre'])) {
    echo "Hola, " . $_COOKIE['nombre'] . "!";
} else {
    echo "No se encontro el nombre en las cookies.";
}
?>
