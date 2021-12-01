<?php

  class Persona {
    protected $nombre;
    protected $apellido;
    protected $rut;
    protected $direccion;

    function __construct($nombre, $apellido, $rut, $direccion) {
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->rut = $rut;
      $this->direccion = $direccion;
    }

    function getNombre() {
      return $this->nombre;
    }

    function getApellido() {
      return $this->apellido;
    }

    function getRut() {
      return $this->rut;
    }

    function getDireccion() {
      return $this->direccion;
    }

    function setDireccion($direccion) {
      $this->direccion = $direccion;
    }
  }

  class Empleado extends Persona {
    function __construct($nombre, $apellido, $rut, $direccion) {
      parent::__construct($nombre, $apellido, $rut, $direccion);
    }
  }

  class Cliente extends Persona {
    function __construct($nombre, $apellido, $rut, $direccion) {
      parent::__construct($nombre, $apellido, $rut, $direccion);
    }
  }

  $empleado1 = new Empleado('Francisco', 'Rojas', '12.394.348-5', 'Aldunate 0944');
  $cliente1 = new Cliente('María', 'Paredes', '17.844.893-8', 'Manuel Montt 576');

  echo "El empleado 1 se llama " . $empleado1->getNombre() . " " . $empleado1->getApellido() . ". Su RUT es " . $empleado1->getRut() . " y su dirección es " . $empleado1->getDireccion();

  echo "<br>";

  echo "El cliente 1 se llama " . $cliente1->getNombre() . " " . $cliente1->getApellido() . ". Su RUT es " . $cliente1->getRut() . " y su dirección es " . $cliente1->getDireccion();

?>