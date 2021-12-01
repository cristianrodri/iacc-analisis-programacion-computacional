<?php

  //////////////////////////////// EJERCICIO 1 //////////////////////////////////
  echo "<h2>Ejercicio 1</h2>";
  for ($i=30; $i >= 10; $i--) { 
    echo $i . ' ';
  }

  //////////////////////////////// EJERCICIO 2 //////////////////////////////////
  echo "<h2>Ejercicio 2</h2>";
  $i = 1;

  while($i < 6) {
    echo $i * 2 . ' ';
    $i++;
  }

  //////////////////////////////// EJERCICIO 3 //////////////////////////////////
  echo "<h2>Ejercicio 3</h2>";
  $mes_referencia = date('n'); // obtiene el mes actual en número (1-12)
  $mes_seleccionado = '';

  switch ($mes_referencia) {
    case 1:
      $mes_seleccionado = 'Enero';
      break;
    case 2:
      $mes_seleccionado = 'Febrero';
      break;
    case 3:
      $mes_seleccionado = 'Marzo';
      break;
    case 4:
      $mes_seleccionado = 'Abril';
      break;
    case 5:
      $mes_seleccionado = 'Mayo';
      break;
    case 6:
      $mes_seleccionado = 'Junio';
      break;
    case 7:
      $mes_seleccionado = 'Julio';
      break;
    case 8:
      $mes_seleccionado = 'Agosto';
      break;
    case 9:
      $mes_seleccionado = 'Septiembre';
      break;
    case 10:
      $mes_seleccionado = 'Octubre';
      break;
    case 11:
      $mes_seleccionado = 'Noviembre';
      break;
    case 12:
      $mes_seleccionado = 'Diciembre';
      break;
    default:
      $mes_seleccionado = 'No válido';
  }

  echo "El mes seleccionado es $mes_seleccionado";

  //////////////////////////////// EJERCICIO 4 //////////////////////////////////
  echo "<h2>Ejercicio 4</h2>";
  $sueldo_trabajador = 400000;
  $antiguedad = rand(0, 15); // años de antigüedad entre 0 a 15 años
  $year_string = abs($antiguedad) === 1 ? 'año' : 'años';
  $aumento = 0;

  if ($antiguedad >= 10) {
    $aumento = 0.1;
  } elseif ($antiguedad < 10 && $antiguedad >= 5) {
    $aumento = 0.07;
  } elseif ($antiguedad < 5 && $antiguedad >= 3) {
    $aumento = 0.05;
  } elseif ($antiguedad < 3 && $antiguedad >= 0) { // se coloca >= 0 para no aumentar el sueldo en el extraño caso de colocar un número negativo
    $aumento = 0.03;
  }

  $sueldo_aumentado = $sueldo_trabajador + ($sueldo_trabajador * $aumento);
  $formato_moneda = '$ ' . number_format($sueldo_aumentado, 0, '', '.'); // formato moneda en peso chileno
  echo "El sueldo del trabajador con $antiguedad $year_string de antigüedad es de $formato_moneda";

  //////////////////////////////// EJERCICIO 5 //////////////////////////////
  echo "<h2>Ejercicio 5</h2>";
  $total_personas = 20;
  $i = 1;
  $total_aceptados = 0;
  $total_rechazados = 0;

  while ($i <= $total_personas) {
    $edad = rand(15, 25);
    $altura = rand(150, 200) / 100; // se obtiene una altura random en centímetros y se divide por 100

    if ($edad >= 18 && $altura >= 1.70) {
      // test
      echo "<strong>$edad años - $altura mt.</strong><br>";
      $total_aceptados++;
    } else {
      echo "$edad años - $altura mt.<br>";
      $total_rechazados++;
    }

    $i++;
  }

  echo "<br>";
  echo "De un total de $total_personas personas, $total_aceptados fueron aceptados y $total_rechazados fueron rechazados."
?>
