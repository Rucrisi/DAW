<?php

$numerador = array(5, 6, 10, 0, 8);

$divisor = array(2, 3, 33, 0, 8);

for ($i=0; $i<=count($numerador); $i++) {

    $operacion = $numerador[$i]/$divisor[$i];

    echo "El resultado de dividir $numerador[$i] entre $divisor[$i] es $operacion<br/>";

}

?>
