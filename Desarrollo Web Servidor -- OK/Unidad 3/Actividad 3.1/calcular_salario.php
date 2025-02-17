<?php

$salarioHora = 17; // € por hora
$horasSemanales = 38; // Horas semanales
$extraMult = 2; // Pago doble horas extra
$topeHoras = 10; // Maximo de horas extra

$file = $_POST['filename'];

// Verificar si el archivo existe
if (file_exists($file)) {
    // Leer las horas del archivo
    $horas = file($file);
    $total_horas = 0;

    // Calcular el total de horas trabajadas
    foreach ($horas as $hdia) {
        $total_horas += $hdia;
    }

    // Calcular el salario
    if ($total_horas <= $horasSemanales) {
        // Menos o igual que 38 horas, se paga normal
        $salario = $total_horas * $salarioHora;
    } else {
        // Mas de 38 horas, calcular horas extra
        $horas_extra = $total_horas - $horasSemanales;
        // El tope de horas extra es 10
        if ($horas_extra > $topeHoras) {
            $horas_extra = $topeHoras;
        }
        // Calcular el salario con horas extra
        $salario = ($horasSemanales * $salarioHora) + ($horas_extra * $salarioHora * $extraMult);
    }

    // Mostrar el resultado
    echo "<h1>Salario calculado de ". ucfirst(pathinfo($file,PATHINFO_FILENAME))."</h1>"; // Nombre del archivo sin la extension y pongo la primera letra en mayuscula
    echo "<p>Total de horas trabajadas: $total_horas horas</p>";
    echo "<p>Salario bruto semanal: € $salario </p>";
} else {
    // Si el archivo no existe
    echo "<p>El archivo $file no existe. Por favor, verifica el nombre del archivo.</p>";
}

?>
