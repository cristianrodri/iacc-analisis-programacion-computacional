<?php

  session_start();

  // Si no encuentra el arreglo productos dentro de la sessión, entonces añade por defecto un array vacío
  $productos = $_SESSION['productos'] ?? [];

  // Calcula el precio final
  function suma_precios($productos) {
    return array_reduce($productos, function ($resultado, $producto) {
      $resultado += $producto['precio'] * $producto['cantidad'];
      return $resultado;
    }, 0);
  }

  $precioFinal = suma_precios($productos);

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Elimina el producto del carrito mediante el id
    $id = (int)$_POST['id_articulo'];
    unset($_SESSION['productos'][$id]);

    // Una vez eliminado el producto de la sesión se actualiza el array de productos
    $productos = $_SESSION['productos'];

    // Calcula nuevamente el precio final
    $precioFinal = suma_precios($productos);

  }

  // Añade el marcado inicial del HTML
  include_once 'header.php';

?>

<h1 class="text-center">Carrito de compras</h1>
<a href="productos.php" class="btn btn-primary">&lt;&lt; Volver a la galería de productos</a>

<!-- Cuando no hay productos en el carrito -->
<?php if(count($productos) === 0): ?>
<h2 class="mt-3 text-center text-decoration-underline">No hay productos en el carrito</h2>
<?php endif; ?>

<!-- Cuando si existen productos dentro del carrito -->
<?php if(count($productos) > 0): ?>

<div>
  <div class="d-flex flex-wrap gap-3 mt-4">

    <!-- Muestra todos los productos de la sesión -->
    <?php foreach($productos as $producto): ?>
    <div class="d-flex border border-primary">
      <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>" width="100" height="200"
        style="object-fit:cover;">
      <div class="d-flex p-3">
        <div>
          <strong><?php echo $producto['nombre']; ?></strong>
          <div>Cantidad: <strong><?php echo $producto['cantidad']; ?></strong></div>
        </div>
        <form class="align-self-end" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input type="text" class="d-none" name="id_articulo" value="<?php echo $producto['id']; ?>">
          <button type="submit" class="link-danger border-0 bg-transparent">Eliminar del carrito</button>
        </form>
        <div class="d-flex align-self-strech h5">$
          <?php echo number_format($producto['precio'] * $producto['cantidad'], 0, ',', '.'); ?></div>
      </div>
    </div>
    <?php endforeach; ?>

  </div>

  <div class="h4 mt-4">El total a pagar es <span
      class="h3"><?php echo '$ ' . number_format($precioFinal, 0, ',', '.'); ?></span></div>
</div>

<?php endif; ?>

<!-- Añade el marcado final del HTML -->
<?php include_once 'footer.php'; ?>