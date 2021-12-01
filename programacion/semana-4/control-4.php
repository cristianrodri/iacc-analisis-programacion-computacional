<?php 

  //////////////////////////////// EJERCICIO 1 /////////////////////////////////
  echo "<h2>Ejercicio 1</h2>";

  // Función que calcula el área de un triángulo
  function area_triangulo($base, $altura) {
    // Área de un triángulo -> (base * altura) / 2

    $area_triangulo = ($base * $altura) / 2;
    echo "El área de un triángulo es $area_triangulo<br>";
  }

  function area_cuadrado($area) {
    // Área de un cuadrado -> (area^2)

    $area_cuadrado = pow($area, 2);
    echo "El área de un triángulo es $area_cuadrado<br>";
  }

  function area_circulo($radio) {
    // Área de un cículo -> (PI * radio^2)

    $area_circulo = pi() * pow($radio, 2);
    echo "El área de un triángulo es $area_circulo";
    
  }
  
  // Se ejecutan las 3 funciones
  area_triangulo(5, 8);
  area_cuadrado(6);
  area_circulo(3);
  
  //////////////////////////////// EJERCICIO 2 //////////////////////////////////
  echo "<h2>Ejercicio 2</h2>";

  echo "Las extensiones para el manejo de variables son las siguientes: ";
  echo "<strong>empty, boolval, empty,
  floatval, get_defined_vars, gettype, intval, is_array,
  is_callable, is_null, isset, print_r, serialize, unset,
  unserialize, var_dump</strong><br>";
  echo "Por lo general, estas extensiones (funciones) se usan para chequear las variables, ya sea su tipo, si están definidas, si existen, mostrar su estructura completa, etc etc<br><br>";

  echo "Las extensiones para el manejo de funciones son las siguientes: ";
  echo "<strong>call_user_func_array, call_user_func, func_get_args,
  func_num_args, function_exists,
  get_defined_functions</strong><br>";
  echo "Este tipo de extensiones se usan para chequear las funciones, ya sea el número de argumentos que posee, la lista de argumentos que recibe, todas las funciones definidas, etc";

  //////////////////////////////// EJERCICIO 3 //////////////////////////////////
  echo "<h2>Ejercicio 3</h2>";

  echo "<strong>1) array_push()</strong> = añade un elemento al final del arreglo<br>";

  $arreglo = [1, 2, 3, 4, 5];

  print_r($arreglo);
  
  echo "<br><br>";
  echo "Se le añade un elemento<br>";
  
  array_push($arreglo, 6);
  print_r($arreglo);

  echo "<br><br>";

  echo "<strong>2) array_sum()</strong> = retorna la suma de los elementos de un array<br>";
  $suma = array_sum($arreglo);

  echo $suma;
  echo "<br><br>";

  echo "<strong>3) strrev()</strong> = retorno un string en reversa";
  $texto = 'iacc';
  echo "<br>";

  echo "iacc<br>";
  echo strrev($texto);
  echo "<br><br>";

  echo "<strong>4) strtoupper()</strong> = devuelve el string en mayúsculas<br>";
  echo strtoupper($texto);
  echo "<br><br>";

  echo "<strong>5) getdate()</strong> = devuelve un array con información de una fecha dada. Recibe como parámetro un timestamp. Si no recibe ningún parámetro, entonces brinda información sobre la fecha actual.<br>";
  print_r(getdate());

?>
