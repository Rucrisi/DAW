<?php
// Función que convierte una frase a mayusculas o minusculas
function convertirTexto($frase, $formato) {

    if ($formato == "mayusculas") {
        return strtoupper($frase);
    }

    elseif ($formato == "minusculas") {
        return strtolower($frase);
    }
    else {
        return "Error. Usa 'mayusculas' o 'minusculas'.";
    }
}

$texto = "Bienvenidos al nuevo mundo.";
$tipo = "mayusculas"; // Cambia a "minusculas" para probar

$resultado = convertirTexto($texto, $tipo);

echo $resultado;
?>