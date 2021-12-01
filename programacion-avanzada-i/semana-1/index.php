<?php

  // *************************** EJERCICIO 1 ***************************
  function ejercicio1() {
    echo '<h2>Ejercicio 1</h2>';

    $costo1 = 40000;
    $costo2 = 20000;
    $costo3 = 25000;
    define('IVA', 0.19);

    function costo_iva_incl($costo) {
      return $costo + $costo * IVA;
    }

    function frase_personalizada($frase) {
      return '<p>' . $frase . '</p>';
    }

    function formato_moneda($numero) {
      return number_format($numero, 0, ',', '.');
    }

    echo frase_personalizada('El costo del primer producto es $' . formato_moneda($costo1));
    echo frase_personalizada('El costo del segundo producto es $' . formato_moneda($costo2));
    echo frase_personalizada('El costo del tercer producto es $' . formato_moneda($costo3));
    echo frase_personalizada('El costo final con IVA incluido es de $' . formato_moneda(costo_iva_incl($costo1 + $costo2 + $costo3)));
  }

  // *************************** EJERCICIO 2 ***************************
  function ejercicio2() {
    echo '<h2>Ejercicio 2</h2>';

    $edad = 29;

    function calcularEdad($edad) {
      if($edad < 18) return 'Eres menor de edad, no podemos contratarte';
      else if($edad >= 18 && $edad <= 60) return 'Es posible que usted sea un candidato al cargo';
      else return 'Lo sentimos, pero usted no cumple el perfil del cargo';
    }

    echo 'Tu edad es de ' . $edad . ' años. ' . calcularEdad($edad);
  }

  // *************************** EJERCICIO 3 ***************************
  function ejercicio3() {
    echo '<h2>Ejercicio 3</h2>';

    // Arreglo bidimensional
    $arreglo = array(
      [29, 44],
      [55, 19]
    );

    // Esta variable siempre va a almacenar el primer número del arreglo y más adelante en el ciclo for puede ir cambiando si existe algún número mayor.
    $numeroMayor = $arreglo[0][0];

    foreach ($arreglo as $arreglo_interno) {
      foreach ($arreglo_interno as $valor) {
        if($valor > $numeroMayor) $numeroMayor = $valor;
      }
    }

    echo "El número mayor del arreglo bidimensional es " . $numeroMayor;
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Va a ejecutar cualquiera de las 3 funciones según el valor de la variable "ejercicio" correspondiente al atributo name de la etiqueta select del HTML
    switch($_POST['ejercicio']) {
      case 'ejercicio-1':
        ejercicio1();
        break;
      case 'ejercicio-2':
        ejercicio2();
        break;
      case 'ejercicio-3':
        ejercicio3();
        break;
      default:
        echo 'Este ejercicio no existe';
    }

  }

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Control Semana 1</title>
</head>

<body>
  <h1>Control Semana 1</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <select name="ejercicio">
      <option value="ejercicio-1" <?php if(count($_POST) && $_POST["ejercicio"] == "ejercicio-1") echo "selected";?>>
        Ejercicio 1
      </option>
      <option value="ejercicio-2" <?php if(count($_POST) && $_POST["ejercicio"] == "ejercicio-2") echo "selected";?>>
        Ejercicio 2
      </option>
      <option value="ejercicio-3" <?php if(count($_POST) && $_POST["ejercicio"] == "ejercicio-3") echo "selected";?>>
        Ejercicio 3
      </option>
    </select>
    <input type="submit" value="Chequear" style="cursor: pointer">
  </form>
</body>

</html>