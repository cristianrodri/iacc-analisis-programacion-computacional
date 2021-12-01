<?php

  //////////////////////////////// ARREGLO UNIDIMENSIONAL //////////////////////////////////
  echo "<h2>Arreglo unidimensional</h2>";

  $numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
  $accumulador_unidimensional = 0;

  foreach ($numeros as $numero) {
    $accumulador_unidimensional += $numero;
  }

  echo "El promedio de la suma del 1 a 10 es " . $accumulador_unidimensional / count($numeros);

  //////////////////////////////// ARREGLO BIDIMENSIONAL //////////////////////////////////
  echo "<h2>Arreglo bidimensional</h2>";

  $estudiantes = array(
    array('estudiante' => 'JOHN', 'nota' => 6.7),
    array('estudiante' => 'CLAUDIO', 'nota' => 5.5),
    array('estudiante' => 'CARLOS', 'nota' => 7.0),
    array('estudiante' => 'DAMIAN', 'nota' => 6.4),
    array('estudiante' => 'ESTEBAN', 'nota' => 5.8),
  );
  $accumulador_bidimensional = 0;

  foreach ($estudiantes as $estudiante) {
    $accumulador_bidimensional += $estudiante['nota'];
  }

  echo "El promedio de notas de los estudiantes es " . $accumulador_bidimensional / count($estudiantes);

?>