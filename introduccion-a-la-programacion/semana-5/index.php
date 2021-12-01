<?php

  function sumar($num1, $num2) {
    return $num1 + $num2;
  }

  function potencia($num1, $num2) {
    return pow($num1, $num2);
  }

  function multiplicar($num1, $num2) {
    return $num1 * $num2;
  }

  function dividir($num1, $num2) {
    if ($num2 == 0) {
      return "No válido";
    } else {
      return $num1 / $num2;
    }
  }

  function negrita($expresion) {
    return "<strong>".$expresion."</strong>";
  }

  // para ambos números se usarán números aleatorios entre el 0 y el 100
  $numero1 = rand(0, 100);
  $numero2 = rand(0, 100);

  echo "El primer número es $numero1 <br>";
  echo "El segundo número es $numero2 <br><br>";

  $operaciones = array(0 => 'sumar', 1 => 'potencia', 2 => 'multiplicar', 3 => 'dividir');

  // la operación a realizar se hará aleatoriamente
  $operacionSeleccionada = $operaciones[rand(0, 3)];

  switch ($operacionSeleccionada) {
    case 'sumar':
      echo "El resultado de la suma es ".negrita(sumar($numero1, $numero2));
      break;
    case 'potencia':
      echo "La potencia de $numero1 a la $numero2 es ".negrita(potencia($numero1, $numero2));
      break;
    case 'multiplicar':
      echo "El resultado de la multiplicación es ".negrita(multiplicar($numero1, $numero2));
      break;
    case 'dividir':
      echo "El resultado de la división es ".negrita(dividir($numero1, $numero2));
      break;
    default:
      echo "No se ha seleccionado ninguna operación";
      break;
  }

?>