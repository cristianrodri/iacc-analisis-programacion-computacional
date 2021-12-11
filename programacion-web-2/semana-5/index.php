<?php

  class Auto {
    private $matricula;
    private $motor;
    private $carroceria;
    private $marca;
    private $modelo;
    private $year;
    private $color;
    private $precio;

    function __construct() {}

    // MÉTODOS SET
    public function set_matricula($matricula) {
      return $this->matricula = $matricula;
    }

    public function set_motor($motor) {
      return $this->motor = $motor;
    }

    public function set_carroceria($carroceria) {
      return $this->carroceria = $carroceria;
    }

    public function set_marca($marca) {
      return $this->marca = $marca;
    }

    public function set_modelo($modelo) {
      return $this->modelo = $modelo;
    }

    public function set_year($year) {
      return $this->year = $year;
    }

    public function set_color($color) {
      return $this->color = $color;
    }

    public function set_precio($precio) {
      return $this->precio = $precio;
    }

    // MÉTODOS GET
    public function get_matricula() {
      return $this->matricula;
    }

    public function get_motor() {
      return $this->motor;
    }

    public function get_carroceria() {
      return $this->carroceria;
    }

    public function get_marca() {
      return $this->marca;
    }

    public function get_modelo() {
      return $this->modelo;
    }

    public function get_year() {
      return $this->year;
    }

    public function get_color() {
      return $this->color;
    }

    public function get_precio() {
      return $this->precio;
    }
  }

  // Se instancia la clase auto cada vez que recargue la página
  $auto = new Auto();

  // Cuando el formulario es enviado (REQUEST_METHOD es igual a POST) los valores se almacenan en la instancia de la clase Auto
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Con la función "htmlspecialchars" nos aseguramos de no ingresar etiquetas html dentro de los campos del input. Por ejemplo, podemos ingresar a un input lo siguiente: "<script>alert('esto es un hackeo')</script>". Esto significa que se ejecutaría el código javascript escrito en el input lo que podría ser peligroso ya que podría tener código malicioso. Con la función "htmlspecialchars", el valor del input sería literalmente el texto "<script>alert('esto es un hackeo')</script>"
    $auto->set_matricula(htmlspecialchars($_POST['matricula']));
    $auto->set_motor(htmlspecialchars($_POST['motor']));
    $auto->set_carroceria(htmlspecialchars($_POST['carroceria']));
    $auto->set_marca(htmlspecialchars($_POST['marca']));
    $auto->set_modelo(htmlspecialchars($_POST['modelo']));
    $auto->set_year(htmlspecialchars($_POST['year']));
    $auto->set_color(htmlspecialchars($_POST['color']));
    $auto->set_precio(htmlspecialchars($_POST['precio']));
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Semana 5</title>
  <link rel="stylesheet" href="estilos.css">
</head>

<body>
  <!-- El código PHP dentro del atributo action significa que el formulario va a llamar al código PHP del mismo archivo-->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
    onsubmit="return validarFormulario(this);">
    <h2>Características del auto</h2>
    <input type="text" name="matricula" placeholder="Matrícula" autofocus>
    <input type="text" name="motor" placeholder="Serial del motor" required>
    <input type="text" name="carroceria" placeholder="Serial del carrocería" required>
    <input type="text" name="marca" placeholder="Marca" required>
    <input type="text" name="modelo" placeholder="Modelo" required>
    <input type="text" name="year" placeholder="Año">
    <input type="text" name="color" placeholder="Color" required>
    <input type="number" name="precio" min="0" placeholder="Precio" required>
    <input type="submit" value="Enviar">
  </form>

  <!-- Mostrar los valores (y su HTML) del formulario solamente cuando es enviado -->
  <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>

  <div class="valores">
    <p>La matricula es: <strong><?php echo $auto->get_matricula(); ?></strong></p>
    <p>La serial del motor es: <strong><?php echo $auto->get_motor(); ?></strong></p>
    <p>La serial de la carroceria es: <strong><?php echo $auto->get_carroceria(); ?></strong></p>
    <p>La marca es: <strong><?php echo $auto->get_marca(); ?></strong></p>
    <p>El modelo es: <strong><?php echo $auto->get_modelo(); ?></strong></p>
    <p>El Año es: <strong><?php echo $auto->get_year(); ?></strong></p>
    <p>El color es: <strong><?php echo $auto->get_color(); ?></strong></p>
    <!-- El precio es formateado a gracias a la función PHP number_format. La función "intval" transforma el valor a número -->
    <p>El precio es: <strong><?php echo '$' . number_format(intval($auto->get_precio()), 0, ',', '.'); ?></strong></p>
  </div>

  <?php } ?>

  <script src="script.js"></script>
</body>

</html>