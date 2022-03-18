import persona

Persona = persona.Persona

class Paciente(Persona):
  def __init__(self, nombre, apellido, rut, direccion):
    Persona.__init__(self, nombre, apellido, rut, direccion)

  def __str__(self):
    return f"""
nombre: {self.nombre_completo()}
RUT: {self.rut}
dirección: {self.direccion}
    """
