<?php

  session_start();

  $estudiantes = $_SESSION['estudiantes'] ?? [];
  $ramos = $_SESSION['ramos'] ?? [];

  // Añade el marcado inicial de HTML
  include_once('header.php');

?>

<h1 class="text-center my-3">Control de notas</h1>

<div class="container d-flex flex-column" style="width: 400px">
  <p>Este curso cuenta con <strong><?php echo count($estudiantes); ?></strong> estudiante(s) y con
    <strong><?php echo count($ramos); ?></strong> ramo(s).
  </p>

  <!-- Muestra una tabla de estudiantes si posee alguno dentro del arreglo "estudiantes" de la "sesión" -->
  <h2 class="text-center">Lista de estudiantes</h2>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nombre</th>
          <th>Apellido</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($estudiantes as $estudiante):?>
        <tr>
          <td><?php echo $estudiante['id'] ?></td>
          <td><?php echo ucfirst($estudiante['nombre']) ?></td>
          <td><?php echo ucfirst($estudiante['apellido'] )?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <!-- Muestra una tabla de ramos si posee alguno dentro del arreglo "estudiantes" de la "sesión" -->
  <h2 class="text-center">Lista de ramos</h2>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Ramos</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($ramos as $ramo):?>
        <tr>
          <td><?php echo ucfirst($ramo) ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


<!-- Añade el marcado final de HTML -->
<?php include_once('footer.php') ?>