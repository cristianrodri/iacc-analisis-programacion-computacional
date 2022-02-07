import numpy as np

asistenciaMatematicas = np.array([])
asistenciaFisica = np.array([])
registroMatematicas = np.array([])
registroFísica = np.array([])
meses = ['enero', 'febrero']

print("Registro de asistencia de enero y febrero de las clases de máteméticas y física:\n")

print("Escriba 1 si asistió. De lo contrario escriba cualquier letra")

# En esta ocasión cada ramo tiene 4 clases por mes, por lo que se preguntará 4 veces por cada ramo en los 2 meses

registroMatematicas = np.array([])

# Asistencia de matematicas
for mes in range(0, 2):
  for numeroClase in range(1, 5):
    asistencia = input("¿Asistió a la clase " + str(numeroClase) + " de matemáticas en el mes de " + meses[mes] + "? ")
    # Añade lo que escriba el usuario en el arreglo
    asistenciaMatematicas = np.append(asistenciaMatematicas, [asistencia])

# El siguiente código divide el arreglo en 2, ya que las todas de enero y febrero se almacenan juntas en "asistenciaMatematicas". Pasa de [1,2,3,4,5,6,7,8] a [[1,2,3,4], [5,6,7,8]]
registroMatematicas = asistenciaMatematicas.reshape(2, 4)
print("La asistencia en matemáticas ha sido la siguiente: ")
print(registroMatematicas)
print("\n")

# Asistencia de física
for mes in range(0, 2):
  for numeroClase in range(1, 5):
    asistencia = input("¿Asistió a la clase " + str(numeroClase) + " de física en el mes de " + meses[mes] + "? ")
    asistenciaFisica = np.append(asistenciaFisica, [asistencia])

registroFisica = asistenciaFisica.reshape(2, 4)
print("La asistencia en física ha sido la siguiente: ")
print(registroFisica)
print("\n")

# La variable totalAsistencias tendrá los siguientes valores [[asist matematicas enero, asist matematicas febrero], [asist fisica enero, asist física febrero]
totalAsistencias = [[], []]

# Suma de las asistencias de matématicas
for mes in range(0, 2):
  sumaAsistencias = 0
  for i in range(0, 4):
    if registroMatematicas[mes][i] == '1':
      sumaAsistencias += 1
  else:
    # Añade las asistencias de física
    totalAsistencias[0].append(sumaAsistencias)

# Suma de las asistencias de física
for mes in range(0, 2):
  sumaAsistencias = 0
  for i in range(0, 4):
    # Si valor del arreglo corresponde a '1' entonces el usuario si asistó a la clase
    if registroFisica[mes][i] == '1':
      sumaAsistencias += 1
  else:
    # Añade las asistencias de física
    totalAsistencias[1].append(sumaAsistencias)

print("El total de asistencia ha sido la siguiente ")
print(totalAsistencias)

# Ejercicio 2

arregloUnido = np.array(totalAsistencias).flatten()
print(arregloUnido)

# Función propia que suma el total de asistencias
def suma(arreglo):
  suma = 0
  for x in arreglo:
    suma += x
  return suma

totalSuma = suma(arregloUnido)
print(totalSuma)

