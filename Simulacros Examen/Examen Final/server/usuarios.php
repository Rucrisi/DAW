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

        echo "<h2>Usuario registrado exitosamente.</h2>";
        echo json_encode($_SESSION['usuarios']);
    } else {
        echo "<h2>Por favor complete todos los campos.</h2>";
    }
} else {
    echo "<h2>Método no permitido.</h2>";
}
?>
