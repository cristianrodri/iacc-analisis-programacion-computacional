<?php

  session_start();

  // Incluyen la clases Estudiante y Ramo
  include_once('clases/estudiante.php');
  include_once('clases/ramo.php');

  //////////////////////////////// GUARDA LOS RAMOS EN LA CLASE RAMO //////////////////////////////////

  // Se obtienen los ramos guardados de la sesión
  $ramos_guardados = $_SESSION['ramos'] ?? [];

  // Esta variable va a almacenar las instancias de la clase Ramo
  $instancias_ramos = [];

  foreach ($ramos_guardados as $ramo) {
    // Recorre los ramos guardados y crea instancias de la clase Ramo en base a esos ramos. Los almacena en el arreglo $ramos
    $instancias_ramos[$ramo] = new Ramo($ramo);
  }

  //////////////////////////////// GUARDA LOS ESTUDIANTES EN LA CLASE ESTUDIANTE //////////////////////////////

  // Se obtienen los estudiantes guardados de la sesión
  $estudiantes_guardados = $_SESSION['estudiantes'] ?? [];

  // Esta variable va a almacenar las instancias de la clase Estudiante
  $instancias_estudiantes = [];

  foreach ($estudiantes_guardados as $estudiante) {
    // Recorre los estudiantes guardados y crea instancias de la clase Estudiante en base a esos estudiantes. Los almacena en el arreglo $estudiantes y se asocian mediante el id del estudiante
    $instancias_estudiantes[$estudiante['id']] = new Estudiante($estudiante['nombre'], $estudiante['apellido'], $estudiante['notas']);
  }

  //////////////////////////////// GUARDA LAS INTANCIAS DE ESTUDIANTES EN CADA INSTANCIA DE RAMO  //////////////////////////////////
  foreach ($instancias_estudiantes as $estudiante) {
    foreach ($instancias_ramos as $ramo) {
      $ramo->anadirEstudiante($estudiante);
    }
  }

  $listadoEstudiantesPorRamo = [];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ramo = $_POST['ramo'];

    $instanciaRamo = $instancias_ramos[$ramo];
    // listadoEstudiantesPorRamo recibe la lista de estudiantes de uno de los ramos dado mediante $_POST['ramo']
    $listadoEstudiantesPorRamo = $instanciaRamo->getEstudiantes();
  }

  // Añade el marcado inicial de HTML
  include_once('header.php');

?>

<div class="container d-flex flex-column align-items-center">

  <h1 class="text-center my-3">Listado de notas</h1>

  <div class="d-flex justify-content-center gap-3">

    <!-- Imprime dos botones relacionados con los dos ramos disponibles -->
    <?php foreach ($ramos_guardados as $ramo): ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <button type="submit" name="ramo" value="<?php echo $ramo; ?>" class="btn btn-success">Notas de
        <?php echo $ramo; ?></button>
    </form>
    <?php endforeach; ?>

  </div>

  <!-- Se ejecuta cuando se presiona alguno de los dos botones creados previamente -->
  <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

  <h2 class="text-center my-3">Notas de <strong><?php echo $_POST['ramo']; ?></strong>
  </h2>

  <div class="table-responsive" style="width: 400px;">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Alumno</th>
          <th colspan="3">Notas</th>
        </tr>
      </thead>
      <tbody>
        <!-- Imprime los estudiantes del ramo dado y sus notas -->
        <?php foreach ($listadoEstudiantesPorRamo as $estudiante): ?>
        <tr>
          <td><?php echo $estudiante->getNombre() ?></td>

          <!-- Imprime las 3 notas. Si no tiene las 3 notas aún, se le agrega '-' al campo faltante -->
          <?php
            for ($i = 0; $i < 3; $i++) {
              $nota = $estudiante->getListadoNotas($_POST['ramo'])[$i] ?? '-';
              $claseCSS = $nota < 4 ? 'text-danger' : 'text-primary';
              $notaFormateada = $nota;

              if($nota === '-') $claseCSS = '';
              else $notaFormateada = number_format($nota, 1);

              echo "<td class='$claseCSS text-center' style='width: 50px;'>" . $notaFormateada . "</td>";

            }
          ?>

        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php endif; ?>

</div>

<!-- Añade el marcado final de HTML -->
<?php include_once('footer.php'); ?>