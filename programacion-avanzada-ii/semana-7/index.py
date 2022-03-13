import db

# Llama a la clase contenedora de la base de datos
database = db.Database()

# Obtiene la lista de médicos de la base de datos
medicos = database.obtener_listado('medico')

# Obtiene la lista de pacientes de la base de datos
pacientes = database.obtener_listado('paciente')

print('******************************** MÉDICOS ********************************')
medico1 = medicos[0]
medico2 = medicos[1]
print(medico1)
print(medico2)

print('******************************** PACIENTES ********************************')
paciente1 = pacientes[0]
paciente2 = pacientes[1]
print(paciente1)
print(paciente2)

print('******************************** ASIGNAR CITA ********************************')
database.asignar_cita(paciente1, medico1, 'fractura de muñeca')
database.asignar_cita(paciente2, medico2, 'control')

print('\n******************************** DATOS ACTUALIZADOS DEL PACIENTE ********************************')

print(paciente1)
print(paciente2)

print('******************************** SE ELIMINA EL PACIENTE 1 ********************************')
database.eliminar_una_persona('paciente', 1)
