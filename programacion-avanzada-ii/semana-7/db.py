import pymysql
import paciente
import medico

# Se importan las clases Medico y Paciente
Medico = medico.Medico
Paciente = paciente.Paciente

class Database:
  def __init__(self):
    self.conexion = pymysql.connect(
      host='localhost',
      user='root',
      passwd='',
      db='tarea-semana-7'
    )

    self.cursor = self.conexion.cursor()
    print("Conexión a la base de datos exitosa")

  # Obtiene la lista completa de alguno de los tipos de tablas (medico o paciente)
  def obtener_listado(self, tipo):
    sql = 'SELECT * FROM ' + tipo

    try:
      self.cursor.execute(sql)
      listado = self.cursor.fetchall()

      lista_db = []

      # Por cada médico obtenido de la base de datos, se crea una instancia de la clase Medico con sus datos y se almacena en el arreglo lista_db
      if tipo == 'medico':
        for listado in listado:
          lista_db.append(Medico(listado[0], listado[1], listado[2], listado[3], listado[4], listado[5]))
      # Por cada paciente obtenido de la base de datos, se crea una instancia de la clase Paciente con sus datos y se almacena en el arreglo lista_db
      elif tipo == 'paciente':
        for listado in listado:
          lista_db.append(Paciente(listado[0], listado[1], listado[2], listado[3], listado[4], listado[5]))

      return lista_db
    except Exception as e:
      raise

  # Obtiene la lista de 1 persona (médico o paciente) de la tabla
  def obtener_una_persona(self, tipo, id):
    sql = 'SELECT * FROM ' + tipo + ' WHERE id = ' + str(id)

    try:
      self.cursor.execute(sql)
      lista = self.cursor.fetchone()

      return lista

    except Exception as e:
      raise

  # Actualiza la columna "medico_id" de algún paciente de la base de datos
  def asignar_cita(self, paciente, medico, patologia):
    sql = 'UPDATE paciente SET medico_id = ' + str(medico.id) + ' WHERE id = ' + str(paciente.id)

    try:
      self.cursor.execute(sql)
      # el método commit provoca la actualización
      self.conexion.commit()

      # Se llama nuevamente al paciente para ver sus datos actualizados
      paciente_actualizado = self.obtener_una_persona('paciente', paciente.id)

      # Se actualiza el atributo "medico_id" del objeto paciente (obtenido como parámetro). Este valor provieve de la base de datos
      paciente.medico_id = paciente_actualizado[5]

      print(f"El(la) paciente {paciente.nombre_completo()} tiene una cita con el(la) {medico.especialidad} {medico.nombre_completo()} por un(a) {patologia}")

    except Exception as e:
      raise

  # Elimina una persona (médico o paciente) de la base de datos
  def eliminar_una_persona(self, tipo, id):
    sql = 'DELETE FROM ' + tipo + ' WHERE id = ' + str(id)

    try:
      self.cursor.execute(sql)
      # el método commit provoca la actualización
      self.conexion.commit()

      if self.cursor.rowcount == 1:
        print("Se ha eliminado un(a) " + tipo + " con el id " + str(id) + " de la base de datos")

    except Exception as e:
      raise