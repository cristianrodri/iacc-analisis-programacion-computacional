<?php

  define('SERVIDOR', 'localhost'); // servidor local de xampp
  define('USUARIO', 'root'); // usuario por defecto proveniente de xampp
  define('CONTRASENA', ''); // contraseña por defecto proveniente de xampp
  define('BASE_DE_DATOS', 'concesionario');

  $datosAgregados = false;

  // Conecta con la base de datos
  $conexion = new mysqli(SERVIDOR, USUARIO, CONTRASENA, BASE_DE_DATOS);

  // Chequea la conexión
  if ($conexion->connect_error) {
    die("La conexión ha fallado: " . $conexion->connect_error);
  }

  // Retorna la conexión
  return $conexion;

?>