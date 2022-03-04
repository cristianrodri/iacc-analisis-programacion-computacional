import persona

Persona = persona.Persona

class Medico(Persona):
  def __init__(self, nombre, apellido, rut, direccion, especialidad):
    Persona.__init__(self, nombre, apellido, rut, direccion)

    self.especialidad = especialidad

  def __str__(self):
    return f"El(la) médico se llama {self.nombre_completo()}, su rut es {self.rut}, su dirección es {self.direccion} y su especialidad es {self.especialidad}"

  # Sobreescribe el método abstracto de la clase persona
  def estado_actual(self, estado):
    print("El estado actual del doctor " + self.apellido + " es " + estado)
