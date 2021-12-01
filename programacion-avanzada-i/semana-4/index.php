<?php

  //////////////////////////////// FUNCIÓN PARA CREAR LA BASE DE DATOS ////////////////////////////////
  function crear_db($servidor, $usuario, $contrasena) {
    // Se crea la conexión
    $conexion = new mysqli($servidor, $usuario, $contrasena);
    
    // Chequea la conexión
    if ($conexion->connect_error) {
      die("La conexión ha fallado: " . $conexion->connect_error);
    }

    // En la variable $sql se almacena la sentencia SQL para crear la base de datos deporte.
    $sql = "CREATE DATABASE deporte";

    // Chequea si la sentencia SQL es correcta (TRUE). Si es correcta, crea la base de datos existosamente. De lo contrario, el query nos dará falso, lo que significa que la base de datos deporte ya existe o que hubo un error en la sentencia SQL
    if ($conexion->query($sql) === TRUE) {
      echo "La base de datos deporte fue creada exitosamente";
    } else {
      echo "La base de datos deporte ya existe";
    }
  }

  //////////////////////////////// FUNCIÓN PARA CONECTARSE A LA BASE DE DATOS ////////////////////////////////
  function conexion_db($servidor, $usuario, $contrasena, $db) {
    // Conecta con la base de datos
    $conexion = new mysqli($servidor, $usuario, $contrasena, $db);

    // Chequea la conexión
    if ($conexion->connect_error) {
      die("La conexión ha fallado: " . $conexion->connect_error);
    }

    return $conexion;
  }

  //////////////////////////////// INICIA LA EJECUCIÓN ////////////////////////////////
  echo "<h2>Control Semana 4</h2>";

  $servidor = "localhost"; // servidor local de xampp
  $usuario = "root"; // usuario por defecto proveniente de xampp
  $contrasena = ""; // contraseña por defecto proveniente de xampp
  $base_de_datos= "deporte";
  $resultado = [];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // cuando se presiona el botón llamando a la creación de la base de datos (botón con el atributo name="crear")
    if (isset($_POST['crear'])) crear_db($servidor, $usuario, $contrasena);

    // muestra todos los datos
    if (isset($_POST['mostrar-todo'])) {
      $conexion = conexion_db($servidor, $usuario, $contrasena, $base_de_datos);

      $sql = "SELECT * FROM producto";
      $resultado = $conexion->query($sql);

    }

    // muestra el código y la descripcion de los productos mayores a $8.500
    if (isset($_POST['mayor-8500'])) {
      $conexion = conexion_db($servidor, $usuario, $contrasena, $base_de_datos);

      $sql = "SELECT codigo, descripcion FROM producto WHERE precio > 8500";
      $resultado = $conexion->query($sql);
    }

    // muestra los productos que comiencen con pelota
    if (isset($_POST['pelota'])) {
      $conexion = conexion_db($servidor, $usuario, $contrasena, $base_de_datos);

      $sql = "SELECT * FROM producto WHERE descripcion LIKE '%pelota%'";
      $resultado = $conexion->query($sql);
    }

    // muestra los primeros 5 productos
    if (isset($_POST['mostrar-5'])) {
      $conexion = conexion_db($servidor, $usuario, $contrasena, $base_de_datos);

      $sql = "SELECT * FROM producto LIMIT 5";
      $resultado = $conexion->query($sql);
    }

    // elimina los productos con códigos 4 y 5
    if (isset($_POST['eliminar'])) {
      $conexion = conexion_db($servidor, $usuario, $contrasena, $base_de_datos);

      $sql = "DELETE FROM producto WHERE codigo IN (4, 5)";

      if ($conexion->query($sql) === TRUE) {
        echo "Los productos con código 4 y 5 ya no existen";
      }

      // vuelve a mostrar los 5 primeros productos después de la eliminación
      $sql = "SELECT * FROM producto LIMIT 5";
      $resultado = $conexion->query($sql);
    }

  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Semana 4</title>
  <style>
  button {
    margin-top: 1rem;
    cursor: pointer;
  }

  table {
    border-collapse: collapse;
  }

  td,
  th {
    padding: 10px;
  }
  </style>
</head>

<body>
  <!-- FORMULARIO PARA CREAR LA BASE DE DATOS A TRAVÉS DE UN BOTÓN -->
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <button type="submit" name="crear">Crear base de datos deporte</button>
    <button type="submit" name="mostrar-todo">Mostrar todos los datos</button>
    <button type="submit" name="mayor-8500">Precio mayores a 8.500</button>
    <button type="submit" name="pelota">Mostrar productos que sean pelota</button>
    <button type="submit" name="mostrar-5">Mostrar 5 productos</button>

    <?php if (isset($_POST['mostrar-5'])) { ?>
    <!-- sólo mostrará el siguiente botón cuando la variable POST contenga "mostrar-5" como valor, ya que con esto se podrá hacer la eliminación solamente cuando se estén mostrando 5 productos -->
    <button type="submit" name="eliminar">Eliminar el producto 4 y 5</button>
    <?php } ?>
  </form>

  <table border="1">
    <thead>
      <tr>
        <th>Código</th>
        <th>Descripción</th>
        <!-- sólo mostrar el precio, stock y disciplina cuando la variable POST no sea "mayor-8500" -->
        <?php if (!isset($_POST['mayor-8500'])) { ?>
        <th>Precio</th>
        <th>Stock</th>
        <th>Disciplina</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <!-- la variable $resultado contiene un arreglo de los datos obtenidos de la base de datos y se imprimen en una tabla HTML -->
      <?php foreach ($resultado as $key) { ?>
      <tr>
        <td><?php echo $key["codigo"]; ?></td>
        <td><?php echo $key["descripcion"]; ?></td>
        <!-- sólo mostrar el precio, stock y disciplina cuando la variable POST no sea "mayor-8500" -->
        <?php if (!isset($_POST['mayor-8500'])) { ?>
        <td><?php echo $key["precio"]; ?></td>
        <td><?php echo $key["stock"]; ?></td>
        <td><?php echo $key["disciplina"]; ?></td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>