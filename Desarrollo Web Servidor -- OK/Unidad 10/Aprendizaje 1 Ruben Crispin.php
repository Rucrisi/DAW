<?php
if (isset($_GET['dia'])) {
    $diaIndex = intval($_GET['dia']); // Convertir a entero

    $semana = ["lunes", "martes", "miércoles", "jueves", "viernes", "sábado", "domingo"]; 

    if ($diaIndex >= 0 && $diaIndex <= 6) {
        $dia = strtoupper($semana[$diaIndex]); // Convertir a mayúsculas
        $mañana = strtoupper($semana[($diaIndex + 1)]); // Convertir a mayúsculas
        echo "Hoy es $dia y mañana será $mañana";
    } else {
        echo "Fecha incorrecta";
    }
}
?>
