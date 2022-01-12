<?php

  class Estudiante {
    private string $nombre;
    private string $apellido;
    private array $notas = [];

    public function __construct(string $nombre, string $apellido, array $notas) {
      $this->nombre = $nombre;
      $this->apellido = $apellido;
      $this->notas = $notas;
    }

    // Devuelve nombre y apellido
    public function getNombre() {
      return ucwords("$this->nombre $this->apellido");
    }

    public function anadirRamo($nombreRamo) {
      // Si el nombre del ramo dado como parámetro no existe dentro de las notas del estudiante (como array asociativo), entonces añadirlo como un array asociativo mediate el nombre del ramo.
      if (!isset($this->notas[$nombreRamo])) {
        $this->notas[$nombreRamo] = [];
      }
    }

    // Obtiene las notas de algún ramo dado como string
    public function getListadoNotas(string $ramo) {
      return $this->notas[$ramo];
    }
  }

?>