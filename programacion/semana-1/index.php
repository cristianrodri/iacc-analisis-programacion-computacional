<?php 

  // EJERCICIO 1
  echo "<strong>Ejercicio 1</strong>";

  $trabajadores = array(
    ['TRABAJADOR' => 'María Luisa Rojas', 'HORARIO' => '8 am a 3 pm', 'DEPARTAMENTO' => 'Producción'],
    ['TRABAJADOR' => 'José Pérez Márquez', 'HORARIO' => '3 pm a 10 pm', 'DEPARTAMENTO' => 'Seguridad'],
    ['TRABAJADOR' => 'Catalina Donoso Correa', 'HORARIO' => '10 pm a 6 am', 'DEPARTAMENTO' => 'Producción'],
    ['TRABAJADOR' => 'Raúl Lavín', 'HORARIO' => '8 am a 3 pm', 'DEPARTAMENTO' => 'Producción'],
    ['TRABAJADOR' => 'Jorge Luis Venegas', 'HORARIO' => '3 pm a 10 pm', 'DEPARTAMENTO' => 'Logística'],
  );

  echo '<table border="1">';
  echo '<tr>';
  echo '<th>TRABAJADOR</th>';
  echo '<th>HORARIO</th>';
  echo '<th>DEPARTEMENTO</th>';
  echo '</tr>';
  foreach ($trabajadores as $trabajador) {
    echo '<tr>';
    echo '<td>'.$trabajador['TRABAJADOR'].'</td>';
    echo '<td>'.$trabajador['HORARIO'].'</td>';
    echo '<td>'.$trabajador['DEPARTAMENTO'].'</td>';
    echo '</tr>';
  }
  echo '</table><br>';

  // EJERCICIO 2
  echo "<strong>Ejercicio 2</strong><br>";

  $datos = array(51, 10, 3);
  $promedio = ($datos[0] + $datos[1] + $datos[2]) / count($datos);
  echo "El promedio de $datos[0], $datos[1] y $datos[2] es $promedio<br><br>";

  // EJERCICIO 3
  echo "<strong>Ejercicio 3</strong><br>";

  define('UF', 27000);
  $precio_inmueble = 350; // en UF
  $precio_en_pesos = UF * $precio_inmueble;
  $formato_moneda = '$ ' . number_format($precio_en_pesos, 0, '', '.');

  echo "El precio del inmueble de $precio_inmueble UF es de $formato_moneda";

?>