<?php

  // Código requerido para usar la librería externa dompdf
  require 'vendor/autoload.php';
  use Dompdf\Dompdf;

  $nombre_archivo = 'arrendatarios.xml';

  // Si el archivo XML no existe al momento de iniciar la página, se crea uno nuevo y añade la etiqueta padre llamado "arrendatarios"
  if (!file_exists($nombre_archivo)) {
    $file = fopen($nombre_archivo, 'w');
    fwrite($file, '<arrendatarios></arrendatarios>');

    fclose($file);
  }

  // Usado en HTML para mostrar mensaje de éxito
  $agregado = false;

  // Va a ejecutarse el siguiente código cuando el formulario sea enviado, ya sea para agregar arrendatario o generar un pdf
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ejecuta el siguiente código cuando se agrega un nuevo arrendatario
    if (isset($_POST['guardar'])) {
      $xml = simplexml_load_file($nombre_archivo);

      // Obtiene los valores del formulario
      $nombre = ucfirst(htmlspecialchars($_POST['nombre']));
      $apellido = ucfirst(htmlspecialchars($_POST['apellido']));
      $rut = htmlspecialchars($_POST['rut']);
      $tiempo = htmlspecialchars($_POST['tiempo']);
      $monto = '$ ' . number_format($_POST['monto'], 0, ',', '.');
      $direccion = ucfirst(htmlspecialchars($_POST['direccion']));

      // Crea una etiqueta hija llamada "arrendatario" dentro de la etiqueta global arrendatarios (creada cuando se creo el archivo)
      $arrendatario = $xml->addchild('arrendatario');

      // Dentro de la etiqueta arrendatario creada anteriormente, crear las etiquetas con los datos del arrendatario
      $arrendatario->addChild('nombre', $nombre);
      $arrendatario->addChild('apellido', $apellido);
      $arrendatario->addChild('rut', $rut);
      $arrendatario->addChild('tiempo', $tiempo);
      $arrendatario->addChild('monto', $monto);
      $arrendatario->addChild('direccion', $direccion);

      $xml->asXml($nombre_archivo);

      $agregado = true;
    }

    // Ejecuta el siguiente código cuando se generar el pdf con los arrendatarios
    if (isset($_POST['generar-pdf'])) {
      // Se instancia la clase dompdf
      $dompdf = new Dompdf();

      // Se crea una estructura HTML a través de la variable $html
      $html = '<html><body>';
      $html .= '<h1>Lista de arrendatarios de Vive Feliz</h1>';
      $html .= '<table border="1" style="width: 100%; border-collapse: collapse;">';
      $html .= '<thead>';
      $html .= '<tr><th>Nombre</th><th>Apellido</th><th>Rut</th><th>Tiempo</th><th>Monto</th><th>Direccion</th></tr>';

      // Obtiene los arrendatarios guardados en el archivo xml
      $arrendatarios = simplexml_load_file($nombre_archivo);

      $html .= '<tbody>';
      foreach ($arrendatarios as $arrendatario) {
        $html .= '<tr>';
        $html .= '<td>' . $arrendatario->nombre . '</td>';
        $html .= '<td>' . $arrendatario->apellido . '</td>';
        $html .= '<td>' . $arrendatario->rut . '</td>';
        $html .= '<td>' . $arrendatario->tiempo . '</td>';
        $html .= '<td>' . $arrendatario->monto . '</td>';
        $html .= '<td>' . $arrendatario->direccion . '</td>';
        $html .= '</tr>';
      }

      $html .= '<tbody></table></body></html>';

      // Carga el HTML creado
      $dompdf->loadHtml($html);

      // Renderiza el HTML en pdf
      $dompdf->render();

      // Abre una ventana de diálogo del computador para descargar el pdf generado
      $dompdf->stream('arrendatarios.pdf');
    }
  }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Semana 8</title>
  <!-- Código proveniente de bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

</head>

<body>

  <div class="container" style="width: min(50%, 600px)">
    <h1 class="text-center mt-2">Arriendos Vive Feliz</h1>

    <?php if($agregado): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      El nuevo arrendatario ha sido guardado en el registro
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <form method="post" class="m-auto" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input required type="text" class="form-control" id="nombre" name="nombre" aria-describedby="nameHelp"
          autofocus>
      </div>
      <div class="mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input required type="text" class="form-control" id="apellido" name="apellido" aria-describedby="lastnameHelp">
      </div>
      <div class="mb-3">
        <label for="rut" class="form-label">Rut</label>
        <input required type="text" class="form-control" id="rut" name="rut" aria-describedby="rutHelp">
      </div>
      <div class="mb-3">
        <label for="tiempo" class="form-label">Tiempo de arriendo</label>
        <input required type="text" class="form-control" id="tiempo" name="tiempo" aria-describedby="tiempoHelp">
      </div>
      <div class="mb-3">
        <label for="monto" class="form-label">Monto de arriendo</label>
        <input required type="number" min="0" class="form-control" id="monto" name="monto" aria-describedby="montoHelp">
      </div>
      <div class="mb-3">
        <label for="direccion" class="form-label">Direccion de arriendo</label>
        <input required type="text" class="form-control" id="direccion" name="direccion"
          aria-describedby="direccionHelp">
      </div>
      <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
    </form>

    <form method="post" class="m-auto mt-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <button class="btn btn-primary" name="generar-pdf">Generar PDF con los arrendatarios</button>
    </form>
  </div>

  <script>
  // El siguiente código JavaScript ocasiona que siempre al momento de refrescar la página "manualmente" lo haga como GET y no como POST (cuando el formulario es enviado)
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
  </script>

</body>

</html>