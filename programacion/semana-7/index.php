<?php 

  //////////////////////////////// EJERCICIO 1 ////////////////////////////////
  echo "<h2>Ejercicio 1</h2>";
  $sin_nombre = '';
  $sin_email = '';
  $enviar_copia = false;
  $datos_correctos = false;

  if ($_SERVER["REQUEST_METHOD"] == "POST") { // cuando el formulario es enviado
    if (!$_POST['nombre']) {
      $sin_nombre = 'El nombre es requerido';
    } elseif (!$_POST['email']) {
      $sin_email = 'El email es requerido';
    } else {

      $datos_correctos = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulario</title>
</head>
<body>
  <h3>Formulario de contacto</h3>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <p>
      <input type="text" name="nombre" placeholder="Nombre">
      <?php echo $sin_nombre; ?>
    </p>
    <p>
      <input type="text" name="apellido" placeholder="Apellido">
    </p>
    <p>
      <input type="email" name="email" placeholder="Email">
      <?php echo $sin_email; ?>
    </p>
    <p>
      <input type="text" name="telefono" placeholder="Teléfono">
    </p>
    <p>
      <input type="text" name="ciudad" placeholder="Ciudad">
    </p>
    <p>
      <input type="text" name="pais" placeholder="País">
    </p>
    <textarea rows="20" cols="30" name="comentario"></textarea>
    <p>
      <input type="checkbox" name="copia" id="copia" value="si">
      <label for="copia">Enviarme una copia</label>
    </p>
    <input type="submit" value="Enviar Mensaje" name="submit">
  </form>

  <!-- ////////////////////////////////// EJERCICIO 2 ////////////////////////////////// -->
  <h2>Ejercicio 2</h2>
  <p>En el ejercicio 2 se usarán los datos del formulario para almacenarlos en la clase estándar de PHP llamada <em>ArrayObject</em> y recorrerlos con un ciclo for</p>
  <?php if ($datos_correctos) { ?>
    <h3>Tus datos son</h3>
    <ul>
      <?php 

        $datos = new ArrayObject($_POST); // librería estándar PHP

        foreach ($datos as $key => $value) {

          // Evitar imprimir el "submit" en el la lista, ya que es innecesario
          if ($key == 'submit') continue 
      ?>

          <!-- En caso de que no se decida enviar la copia, simplemente no se imprimirá en la lista, ya que no existirá en la variable $_POST -->
          <li><?php echo ucfirst($key) ?>: <?php echo $value; ?></li>
          
      <?php } ?>
    </ul>
  <?php } ?>
</body>
</html>
