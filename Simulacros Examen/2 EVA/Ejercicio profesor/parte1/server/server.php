<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(204);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["expression"])) {
        $expression = $_GET["expression"];
        eval('$result = ' . $expression . ';');
        echo $result;
    } else {
        echo "No expression received";
    }
} else {
    echo "Invalid request";
}
?>
