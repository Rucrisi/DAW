<?php
$semana = array(
    "lunes" => 18,
    "martes" => 19,
    "miércoles" => 22,
    "jueves" => 20,
    "viernes" => 17,
    "sábado" => 23,
    "domingo" => 24,
   );

echo "Los dias de la semana que ha hecho mas de 20º son :<br>";

foreach($semana as $key => $value){
    if($value > 20){
        echo ucfirst($key) ."<br>"; // Pone la primera letra en mayuscula
    }
}
?>