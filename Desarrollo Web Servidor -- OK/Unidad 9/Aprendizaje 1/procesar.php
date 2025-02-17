<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"] ?? '');
    $apellidos = trim($_POST["apellidos"] ?? '');

    if (empty($nombre) || empty($apellidos)) {
        die("Error: Todos los campos son obligatorios.");
    }

    if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $nombre) ||
        !preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $apellidos)) {
        die("Error: Solo se permiten letras y espacios en los campos.");
    }

    echo "Datos válidos: $nombre $apellidos";
}
?>
