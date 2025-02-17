<?php
abstract class Empleado {
    public $id;
    public $nombre;
    public $apellidos;
    public $edad;
    public $sueldoBrutoAnual;

    public function __construct($id, $nombre, $apellidos, $edad, $sueldoBrutoAnual) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
        $this->sueldoBrutoAnual = $sueldoBrutoAnual;
    }

    public abstract function aplicarBono(); // Método abstracto para aplicar bono
}

class RecursosHumanos extends Empleado {
    public $sueldoBase;

    public function __construct($id,$nombre, $apellidos, $edad, $sueldoBrutoAnual, $sueldoBase) {
        parent::__construct($id,$nombre, $apellidos, $edad, $sueldoBrutoAnual);
        $this->sueldoBase = $sueldoBase;
    }

    public function aplicarBono() {
        $this->sueldoBase *= 1.10;
    }

    public function getSueldoBase() {
        return $this->sueldoBase;
    }
}

class Marketing extends Empleado {
    public $sueldoBase;

    public function __construct($id, $nombre, $apellidos, $edad, $sueldoBrutoAnual, $sueldoBase) {
        parent::__construct($id, $nombre, $apellidos, $edad, $sueldoBrutoAnual);
        $this->sueldoBase = $sueldoBase;
    }

    public function aplicarBono() {
        $this->sueldoBase *= 1.10; // Incrementa el sueldo base un 10%
    }

    public function getSueldoBase() {
        return $this->sueldoBase;
    }
}

class AtencionAlCliente extends Empleado {
    public $sueldoBase;

    public function __construct($id, $nombre, $apellidos, $edad, $sueldoBrutoAnual, $sueldoBase) {
        parent::__construct($id, $nombre, $apellidos, $edad, $sueldoBrutoAnual);
        $this->sueldoBase = $sueldoBase;
    }

    public function aplicarBono() {
        $this->sueldoBase *= 1.10; // Incrementa el sueldo base un 10%
    }

    public function getSueldoBase() {
        return $this->sueldoBase;
    }
}

?>