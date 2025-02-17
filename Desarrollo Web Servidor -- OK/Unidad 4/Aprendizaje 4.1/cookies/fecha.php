<?php
if (isset($_COOKIE['fecha_nacimiento'])) {
    echo "Tu fecha de nacimiento es: " . $_COOKIE['fecha_nacimiento'];
} else {
    echo "No se encontro la fecha de nacimiento en las cookies.";
}
?>
