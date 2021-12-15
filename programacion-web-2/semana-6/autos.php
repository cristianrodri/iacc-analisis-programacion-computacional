<?php

  // Conecta con la base de datos
  $conexion = require_once('database.php');

  // Obtiene los datos de la base de datos
  $sql = "SELECT * FROM autos";
  $result = $conexion->query($sql);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Eliminar un auto de la base de datos
    if(isset($_POST['eliminar'])) {
      $matricula = $_POST['eliminar'];

      $sql = "DELETE FROM autos WHERE matricula = '$matricula'";
      $conexion->query($sql);

      // Obtener nuevamente los autos de la base de datos para actualizar la tabla
      $sql = "SELECT * FROM autos";
      $result = $conexion->query($sql);
    }

    // Añadir descuento de 10 % a los BWM
    if (isset($_POST['descuento'])) {
      $sql = "UPDATE autos SET precio = precio - precio * 0.1 WHERE marca = 'BMW'";
      $conexion->query($sql);

      // Obtener nuevamente los autos de la base de datos para actualizar la tabla
      $sql = "SELECT * FROM autos";
      $result = $conexion->query($sql);
    }
  }

  // Marcado inicial HTML
  include_once('header.php');
?>

<div class="container">
  <h1 class="text-center mt-2">Autos</h1>

  <div class="d-flex justify-content-center m-3">
    <a href="formulario.php" class="btn btn-primary">Añadir auto</a>
  </div>

  <!-- Mostrar la tabla siempre y cuando existen autos dentro de la base de datos -->
  <?php if ($result->num_rows > 0): ?>

  <div class="table-responsive">
    <table class="table table-striped table-dark table-hover">
      <thead>
        <tr>
          <th scope="col">Matricula</th>
          <th scope="col">Motor</th>
          <th scope="col">Carrocería</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
          <th scope="col">Anio</th>
          <th scope="col">Color</th>
          <th scope="col">Precio</th>
          <th scope="col">#</th>
        </tr>
      </thead>
      <tbody>
        <!-- Recorre cada lista de autos en filas -->
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?php echo $row['matricula'];?></td>
          <td><?php echo $row['serial_motor'];?></td>
          <td><?php echo $row['serial_carroceria'];?></td>
          <td><?php echo $row['marca'];?></td>
          <td><?php echo $row['modelo'];?></td>
          <td><?php echo $row['anio'];?></td>
          <td><?php echo $row['color'];?></td>
          <td><?php echo '$ ' . number_format($row['precio'], 0, ',', '.');?></td>
          <td>
            <!-- Formulario post para eliminar el auto según su matricula -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
              <input type="text" class="d-none" name="eliminar" value="<?php echo $row['matricula']; ?>">
              <button class="btn btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <button class="btn btn-primary" name="descuento">Añadir 10% de descuento a los BMW</button>
  </form>

  <?php endif; ?>

  <!-- Si no se encuentran autos disponibles, mostrar el mensaje dado -->
  <?php if ($result->num_rows === 0): ?>
  <div class="h4 text-center">No se encuentran autos disponibles</div>
  <?php endif; ?>
</div>

<!-- Marcado final HTML -->
<?php include_once('footer.php'); ?>