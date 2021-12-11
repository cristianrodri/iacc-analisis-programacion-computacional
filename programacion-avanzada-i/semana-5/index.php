<?php

  echo "<h2>Control semana 5</h2>";
  $nombre_del_archivo = "compras.txt";

  //////////////////////////////// FUNCIÓN PARA CREAR EL ARCHIVO ////////////////////////////////
  function crear_archivo($nombre_del_archivo) {
    // "fopen" crear el archivo (gracias al segundo parámetro "w" (write)) y "die" detiene el programa si ocurre alguna falla
    $myfile = fopen($nombre_del_archivo, "w") or die("No se puede crear el archivo!");

    $texto = "árbol navideño = $9.000\n";
    fwrite($myfile, $texto);
    $texto = "luces = $3.500\n";
    fwrite($myfile, $texto);
    $texto = "adornos = $5.500\n";
    fwrite($myfile, $texto);
    $texto = "regalos = $15.000\n";
    fwrite($myfile, $texto);

    echo "El archivo <b>$nombre_del_archivo</b> ha sido creado exitosamente";

    // cierra el archivo
    fclose($myfile);
  }

  //////////////////////////////// FUNCIÓN PARA LEER EL ARCHIVO ////////////////////////////////
  function leer_archivo($nombre_del_archivo) {
    // ocupa la misma función fopen, sin embargo, el segundo parámetro "r" (read) se encarga de leer el archivo. "die" detiene la ejecución del script si ocurre algún eror.
    $myfile = fopen($nombre_del_archivo, "r") or die("No se puede abrir el archivo!");

    while (!feof($myfile)) {
      echo fgets($myfile) . "<br>";
    }

    // cierra el archivo
    fclose($myfile);
  }

  //////////////////////////////// FUNCIÓN PARA EDITAR EL ARCHIVO ////////////////////////////////
  function editar_archivo($nombre_del_archivo) {
    // Con la función "htmlspecialchars" le damos seguridad al texto que pongamos
    $nueva_compra = htmlspecialchars($_POST['nueva-compra']);
    $precio = number_format(intval($_POST['precio']), 0, ',', '.');

    if ($nueva_compra == '') {
      echo "No se aceptan campos vacíos";
      return;
    }

    $texto = "$nueva_compra = $$precio\n";

    echo "<p><b>$nueva_compra</b> ha sido agregado exitosamente</p>";

    // agrega el texto al final archivo.
    file_put_contents($nombre_del_archivo, $texto, FILE_APPEND | LOCK_EX);
  }

  if(isset($_POST['crear'])) crear_archivo($nombre_del_archivo);
  if(isset($_POST['leer'])) leer_archivo($nombre_del_archivo);
  if(isset($_POST['editar'])) editar_archivo($nombre_del_archivo);

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Semana 5</title>
  <style>
  button {
    cursor: pointer;
  }

  label {
    display: block;
  }

  p {
    text-decoration: underline;
  }
  </style>
</head>

<body>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <button name="crear" type="submit">Crear archivo</button>
    <button name="leer" type="submit">Leer archivo</button>

  </form>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>
      <h3>Agregar</h3>
      <input type="text" name="nueva-compra" placeholder="Agregar nueva compra">
      <input type="number" name="precio" min="0" value="0">
      <button name="editar" type="submit">Agregar compra</button>
    </label>
  </form>
</body>

</html>