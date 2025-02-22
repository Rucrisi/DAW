<?php
session_start();
header('Content-Type: application/json'); // Indicar que la respuesta es JSON

// Verificar si hay usuarios en la sesión
if (isset($_SESSION['usuarios']) && !empty($_SESSION['usuarios'])) {
    // Extraer solo los nombres de los usuarios si los datos son objetos asociativos
    $nombres = array_map(function ($usuario) {
        return $usuario['nombre'] ?? 'Usuario sin nombre'; // Asumiendo que cada usuario tiene un campo 'nombre'
    }, $_SESSION['usuarios']);
    $correos = array_map(function ($usuario) {
        return $usuario['correo'] ?? 'Usuario sin correo'; // Asumiendo que cada usuario tiene un campo 'nombre'
    }, $_SESSION['usuarios']);

    echo json_encode([
        "status" => "success",
        "usuarios" => $nombres,
        "correos" => $correos
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "No hay usuarios registrados en la sesión."
    ]);
}
?>