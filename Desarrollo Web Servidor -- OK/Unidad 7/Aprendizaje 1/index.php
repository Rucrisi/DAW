<?php
// Incluir las clases
require_once 'animal.php';

// Crear instancias de Perro y Gato
$perro1 = new Perro("Max", "Marrón");
$perro2 = new Perro("Buddy", "Negro");

$gato1 = new Gato("Luna", "Blanco");
$gato2 = new Gato("Simba", "Gris");

// Mostrar la información de cada objeto
echo $perro1->info() . "<br>";
echo $perro2->info() . "<br>";

echo $gato1->info() . "<br>";
echo $gato2->info() . "<br>";

?>
