<?php

  $arreglo_estudiantes= array(
    array('estudiante' => 'JOHN', 'nota' => 6.7),
    array('estudiante' => 'CLAUDIO', 'nota' => 5.5),
    array('estudiante' => 'CARLOS', 'nota' => 7.0),
    array('estudiante' => 'DAMIAN', 'nota' => 6.4),
    array('estudiante' => 'ESTEBAN', 'nota' => 5.8),
  );

  // se trata de acceder a la nota de Damian
  echo $arreglo_estudiantes[3]['nota'];

?>