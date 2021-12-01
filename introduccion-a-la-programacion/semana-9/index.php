<?php 

  class Asignatura {
    // ATRIBUTOS
    private $estudiantes = [];

    // FUNCION CONSTUCTORA
    public function __construct(array $estudiantes) {
      $this->estudiantes = $estudiantes;
    }

    // METODOS
    function obtener_estudiantes() {
      return $this->estudiantes;
    }

    function total_estudiantes() {
      return count($this->estudiantes);
    }

    function promedio() {
      $suma = 0;

      // se suman las notas de los estudiantes y se almacena cada suma en la variable $suma
      foreach ($this->estudiantes as $estudiante) {
        $suma+=$estudiante['nota'];
      }
  
      $promedio_final = $suma / $this->total_estudiantes();

      // number_format es una función nativa de PHP que permite devolver un número en formato decimal con los decimales que uno quiera. En este caso nos devuelve un decimal (5.4, 6.0, 6.5)
      return number_format($promedio_final, 1);
    }

    function obtener_rut_mejor_calificado() {
      $rut = '';
      $nota = 0;

      foreach ($this->estudiantes as $estudiante) {
        // si la nota de un estudiante es mayor que la almacenada en $nota, entonces será la nota más alta hasta que aparezca una nota mayor. De igual manera, se almacenará el rut del estudiante de la nota mayor
        if ($estudiante['nota'] > $nota) {
          $nota = $estudiante['nota'];
          $rut = $estudiante['rut'];
        }
      }

      return $rut;
    }

    function cantidad_aprobados() {
      $aprobados = 0;
  
      foreach ($this->estudiantes as $estudiante) {
        if ($estudiante['nota'] >= 4) {
          $aprobados++;
        }
      }

      return $aprobados;
    }

    function cantidad_reprobados() {
      $reprobados = 0;

      foreach ($this->estudiantes as $estudiante) {
        if ($estudiante['nota'] < 4) {
          $reprobados++;
        }
      }

      return $reprobados;
    }

    function porcentaje_reprobados() {
      $reprobados = $this->cantidad_reprobados();
      $porcentaje = number_format($reprobados / $this->total_estudiantes() * 100);
  
      return "$porcentaje%";
    }
  } // llave que cierra la clase

  // array bidimensional que contiene un array de estudiantes y cada estudiante tendra un array interno el cual almacena su rut y su nota final
  $estudiantes = array(
    ['rut' => '13376614-6', 'nota' => 6.0],
    ['rut' => '22219607-8', 'nota' => 5.9],
    ['rut' => '13376744-4', 'nota' => 3.5],
    ['rut' => '14753994-0', 'nota' => 6.3],
    ['rut' => '16530196-2', 'nota' => 6.8],
    ['rut' => '18197219-k', 'nota' => 4.7],
    ['rut' => '14887812-9', 'nota' => 5.2],
    ['rut' => '22830813-7', 'nota' => 5.7],
    ['rut' => '18709525-8', 'nota' => 3.6],
    ['rut' => '21791122-2', 'nota' => 5.4],
    ['rut' => '19884993-9', 'nota' => 7.0],
    ['rut' => '21629656-7', 'nota' => 6.6],
    ['rut' => '13403012-7', 'nota' => 6.8],
    ['rut' => '18194078-9', 'nota' => 5.8],
    ['rut' => '18343426-0', 'nota' => 5.5],
    ['rut' => '17586943-3', 'nota' => 3.7],
    ['rut' => '12077233-3', 'nota' => 5.1],
    ['rut' => '14450263-9', 'nota' => 4.8],
    ['rut' => '19926311-0', 'nota' => 6.7],
    ['rut' => '16915168-k', 'nota' => 6.8],
    ['rut' => '17186937-7', 'nota' => 3.4],
    ['rut' => '19618047-0', 'nota' => 3.6],
    ['rut' => '12250897-8', 'nota' => 6.4],
    ['rut' => '16948164-4', 'nota' => 6.0],
    ['rut' => '15403025-8', 'nota' => 6.2]
  );

  // instancia de la clase asignatura
  $ramo = new Asignatura($estudiantes);
  $rutNotaMayor = $ramo->obtener_rut_mejor_calificado();

  $opciones = array('promedio', 'mejor_calificado', 'cantidad_aprobados', 'cantidad_reprobados', 'porcentaje_reprobados', 'total_estudiantes');
  $seleccion = $opciones[rand(0, count($opciones) - 1)];
  $resultadoSeleccionado;

  switch($seleccion) {
    case 'promedio':
      $resultadoSeleccionado = "La calificación promedio es " . $ramo->promedio();
      break;
    case 'mejor_calificado':
      $resultadoSeleccionado = "El estudiante mejor calificado es " . $rutNotaMayor;
      break;
    case 'cantidad_aprobados':
      $resultadoSeleccionado = "La cantidad de alumnos aprobados es de " . $ramo->cantidad_aprobados();
      break;
    case 'cantidad_reprobados':
      $resultadoSeleccionado = "La cantidad de alumnos reprobados es de " . $ramo->cantidad_reprobados();
      break;
    case 'porcentaje_reprobados':
      $resultadoSeleccionado = "La porcentaje de alumnos reprobados es de " . $ramo->porcentaje_reprobados();
      break;
    case 'total_estudiantes':
      $resultadoSeleccionado = "El total de estudiantes es de " . $ramo->total_estudiantes();
      break;
    default:
      $resultadoSeleccionado = '';
      break;
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estudiantes</title>
  <style>
  body {
    font-family: arial, sans-serif;
    display: flex;
  }

  table,
  div {
    flex: 1;
  }

  div {
    padding-left: 2rem;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  td,
  th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 8px;
  }

  h2 {
    margin-top: 1rem;
  }

  .bg-azul,
  .bg-rojo,
  .mejor-calificado {
    color: white;
  }

  .bg-azul {
    background-color: #325ca8;
  }

  .bg-rojo {
    background-color: rgb(233, 39, 39);
  }

  .mejor-calificado {
    background-color: limegreen;
  }

  span {
    display: inline-block;
    width: 25%;
    margin: .3rem;
    padding: .3rem;
    text-align: center;
  }
  </style>
</head>

<body>
  <div>
    <span class="mejor-calificado">Mejor nota</span>
    <span class="bg-azul">Aprobados</span>
    <span class="bg-rojo">Reprobados</span>
    <hr>
    <table>
      <tr>
        <th>Estudiante</th>
        <th>Promedio</th>
      </tr>
      <!-- A cada fila de la tabla se la añade un color dependiendo si aprueba, reprueba o es la nota mayor. 
      -->
      <?php foreach($ramo->obtener_estudiantes() as $estudiante) { ?>

      <tr class="
            <?php
              if ($rutNotaMayor == $estudiante['rut']) {
                echo 'mejor-calificado'; // le añade background verde al mejor estudiante mediante el selector ".mejor-calificado" de CSS
              } elseif ($estudiante['nota'] >= 4) {
                echo 'bg-azul'; // le añade background azul a los aprobados mediante el selector ".bg-azul" de CSS
              } else {
                echo 'bg-rojo'; // le añade background rojo a los reprobados mediante el selector ".bg-rojo" de CSS
              }
            ?>
          ">
        <td><?php echo $estudiante['rut']; ?></td>
        <td><?php echo number_format($estudiante['nota'], 1); ?></td>
      </tr>

      <?php } ?>
    </table>
  </div>

  <div>
    <h2>Opción Seleccionada</h2>
    <p><?php echo $resultadoSeleccionado; ?></p>
  </div>

</body>

</html>