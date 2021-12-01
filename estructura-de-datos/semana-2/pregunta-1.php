<?php

  $arreglo_numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
  $acumulador = 0;

  for ($i=0; $i < count($arreglo_numeros) - 1; $i++) { 
    $acumulador += $arreglo_numeros[$i];
  }

  echo $acumulador;

?>