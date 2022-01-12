<?php

  session_start();

  // Si no existen estudiantes dentro de la sesión, entonces almacenar un arreglo vacío en la variable
  $estudiantes = $_SESSION['estudiantes'] ?? [];

  $agregado = false;

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);

    // Agregar al estudiante dentro del array "estudiantes" de la sesión

    // El nuevo id será el total del elementos dentro de "estudiantes" + 1
    $nuevo_id = count($estudiantes) + 1;

    $_SESSION['estudiantes'][$nuevo_id] = [
      'id' => $nuevo_id,
      'nombre' => $nombre,
      'apellido' => $apellido,
      'notas' => [],
    ];

    $agregado = true;
  }

  // Añade el marcado inicial de HTML
  include_once('header.php');

?>

<div class="container d-flex flex-column" style="width: 400px">
  <h1 class="text-center my-3">Agregar estudiante</h1>

  <!-- Muestra mensaje de éxito cuando el estudiante es agregado  -->
  <?php if($agregado): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo ucfirst($_POST['nombre']) . ' ' . ucfirst($_POST['apellido']) ?></strong> ha sido agregado al
    curso.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="mb-3">
      <label for="inputNombre" class="form-label">Nombre</label>
      <input type="text" class="form-control" name="nombre" id="inputNombre" aria-describedby="emailHelp" autofocus
        required>
    </div>
    <div class="mb-3">
      <label for="inputApellido" class="form-label">Apellido</label>
      <input type="text" class="form-control" name="apellido" id="inputApellido" required>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
</div>

<!-- Añade el marcado final de HTML -->
<?php include_once('footer.php') ?>