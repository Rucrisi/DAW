<?php
// Permitir acceso desde cualquier origen (para pruebas)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Obtener los parámetros
$num1 = isset($_GET["num1"]) ? floatval($_GET["num1"]) : null;
$num2 = isset($_GET["num2"]) ? floatval($_GET["num2"]) : null;
$operacion = isset($_GET["operacion"]) ? $_GET["operacion"] : null;

// Validación de entrada
if ($num1 === null || $num2 === null || !$operacion) {
    echo json_encode(["error" => "Faltan parámetros"]);
    exit;
}

$resultado = null;

// Realizar la operación
switch ($operacion) {
    case "suma":
        $resultado = $num1 + $num2;
        break;
    case "resta":
        $resultado = $num1 - $num2;
        break;
    case "mult":
        $resultado = $num1 * $num2;
        break;
    case "divi":
        if ($num2 == 0) {
            echo json_encode(["error" => "No se puede dividir entre 0"]);
            exit;
        }
        $resultado = $num1 / $num2;
        break;
    default:
        echo json_encode(["error" => "Operación no válida"]);
        exit;
}

// Respuesta en JSON
echo json_encode([
    "num1" => $num1,
    "num2" => $num2,
    "operacion" => $operacion,
    "resultado" => $resultado
]);
