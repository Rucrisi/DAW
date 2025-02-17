<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(204);
    exit();
}

header('Content-Type: application/json');

$response = [
    'mensaje' => 'Hola, bienvenido a mi API'
];

echo json_encode($response);
?>