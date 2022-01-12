<?php

  session_start();

  // Si no existen estudiantes dentro de la sesión, entonces almacenar un arreglo vacío en la variable
  $ramos = $_SESSION['ramos'] ?? [];

  $agregado = false;
  $error = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_ramo = htmlspecialchars($_POST['nombre_ramo']);

    // Si no se encuentra el nombre del ramo dentro del arreglo "ramos" de la sesión, entonces agregarlo. De lo contrario mostrar un mensaje de error señalando que ese ramo ya se encuentra disponible
    if (!in_array($nombre_ramo, $ramos)) {

      // El nuevo id será el total del elementos dentro de "ramos" + 1
      $nuevo_id = count($ramos) + 1;

      // Añadir el ramo al arreglo "ramos" de la sesión
      if(count($ramos) > 0) {
        array_push($_SESSION['ramos'], $_POST['nombre_ramo']);
      } else {
        $_SESSION['ramos'] = [$nombre_ramo];
      }

      $agregado = true;
    } else {
      $error = true;
    }

  }

  // Añade el marcado inicial de HTML
  include_once('header.php');

?>

<div class="container d-flex flex-column" style="width: 400px">
  <h1 class="text-center my-3">Agregar ramo</h1>

  <!-- Muestra mensaje de éxito cuando el ramo es agregado  -->
  <?php if($agregado): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo ucfirst($_POST['nombre_ramo']) ?></strong> ha sido agregado al curso.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

  <!-- Muestra mensaje de error cuando el ramo es agregado  -->
  <?php if($error): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo ucfirst($_POST['nombre_ramo']) ?></strong> ya se encuentra en el curso.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="mb-3">
      <label for="inputNombre" class="form-label">Nombre del ramo</label>
      <input type="text" class="form-control" name="nombre_ramo" id="inputNombre" aria-describedby="emailHelp"
        autofocus>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
</div>

<!-- Añade el marcado final de HTML -->
<?php include_once('footer.php') ?>