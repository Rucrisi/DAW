<?php
// Clase base
abstract class Animal {
    protected $nombre; // Declaramos como protected para que las clases derivadas puedan acceder
    protected $colorPelo;
    protected $tipo;

    // Constructor abstracto
    abstract public function __construct($nombre, $colorPelo);

    // Métodos abstractos
    abstract public function info();
    abstract public function hablar();
}
// Clase derivada Perro
class Perro extends Animal {
    public function __construct($nombre, $colorPelo) {
        $this->nombre = $nombre;
        $this->colorPelo = $colorPelo;
        $this->tipo = "Perro";
    }
    public function info() {
        return "Nombre: {$this->nombre}, Color de pelo: {$this->colorPelo}, Tipo: {$this->tipo}";
    }
    public function hablar() {
        return "Los perros hacen GUAU<br/>";
    }
}
// Clase derivada Gato
class Gato extends Animal {
    public function __construct($nombre, $colorPelo) {
        $this->nombre = $nombre;
        $this->colorPelo = $colorPelo;
        $this->tipo = "Gato";
    }
    public function info() {
        return "Nombre: {$this->nombre}, Color de pelo: {$this->colorPelo}, Tipo: {$this->tipo}";
    }
    public function hablar() {
        return "Los gatos hacen MIAU<br/>";
    }
}
?>
