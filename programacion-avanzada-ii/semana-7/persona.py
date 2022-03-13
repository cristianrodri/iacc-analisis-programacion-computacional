class Persona():
  def __init__(self, id, nombre, apellido, rut, direccion):
    self.id = id
    self.nombre = nombre
    self.apellido = apellido
    self.rut = rut
    self.direccion = direccion

  def nombre_completo(self):
    return self.nombre + " " + self.apellido