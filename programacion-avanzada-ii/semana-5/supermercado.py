class Supermercado:
  # Método constructor
  def __init__(self, nombre, numeroEmpleados):
    self.nombre = nombre
    self.numeroEmpleados = numeroEmpleados

    print(self.nombre + " tiene " + str(self.numeroEmpleados) + " empleados")

  # Método destructor
  def __del__(self):
    print("\n" + self.nombre + " ha cerrado el día de hoy :(\n")

  def contratarEmpleado(self, nombre):
    self.numeroEmpleados += 1
    print(self.nombre + " ha contrado a " + nombre + " por lo que ahora el supermercado posee " + str(self.numeroEmpleados) + " empleados.")

  def ingresarOferta(self, producto, descuento):
    print(self.nombre + " tiene un " + str(descuento) + "% de descuento" + " en " + producto)