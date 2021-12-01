<?php

  //////////////////////////////// EJERCICIO 1 //////////////////////////////////
  echo "<h2>Ejercicio 1</h2>";

  function candidato($edad) {
    echo "Edad $edad = ";
    if ($edad < 18) {
      echo "Eres menor de edad, no podemos contratarte<br>";
    } else if ($edad >= 18 && $edad <= 60) {
      echo "Es posible que usted sea un candidato al cargo<br>";
    } else { // No se necesita escribir la condición, ya que se asume que la persona es mayor de 60 si se llega a esta condición
      echo "Lo sentimos, pero usted no cumple el perfil del cargo<br>";
    }
  }

  $edad = 17;
  candidato($edad);

  $edad = 64;
  candidato($edad);

  $edad = 35;
  candidato($edad);

  //////////////////////////////// EJERCICIO 2 //////////////////////////////////
  echo "<h2>Ejercicio 2</h2>";
  $A = 4;
  $B = 5;
  $C = 10;
  $D = 3;
  $E = 7;
  $F = 9;

  $X = ($A<$B) or (!($A<>$C) and ($A + $B < $D or $A < $F));
  //   true(1)    ( !true(1) and (   9    <  3 or  4 <  9)
  //   true(1) or (  false   and (    false    or  false )
  //   true(1) or (  false   and false  )
  //   true(1) or false = true (RESULTADO = 1)

  $Y = $D * $B + $F - $A / $B * $F;
  //   (3 * 5) +  9 - (4 /  5 *  9) -> Se resulven primero las multiplicación y divisiones (de izquierda a derecha)
  //     15    +  9 -     7.2 = (RESULTADO = 16.8)

  echo "El valor de X es $X<br>";
  echo "El valor de Y es $Y<br>";

  //////////////////////////////// EJERCICIO 3 //////////////////////////////////
  echo "<h2>Ejercicio 3</h2>";

  echo "<h3>Ejemplo 1</h3>";
  $var1 = true;
  $var2 = false;
  $todo = $var1 && $var2; // se utiliza "&&" en este caso

  if ($todo) {
    print "<p>verdadero</p>\n";
  } else {
    print "<p>falso</p>\n";
  }

  echo "<h3>Ejemplo 2</h3>";
  $var1 = true;
  $var2 = false;
  $todo = $var1 and $var2; // se utiliza "and" en este caso
  if ($todo) {
    print "<p>verdadero</p>\n";
  } else {
    print "<p>falso</p>\n";
  }

  echo "En el ejemplo 1 el resultado es <strong>falso</strong> porque <strong>&&</strong> tiene mayor precedencia que el <strong>=</strong>, por lo que primero se evalúa la expresión <strong>var1 && var2</strong>, dando falso, ya que && nos indica si ambos valores dan verdadero. En este caso, no se cumple la condición.<br>";

  echo "En el ejemplo 2, el operador usado es <strong>and</strong>. Este al tener menor precedencia que el =, significa que el primero en operar es el =, dando como valor a <strong>'todo'</strong> el valor de <strong>var1</strong>. En consencuencia, se realiza la operación entre <strong>var1 and var2</strong>, dando un false. Sin embargo, como el resultado de <strong>'todo'</strong> ya tiene almacenado la variable var1, el valor de <strong>'todo'</strong> es true.";

?>