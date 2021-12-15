<?php

  session_start();

  // Listado de productos
  $productos = array(
    ['id' => '1', 'nombre' => 'Mochila', 'precio' => 14900, 'imagen' => 'https://www.publicdomainpictures.net/pictures/370000/nahled/hiking-backpack.jpg'],
    ['id' => '2', 'nombre' => 'Lápiz', 'precio' => 900, 'imagen' => 'https://s.cornershopapp.com/product-images/1119374.jpg?versionId=6.wHZPAMqJ4TFzwm4SFUOtcp.qgEhUyw'],
    ['id' => '3', 'nombre' => 'Cuarderno', 'precio' => 2500, 'imagen' => 'https://s.cornershopapp.com/product-images/1013640.jpg?versionId=ZPgLXjHuNZws259gdqv57hWKkbKYwUVl'],
    ['id' => '4', 'nombre' => 'Marcador', 'precio' => 2000, 'imagen' => 'https://p1.piqsels.com/preview/477/581/136/highlighter-marker-pen-green-drawing-design-thumbnail.jpg'],
    ['id' => '5', 'nombre' => 'Goma', 'precio' => 700, 'imagen' => 'https://image.shutterstock.com/image-photo/pen-ink-eraser-isolated-on-260nw-696802756.jpg']
  );

  $agregadoAlCarrito = false;
  $nombreArticuloAgregado = '';

  // Cuando algún botón de agregar al carrito, llama al método post y muestra un mensaje de éxito
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agregadoAlCarrito = true;
    $id_articulo = (int)$_POST['id_articulo'];

    // Busca el producto en el arreglo "productos" mediante el índice (el índice del array comienza en 0 y el id del producto en 1, por eso se resta por -1)
    $producto = $productos[$id_articulo - 1];

    // Almacena el nombre del artículo para mostrarlo en el mensaje de éxito
    $nombreArticuloAgregado = $producto['nombre'];

    // Se agrega el producto al arreglo "productos" de la "sesión". Su asociación va a ser el id del producto
    $_SESSION["productos"][$producto['id']] = $producto;
    // Al producto recién agregado a la sesión se le agrega la cantidad
    $_SESSION["productos"][$producto['id']]['cantidad'] = (int)$_POST['cantidad'];
  }

  // Añade el marcado inicial del HTML
  include_once 'header.php';

?>

<div class="container">

  <h1 class="text-center">Productos para comprar</h1>
  <div class="d-flex justify-content-center mt-3">
    <a href="carrito.php" class="btn btn-primary">Ir al carrito de compras</a>
  </div>

  <!-- Se muestra un mensaje de éxito cuando se agrega un artículo al carrito. -->
  <?php if($agregadoAlCarrito): ?>

  <div class="w-50 m-auto mt-3 alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo $nombreArticuloAgregado ?></strong> ha sido agregado al carrito de compras.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

  <?php endif; ?>


  <div class="container m-auto p-4 d-flex flex-wrap justify-content-center gap-3">

    <!-- Se imprimen todos los productos dinámicamente (Importante: name="cantidad" y name="id_articulo") -->

    <?php foreach ($productos as $producto): ?>
    <div class="card border border-primary" style="width: 14rem;">
      <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>"
        style="width: 100%; height: 150px; object-fit: cover">
      <div class="card-body">
        <h5 class="card-title"><?php echo $producto['nombre']; ?></h5>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <p class="d-flex justify-content-between">
            <input type="number" class="w-25" name="cantidad" value="1" min="1">
            <strong>$ <?php echo number_format($producto['precio'], 0, ',', '.') ?></strong>
          </p>
          <input type="text" name="id_articulo" value="<?php echo $producto['id']; ?>" class="d-none">
          <button type="submit" class="btn btn-primary">Agregar al carrito</button>
        </form>
      </div>
    </div>
    <?php endforeach; ?>

  </div>
</div>

<!-- Añade el marcado final del HTML -->
<?php include_once 'footer.php'; ?>