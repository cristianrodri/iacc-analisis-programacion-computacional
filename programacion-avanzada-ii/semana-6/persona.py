from abc import ABC, abstractmethod

class Persona(ABC):
  def __init__(self, nombre, apellido, rut, direccion):
    self.nombre = nombre
    self.apellido = apellido
    self.rut = rut
    self.direccion = direccion

  @abstractmethod
  def estado_actual(self):
    pass

  def nombre_completo(self):
    return self.nombre + " " + self.apellido