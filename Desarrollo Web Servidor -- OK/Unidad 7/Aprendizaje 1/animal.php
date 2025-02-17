<?php
// Clase base
class Animal {
    protected $nombre;
    protected $colorPelo;
    protected $tipo;

    public function __construct($nombre, $colorPelo) {
        $this->nombre = $nombre;
        $this->colorPelo = $colorPelo;
        $this->tipo = "Animal";
    }

    public function info() {
        return "Nombre: {$this->nombre}, Color de pelo: {$this->colorPelo}, Tipo: {$this->tipo}";
    }
}

// Clase derivada Perro
class Perro extends Animal {
    public function __construct($nombre, $colorPelo) {
        parent::__construct($nombre, $colorPelo);
        $this->tipo = "Perro";
    }
}

// Clase derivada Gato
class Gato extends Animal {
    public function __construct($nombre, $colorPelo) {
        parent::__construct($nombre, $colorPelo);
        $this->tipo = "Gato";
    }
}
?>
