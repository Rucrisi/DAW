<?php
function numeroMayor($numeros) {

   // Inicializamos la variable $mayor
    $mayor = 0;

    // Recorremos el array para comparar cada valor
    foreach ($numeros as $numero) {

        // Si encontramos un número mayor que el valor actual de $mayor, lo actualizamos
        if ($numero > $mayor) {
            $mayor = $numero;
        }
    }

    // Retornamos el número mayor encontrado
    return $mayor;
}

// Ejemplo de uso
$numeros = [4, 8, 15, 23, 42, 16];
echo "El número mayor es: " . numeroMayor($numeros);
?>
