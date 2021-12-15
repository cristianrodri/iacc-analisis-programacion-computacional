<?php

  $conexion = require_once('database.php');

  //////////////////////////////// FUNCION PARA INGRESAR DATOS A LA BASE_DE_DATOS ////////////////////////////
  function crear_datos(mysqli $conexion) {
    $matricula = $_POST['matricula'];
    $motor = $_POST['motor'];
    $carroceria = $_POST['carroceria'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $anio = (int)$_POST['anio'];
    $color = $_POST['color'];
    $precio = (int)$_POST['precio'];

    $sql = "INSERT INTO autos (matricula, serial_motor, serial_carroceria, marca, modelo, anio, color, precio) VALUES ('$matricula', '$motor', '$carroceria', '$marca', '$modelo', $anio, '$color', $precio)";

    return $conexion->query($sql) === TRUE;
  }

  // INICIA EL FLUJO DE LA PÁGINA
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['agregar'])) {
      $retorno_BB_DD = crear_datos($conexion);

      // Si retorno_BB_DD es true, entonces $datosAgregados es true y muestra mensaje de éxito en HTML
      $datosAgregados = $retorno_BB_DD;
    }
  }

  // Encabezado inicial de HTML
  include_once('header.php');

?>

<div class="container mt-3 w-50">

  <h1>Caracteristicas del Auto</h1>
  <div class="d-flex justify-content-center">
    <a href="autos.php" class="btn btn-primary">Ver listado de autos</a>
  </div>

  <!-- Se muestra un mensaje de éxito si los datos fueron agregados a la base de datos. -->
  <?php if($datosAgregados): ?>

  <div class="m-auto mt-3 alert alert-success alert-dismissible fade show" role="alert">
    Los datos han sido agregados exitosamente a la base de datos.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <?php endif; ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="d-flex flex-column gap-2">
    <div class="form-group">
      <label for="inputMatricula">Matrícula</label>
      <input required type="text" name="matricula" class="form-control" id="inputMatricula"
        placeholder="Inserta la matrícula">
    </div>
    <div class="form-group">
      <label for="inputMotor">Serial del motor</label>
      <input required type="text" name="motor" class="form-control" id="inputMotor" placeholder="Serial del motor">
    </div>
    <div class="form-group">
      <label for="inputCarroceria">Serial de la carrocería</label>
      <input required type="text" name="carroceria" class="form-control" id="inputCarroceria"
        placeholder="Serial de la carrocería">
    </div>
    <div class="form-group">
      <label for="inputMarca">Marca</label>
      <input required type="text" name="marca" class="form-control" id="inputMarca" placeholder="Ingrese la marca">
    </div>
    <div class="form-group">
      <label for="inputModelo">Modelo</label>
      <input required type="text" name="modelo" class="form-control" id="inputModelo" placeholder="Ingrese el modelo">
    </div>
    <div class="form-group">
      <label for="inputAnio">Año</label>
      <input required type="number" name="anio" class="form-control" id="inputAnio" placeholder="Ingrese el año">
    </div>
    <div class="form-group">
      <label for="inputColor">Color</label>
      <input required type="text" name="color" class="form-control" id="inputColor" placeholder="Ingrese el color">
    </div>
    <div class="form-group">
      <label for="inputPrecio">Precio</label>
      <input required type="number" min="1" name="precio" class="form-control" id="inputPrecio"
        placeholder="Ingrese el precio">
    </div>
    <button type="submit" name="agregar" class="btn btn-primary align-self-start">Guardar</button>
  </form>
</div>

<!--  Encabezado final de HTML -->
<?php include_once('footer.php'); ?>