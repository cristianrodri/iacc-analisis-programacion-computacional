<?php

  $filename = pathinfo($_SERVER['SCRIPT_NAME'])['filename'];

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $filename === 'index' ? 'Inicio' : ucfirst($filename) ?></title>
  <!-- Código obtenido de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</head>

<body>

  <ul class="nav nav-pills justify-content-center">
    <li class="nav-item">
      <a class="nav-link <?php echo $filename === 'index' ? 'active' : '' ?>"
        aria-current="<?php echo $filename === 'index' ? 'page' : 'false' ?>" href="index.php">Inicio</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo $filename === 'estudiantes' ? 'active' : '' ?>"
        aria-current="<?php echo $filename === 'estudiantes' ? 'page' : 'false' ?>"
        href="estudiantes.php">Estudiantes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo $filename === 'ramos' ? 'active' : '' ?>"
        aria-current="<?php echo $filename === 'ramos' ? 'page' : 'false' ?>" href="ramos.php">Ramos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo $filename === 'notas' ? 'active' : '' ?>"
        aria-current="<?php echo $filename === 'notas' ? 'page' : 'false' ?>" href="notas.php">Agregar notas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?php echo $filename === 'listado' ? 'active' : '' ?>"
        aria-current="<?php echo $filename === 'listado' ? 'page' : 'false' ?>" href="listado.php">Listado de notas</a>
    </li>
  </ul>