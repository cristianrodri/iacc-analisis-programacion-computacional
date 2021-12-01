<?php

  //////////////////////////////// EJERCICIO 1 //////////////////////////////////
  echo "<h2>Ejercicio 1</h2>";
  $edades[] = 17;
  $edades[] = 35;
  $edades[] = 25;
  $edades[] = 87;
  $edades[] = 15;
  $edades[] = 9;
  $edades[] = 69;
  $edades[] = 5;
  echo $edades[3];

  //////////////////////////////// EJERCICIO 2 //////////////////////////////////
  echo "<h2>Ejercicio 2</h2>";
  for ($i = 0; $i < count($edades); $i++) {
    echo "Índice: $i - Edad: $edades[$i]<br>";
  }

  //////////////////////////////// EJERCICIO 3 //////////////////////////////////
  echo "<h2>Ejercicio 3</h2>";
  $respuesta = array(false, true, false, true, true, false);
  var_dump($respuesta[2]);

  //////////////////////////////// EJERCICIO 4 //////////////////////////////////
  echo "<h2>Ejercicio 4</h2>";
  $arregloA = array(1, 2, 3, 4, 5);
  $arregloB = array(6, 7, 8, 9, 10);

  for ($i=0; $i < count($arregloA); $i++) { 
    $resultado[$i] = $arregloA[$i] + $arregloB[$i];
  }

  print_r($resultado);

  //////////////////////////////// EJERCICIO 5 //////////////////////////////
  echo "<h2>Ejercicio 5</h2>";
  $ingles = 'inglés';
  $frances = 'francés';
  $aleman = 'aleman';
  $espanol = 'español';

  // arreglo bidimensional
  $numeroEmpleados = array(
    'básico'   => array($ingles => 1, $frances => 14, $aleman => 8, $espanol => 3), // BÁSICO [0]
    'medio'    => array($ingles => 6, $frances => 19, $aleman => 7, $espanol => 2), // MEDIO [1]
    'avanzado' => array($ingles => 3, $frances => 13, $aleman => 4, $espanol => 1), // AVANZADO [2]
  );

  foreach ($numeroEmpleados as $nivel => $arrayInterno) {
    echo "En el nivel <strong>$nivel</strong> hay<br>";

    foreach ($arrayInterno as $idioma => $cantidad) {
      echo "<strong>$cantidad</strong> empleado(s) que domina(n) $idioma<br>";
    }
    echo "<br>";
  }

?>