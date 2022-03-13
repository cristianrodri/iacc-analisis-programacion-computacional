import persona

Persona = persona.Persona

class Medico(Persona):
  def __init__(self, id, nombre, apellido, rut, direccion, especialidad):
    Persona.__init__(self, id, nombre, apellido, rut, direccion)

    self.especialidad = especialidad

  def __str__(self):
    return f"""
      id: {self.id}
      nombre: {self.nombre_completo()}
      RUT: {self.rut}
      dirección: {self.direccion}
      especialidad: {self.especialidad}
    """
