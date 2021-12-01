<?php 

  $servidor = "localhost";
  $username = "username";
  $password = "password";

  // Crea la conexión
  $conn = new mysqli($servidor, $username, $password);

  // Verifica si hay un error en la conexión
  if ($conn->connect_error) {
    // con la función "die()" el script termina su ejecución aquí mismo, en caso de no haya conectado a la base de datos
    die("La conexión ha fallado: " . $conn->connect_error);
  }
  echo "Se ha conectado exitosamente";

  // Para cerrar la base de datos mediante código se usa el método llamado close()
  $conn->close();

?>