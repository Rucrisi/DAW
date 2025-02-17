<?php
session_start();

// Asegurarse de que los datos sean enviados por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'] ?? '';
    $correo = $_POST['correo'] ?? '';

    // Verifica si los campos están completos
    if (!empty($nombre) && !empty($correo)) {
        // Si no existe una variable de sesión para los usuarios, inicializarla
        if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = [];
        }

        // Guardar el nuevo usuario en el array de la sesión
        $_SESSION['usuarios'][] = ['nombre' => $nombre, 'correo' => $correo];

        echo "Usuario registrado exitosamente.";
    } else {
        echo "Por favor complete todos los campos.";
    }
} else {
    echo "Método no permitido.";
}
?>
