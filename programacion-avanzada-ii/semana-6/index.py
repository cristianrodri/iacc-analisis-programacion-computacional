import paciente
import medico

Paciente = paciente.Paciente
Medico = medico.Medico

medicos = []

print('******************************** PACIENTES ********************************\n')

# Objetos Paciente
paciente1 = Paciente("Carlos", "Vargas", "17.003.238-7", "Holanda 55")
paciente2 = Paciente("Sonia", "López", "19.562.999-1", "Toledo 74")
print(paciente1)
print(paciente2)

paciente1.estado_actual('en espera')
paciente2.estado_actual('atendiéndose')

print('\n******************************** MÉDICOS ********************************\n')

# Objetos Medico
medico1 = Medico("Daniel", "Vidal", "11.876.333-5", "Las Violetas 330", "Traumatólogo")
medico2 = Medico("Fabiola", "Ojeda", "16.134.731-1", "Los Claveles 78", "Ginecóloga")
medicos.append(medico1.nombre_completo())
medicos.append(medico2.nombre_completo())
print(medico1)
print(medico2)

medico1.estado_actual('ocupado')
medico2.estado_actual('ocupado')

print('\n******************************** SOBRECARGA ********************************\n')

def anadir_paciente(doctor, paciente):
    print("El(la) " + doctor.especialidad + " añade a su agenda al paciente " + paciente.nombre_completo() + " por un control")

def anadir_paciente(doctor, paciente, patologia):
  print("El(la) " + doctor.especialidad + " añade a su agenda al paciente " + paciente.nombre_completo() + " por " + patologia)

anadir_paciente(medico1, paciente1, "esguince de tobillo")

print('\n******************************** ITERADOR (MÉDICOS) ********************************\n')
iter_medicos = iter(medicos)

print(next(iter_medicos))

# Ahora se imprime el otro médico (manualmente)
print(next(iter_medicos))