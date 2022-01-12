<?php

  class Ramo {
    private array $estudiantes = [];
    private string $nombre;

    // Recibe como parámetro el nombre del ramo
    public function __construct(string $nombre) {
      $this->nombre = $nombre;
    }

    public function getNombre() {
      return $this->nombre;
    }

    public function getEstudiantes() {
      return $this->estudiantes;
    }

    public function anadirEstudiante(Estudiante $estudiante) {
      // Añade un estudiante al arreglo de estudiantes (recibe una instancia de la clase estudiante)
      array_push($this->estudiantes, $estudiante);

      $estudiante->anadirRamo($this->nombre);
    }
  }

?>