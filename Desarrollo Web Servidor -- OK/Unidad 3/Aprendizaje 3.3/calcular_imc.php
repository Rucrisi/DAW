<?php
$peso = $_POST['peso'];
$estatura = $_POST['estatura'];

// Verificar que peso y estatura no son 0 o negativos
if ($peso > 0 && $estatura > 0) {
    // Calcular el IMC con cm
    $imc = $peso / ($estatura/100 * $estatura/100);

    // Redondear el IMC a 2 decimales
    $imc = round($imc, 2);

    // Clasificar el IMC según las categorias
    if ($imc < 18.5) {
        $resultado = "Bajo peso";
    } elseif ($imc >= 18.5 && $imc < 24.99) {
        $resultado = "Normal";
    } elseif ($imc >= 25 && $imc < 29.99) {
        $resultado = "Sobrepeso";
    } else {
        $resultado = "Obesidad";
    }

    // Mostrar el resultado
    echo "<h1>Resultado del IMC</h1>";
    echo "<p>Tu IMC es: $imc</p>";
    echo "<p>Clasificación: $resultado</p>";
} else {
    echo "<p>Error: El peso y la estatura deben ser mayores que 0.</p>";
}
?>