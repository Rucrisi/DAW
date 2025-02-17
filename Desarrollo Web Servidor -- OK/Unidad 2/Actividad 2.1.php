<?php
$trabajador = "Ruben Crispin";

$lunes = 8.5;
$martes = 7.0;
$miercoles = 8.0;
$jueves = 6.5;
$viernes = 7.0;

$horasConvenio = 38;
//Horas totales semanales
$horasTotales = $lunes + $martes + $miercoles + $jueves + $viernes;

//Diferencia horaria con el convenio
$diferenciaHoras = $horasTotales - $horasConvenio;

//Promedio horas por dia
$diasLaborables = 5;

if ($diasLaborables != 0) {
    $promedioHoras = $horasTotales / $diasLaborables;
} else {
    $promedioHoras = 0;
}

//Mostrar el resumen
echo "Resumen de horas trabajadas por el empleado $trabajador:<br>";
echo "======================================<br>";
echo "Lunes: $lunes horas <br>";
echo "Martes: $martes horas <br>";
echo "Miercoles: $miercoles horas <br>";
echo "Jueves: $jueves horas <br>";
echo "Viernes: $viernes horas <br>";
echo "Horas totales trabajadas en la semana: $horasTotales horas <br>";
echo "======================================<br>";

if ($diferenciaHoras == 0) {
    echo "El trabajador ha cumplido exactamente con el convenio.<br>";
} elseif ($diferenciaHoras > 0) {
    echo "El trabajador ha hecho $diferenciaHoras horas extra.<br>";
} else {
    if ($diferenciaHoras < 0){
        $diferenciaHoras = $diferenciaHoras * -1;
        echo "El trabajador debe $diferenciaHoras horas a la empresa.<br>";
    }
    else {
        echo "El trabajador debe $diferenciaHoras horas a la empresa.<br>";
    }
}

echo "Promedio de horas trabajadas por dia: $promedioHoras horas<br>";
?>