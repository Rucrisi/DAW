<?php
if (isset($_COOKIE['lugar'])) {
    echo "Eres de " . $_COOKIE['lugar'];
} else {
    echo "No se encontro el lugar en las cookies.";
}
?>
