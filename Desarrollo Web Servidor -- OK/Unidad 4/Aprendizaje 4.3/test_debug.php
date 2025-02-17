<?php

$numerador = array(5, 6, 10, 0, 8);
$divisor = array(2, 3, 33, 0, 8);

for ($i = 0; $i < count($numerador); $i++) { //Cambiamos <= ya que la longitud del array es 5, y los indices válidos son de 0 a 4
    if ($divisor[$i] != 0) {  //Verifica que el divisor no sea cero
        $operacion = $numerador[$i] / $divisor[$i];
        echo "El resultado de dividir $numerador[$i] entre $divisor[$i] es $operacion<br/>";
    } else {
        echo "ERROR: No se puede dividir $numerador[$i] entre 0<br/>";
    }
}

?>
