import persona

Persona = persona.Persona

class Paciente(Persona):
  def __init__(self, nombre, apellido, rut, direccion):
    Persona.__init__(self, nombre, apellido, rut, direccion)

  def __str__(self):
    return f"El(la) paciente se llama {self.nombre_completo()}, su rut es {self.rut} y su dirección es {self.direccion}"

  # Sobreescribe el método abstracto de la clase persona
  def estado_actual(self, estado):
    print("Su estado actual del paciente " + self.nombre_completo() + " es " + estado)
