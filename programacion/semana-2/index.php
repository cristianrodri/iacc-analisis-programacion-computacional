<?php 

  $variable = null;

  echo $variable;

  //////////////////////////////// EJERCICIO 1 ////////////////////////////////
  echo "<h2>Ejercicio 1</h2>";
  echo "<h3>Área de un triángulo</h3>";
  $base = 8;
  $altura = 5;
  $area_triangulo = ($base * $altura) / 2;
  echo "Dada la base $base y la altura $altura, el área de un triángulo es $area_triangulo";

  //////////////////////////////// EJERCICIO 2 ////////////////////////////////
  echo "<h2>Ejercicio 2</h2>";
  echo "<h3>Área de un círculo</h3>";
  define("PI", 3.1415);
  $radio = 8;
  $area = PI * pow($radio, 2);
  $area_circulo = number_format($area, 2, ',', '.');
  echo "Dado un radio de $radio, el área de un círculo es $area_circulo";

  //////////////////////////////// EJERCICIO 3 ////////////////////////////////
  echo "<h2>Ejercicio 3</h2>";
  $nombres = 'Cristian Andrés';
  $apellidos = 'Rodríguez López';
  $ciudad_nacimiento = 'Punta Arenas';
  echo "<strong>Nombre completo:</strong> $nombres $apellidos<br>";
  echo "<strong>Ciudad de nacimiento:</strong> $ciudad_nacimiento";

  //////////////////////////////// EJERCICIO 4 ////////////////////////////////
  echo "<h2>Ejercicio 4</h2>";

  echo "¡Tarea semana 1! <br>"; // se le añade el punto y coma faltante
  for($i = 0; $i < 15; $i++) {
    echo "Línea número: ".$i."<br>"; // se reemplaza "hecho" por "echo"
  }

  //////////////////////////////// EJERCICIO 5 ////////////////////////////////
  echo "<h2>Ejercicio 5</h2>";
  $tipos_de_datos = array(
    ['tipo' => 'boolean', 'acepta' => 'true o false', 'ejemplo' => '$var = true'],
    ['tipo' => 'integer', 'acepta' => 'números enteros, negativos, octal, hexadecimal', 'ejemplo' => '$var = 3455, $var = -56, $var = 7e'],
    ['tipo' => 'float', 'acepta' => 'números con decimales, con notación científica', 'ejemplo' => '$var = 34.5, $var = 2.65e+7'],
    ['tipo' => 'string', 'acepta' => 'cadena de texto en comillas simples o dobles', 'ejemplo' => '$var = "hola", $var = "iacc"'],
    ['tipo' => 'arrays', 'acepta' => 'múltiples valores de cualquier tipo', 'ejemplo' => '$var = array("texto", 2, true)'],
    ['tipo' => 'objects', 'acepta' => 'una instancia del objeto con la sentencia new', 'ejemplo' => '$object = new Objeto()'],
    ['tipo' => 'resource', 'acepta' => 'una referencia a un recurso externo', 'ejemplo' => 'mysql_connect()'],
    ['tipo' => 'null', 'acepta' => 'null (la variable no tiene valor)', 'ejemplo' => '$var = null'],
  )

?>

<!-- Código HTML debajo sólo será usado para el ejercicio 5 -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Control Semana 2</title>
</head>
<body>
  <table border="1">
    <tr>
      <th>Tipo de dato</th>
      <th>Acepta</th>
      <th>Ejemplo</th>
    </tr>
    <?php foreach ($tipos_de_datos as $dato) { ?>
      <tr>
        <td><?php echo $dato['tipo']; ?></td>
        <td><?php echo $dato['acepta']; ?></td>
        <td><?php echo $dato['ejemplo']; ?></td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
