<?php

  session_start();
  $estudiantes = $_SESSION['estudiantes'] ?? [];
  $ramos = $_SESSION['ramos'] ?? [];

  $agregado = false;
  $error = false;

  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nota = (float)$_POST['nota'];
    $id_estudiante = (int)$_POST['estudiante'];
    $ramo = $_POST['ramo'];

    $ramoDelEstudiante = isset($_SESSION['estudiantes'][$id_estudiante]['notas'][$ramo]);

    // Agregar la nota en el ramo del estudiante
    if ($ramoDelEstudiante) {

      // Sólo permite añadir la nota si el estudiante tiene menos de 3 notas en aquel ramo. El límite de notas por ramo es de 3
      if (count($_SESSION['estudiantes'][$id_estudiante]['notas'][$ramo]) < 3) {
        array_push($_SESSION['estudiantes'][$id_estudiante]['notas'][$ramo], $nota);
        $agregado = true;
      } else {
        $error = true;
      }
    } else {
      $_SESSION['estudiantes'][$id_estudiante]['notas'][$ramo] = [$nota];
      $agregado = true;
    }
  }

  // Añade el marcado inicial de HTML
  include_once('header.php');
?>

<div class="container d-flex flex-column" style="width: 400px">
  <h1 class="text-center my-3">Agregar nota</h1>

  <!-- Muestra mensaje de éxito cuando el ramo es agregado  -->
  <?php if($agregado): ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    La nota ha sido agregada
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

  <!-- Muestra mensaje de error -->
  <?php if($error): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Este alumno ya tiene las 3 notas para este ramo
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  <?php endif; ?>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="mb-3">
      <select class="form-select" aria-label="estudiantes" name="estudiante" required>
        <?php foreach($estudiantes as $estudiante): ?>
        <option value="<?php echo $estudiante['id'] ?>">
          <?php echo ucfirst($estudiante['nombre']) . ' ' . ucfirst($estudiante['apellido']) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <select class="form-select" aria-label="ramo" name="ramo" required>
        <?php foreach($ramos as $ramo): ?>
        <option value="<?php echo $ramo ?>">
          <?php echo ucfirst($ramo) ?></option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="inputNota" class="form-label">Agregar nota</label>
      <input type="number" min="1" max="7" step="0.1" class="form-control" name="nota" id="inputNota" required>
    </div>

    <button type="submit" class="btn btn-primary">Agregar</button>
  </form>
</div>

<!-- Añade el marcado final de HTML -->
<?php include_once('footer.php') ?>