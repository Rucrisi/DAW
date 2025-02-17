<?php

// Configurar el servidor SOAP
$uri = "http://localhost/calculoEdad";
$server = new SoapServer(null, array('uri' => $uri));
$server->addFunction("calcularEdad");
$server->handle();

// Definir la función fuera de la clase
function calcularEdad($fechaNacimiento) {
    $fechaActual = new DateTime();
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $edad = $fechaActual->diff($fechaNacimiento)->y;
    return $edad;
}
?>
