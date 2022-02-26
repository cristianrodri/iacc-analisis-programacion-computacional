class Profesor:
  def __init__(self, nombre, apellido):
    self.nombre = nombre
    self.apellido = apellido

  def nombreCompleto(self):
    return self.nombre + " " + self.apellido