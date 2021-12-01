<?php

  // Se crea un rasgo que contiene un método y dependiendo del tipo (empleado o cliente) imprimirá un mensaje.
  trait welcome {
    public function bienvenida($tipo) {

      if ($tipo == 'empleado') {
        return 'Bienvenido al restaurante ABC. Usted como empleado tiene un 15% de descuento';
      }

      return 'Estimado(a) cliente, bienvenido al restaurante ABC';
    }
  }

  // Clase padre abstracta
  abstract class AbstractPersona {
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

    // Es el único método abstracto que posee la clase. Este método por obligación debe ser implementado en sus clases hijas
    abstract protected function getDescription();

    // Este método no puede ser sobreescrito en sus clases hijas ya que posee la palabra reservada "final". La única función de este método es dejar en mayúscula el nombre completo del cliente. No es necesario que sea usada en las clases hijas
    final function nombreMayuscula() {
      $nombreCompleto = "$this->nombre $this->apellido";
      return strtoupper($nombreCompleto);
    }

    public function getNombre() {
      return $this->nombreMayuscula();
    }

    public function getRut() {
      return $this->rut;
    }

    public function getDireccion() {
      return $this->direccion;
    }
  }

  // Clase Empleado
  class Empleado extends AbstractPersona {
    private $cargo;

    function __construct($nombre, $apellido, $rut, $direccion, $cargo) {
      parent::__construct($nombre, $apellido, $rut, $direccion);

      $this->cargo = $cargo;
    }

    // Este método es implementado por extender la clase AbstractPersona
    public function getDescription() {
      return "Este empleado se llama " . $this->getNombre() . " y su cargo es $this->cargo";
    }

    // Se llama el rasgo "welcome" creado anteriormente
    use welcome;
  }

  // Clase Cliente
  class Cliente extends AbstractPersona {
    private $frecuente;
    private $datos = array();

    function __construct($nombre, $apellido, $rut, $direccion, $frecuente) {
      parent::__construct($nombre, $apellido, $rut, $direccion);

      $this->frecuente = $frecuente;
    }

    // Este método es implementado por extender la clase AbstractPersona
    public function getDescription() {
      return "El cliente " . $this->getNombre() . " es un cliente $this->frecuente. Su RUT es " . $this->getRut() . " y su dirección es " . $this->getDireccion();
    }

    public function getFrecuente() {
      return $this->frecuente;
    }

    // MÉTODOS MÁGICOS (producen la sobrecarga de propiedades)

    // __set() se ejecuta internamente cuando se crea una propiedad dinámicamente
    public function __set($nombre, $valor) {
      $this->datos[$nombre] = $valor;
    }

    // __get() se ejecuta internamente cuando se llama a alguna propiedad que fue creada dinámicamente
    public function __get($nombre) {
      return $this->datos[$nombre];
    }

    use welcome;
  }

  $empleado1 = new Empleado('Francisco', 'Rojas', '12.394.348-5', 'Aldunate 0944', 'vendedor');
  $cliente1 = new Cliente('María', 'Paredes', '17.844.893-8', 'Manuel Montt 576', 'no frecuente');

  echo "<h2>Empleado</h2>";
  echo $empleado1->getDescription();
  echo '<br>';
  echo $empleado1->bienvenida('empleado');

  echo "<h2>Cliente</h2>";
  echo $cliente1->getDescription();
  echo '<br>';
  echo $empleado1->bienvenida('cliente');
  
  ///////////////////////// CLASE ANÓNIMA /////////////////////////
  echo "<h3>Implementación de la clase anónima</h3>";
  $compra = new class {
    public function adquirir($cliente, $producto, $vendedor) {
      echo "El cliente " . $cliente->getNombre() . " ha adquirido un(a) $producto. El vendedor es " . $vendedor->getNombre() . ".<br>";
    }
  };
  
  $compra->adquirir($cliente1, 'Almuerzo', $empleado1);
  
  ///////////////////////// SOBRECARGA DE PROPIEDADES DE LA CLASE CLIENTE /////////////////////////
  echo "<h3>Implementación de sobrecarga</h3>";

  // Se crea una propiedad dinámicamente y su valor variará si es cliente frecuente o no
  if ($cliente1->getFrecuente() == 'frecuente')
    $cliente1->poseeTarjeta = true;
  else
    $cliente1->poseeTarjeta = false;

  if ($cliente1->poseeTarjeta)
    echo $cliente1->getNombre() . " posee tarjeta de restaurante.<br>";
  else
    echo $cliente1->getNombre() . " no posee tarjeta de restaurante.<br>";
?>