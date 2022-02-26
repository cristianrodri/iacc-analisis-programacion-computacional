import profesor

Profesor = profesor.Profesor

class Aula(Profesor):
  # Método constructor
  def __init__(self, nombre, apellido, numeroAlumnos):

    # Se llama al constructor de la clase padre
    Profesor.__init__(self, nombre, apellido)
    self.numeroAlumnos = numeroAlumnos

    print("El(la) profesor(a) jefe del curso se llama " + self.nombreCompleto() + " y posee " + str(self.numeroAlumnos) + " alumnos")

  # Método destructor
  def __del__(self):
    print("\nEl curso de " + self.nombreCompleto() + " se fue de vacaciones :) \n")

  def asignarPresidenteCurso(self, nombre):
    print(nombre + " es el nuevo(a) presidente de curso")

  def agregarCompaneroNuevo(self, nombre):
    self.numeroAlumnos += 1
    print("Ha ingresado un compañero(a) nuevo(a) llamado(a) " + nombre + " por lo que el curso ahora cuenta con " + str(self.numeroAlumnos) + " alumnos")