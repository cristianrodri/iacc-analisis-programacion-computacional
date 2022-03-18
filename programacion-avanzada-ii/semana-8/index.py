import paciente
import medico

Paciente = paciente.Paciente
Medico = medico.Medico

# Nombre de los archivos
NOMBRE_ARCHIVO_PACIENTES = 'pacientes.txt'
NOMBRE_ARCHIVO_MEDICOS = 'medicos.txt'
REPORTE_CITAS = 'citas.txt'

# ******************************** PACIENTES ******************************

# Objetos de la clase Paciente
paciente1 = Paciente("Carlos", "Vargas", "17.003.238-7", "Holanda 55")
paciente2 = Paciente("Sonia", "López", "19.562.999-1", "Toledo 74")

# Se crea un archivo llamado 'pacientes.txt' el cual añade los dos pacientes creados
archivoPacientes = open(NOMBRE_ARCHIVO_PACIENTES, 'a')
archivoPacientes.write(str(paciente1))
archivoPacientes.write(str(paciente2))

# ******************************** MÉDICOS ********************************

# Objetos de la clase Medico
medico1 = Medico("Daniel", "Vidal", "11.876.333-5", "Las Violetas 330", "Traumatólogo")
medico2 = Medico("Fabiola", "Ojeda", "16.134.731-1", "Los Claveles 78", "Ginecóloga")

# Se crea un archivo llamado 'medicos.txt' el cual añade los dos médicos creados
archivoPacientes = open(NOMBRE_ARCHIVO_MEDICOS, 'a')
archivoPacientes.write(str(medico1))
archivoPacientes.write(str(medico2))

# ******************************** CITAS ********************************
archivoCitas = open(REPORTE_CITAS, 'a')
archivoCitas.write(str(f"El(la) paciente {paciente1.nombre_completo()} se va a atender con el médico {medico1.nombre_completo()} por una fractura de tobillo.\n"))
archivoCitas.write(str(f"El(la) paciente {paciente2.nombre_completo()} se va a atender con el médico {medico2.nombre_completo()} por un control.\n"))