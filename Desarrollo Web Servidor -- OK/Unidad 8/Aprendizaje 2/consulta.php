<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_POST['ip']; // Obtener la IP desde el formulario
    $url = "http://ip-api.com/json/{$ip}?fields=city,region,country,isp,query";

    // Realizar la solicitud
    $response = file_get_contents($url);
    if ($response === FALSE) {
        echo "Error al obtener la información de la IP.";
    } else {
        $data = json_decode($response, true); // Decodificar la respuesta JSON

        // Mostrar los datos obtenidos
        echo "<h1>Información sobre la IP: {$ip}</h1>";
        echo "<p><strong>JSON Obtenido:</strong> " . htmlspecialchars($response) . "</p>";
        echo "<p><strong>Ciudad:</strong> " . htmlspecialchars($data['city']) . "</p>";
        echo "<p><strong>Región:</strong> " . htmlspecialchars($data['region']) . "</p>";
        echo "<p><strong>País:</strong> " . htmlspecialchars($data['country']) . "</p>";
        echo "<p><strong>Proveedor de Internet:</strong> " . htmlspecialchars($data['isp']) . "</p>";
        echo "<p><strong>IP Consultada:</strong> " . htmlspecialchars($data['query']) . "</p>";
    }
} else {
    echo "Por favor, ingresa una dirección IP.";
}
?>
