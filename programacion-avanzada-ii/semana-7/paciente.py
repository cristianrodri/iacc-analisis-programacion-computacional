import persona

Persona = persona.Persona

class Paciente(Persona):
  def __init__(self, id, nombre, apellido, rut, direccion, medico_id):
    Persona.__init__(self, id, nombre, apellido, rut, direccion)

    self.medico_id = medico_id

  def __str__(self):
    return f"""
      id: {self.id}
      nombre: {self.nombre_completo()}
      RUT: {self.rut}
      dirección: {self.direccion}
      id del médico: {self.medico_id}
    """
