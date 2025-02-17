<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Security-Policy: frame-src 'self' http://127.0.0.1:3000;");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(204);
    exit();
}
session_start();
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';

    if (!empty($nombre) && !empty($correo)) {
        // Inicializar la lista de usuarios en sesión si no existe
        if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = [];
        }

        // Agregar el nuevo usuario al array en sesión
        $_SESSION['usuarios'][] = [
            "nombre" => $nombre,
            "correo" => $correo
        ];

        echo json_encode(["mensaje" => "Usuario registrado correctamente"]);
    } else {
        echo json_encode(["error" => "Faltan datos"]);
    }
} else {
    echo json_encode(["error" => "Método no permitido"]);
}
?>