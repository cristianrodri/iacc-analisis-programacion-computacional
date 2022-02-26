import supermercado
import aula

# Se llama a las clases dentro de los archivos
Supermercado = supermercado.Supermercado
Aula = aula.Aula

print("\n---------------- SUPERMERCADO ----------------\n")

# Objeto 1
supermercado1 = Supermercado("Unimarc", 80)
supermercado1.contratarEmpleado("Francisco Rojas")
supermercado1.ingresarOferta("Carnes", 30)


# Objeto 2
supermercado1 = Supermercado("Lider", 70)
supermercado1.contratarEmpleado("Francisco Rojas")
supermercado1.ingresarOferta("Bebidas", 50)


print("\n---------------- AULA ----------------\n")

# Objeto 1
aula1 = Aula("María", "Vargas", 20)
aula1.agregarCompaneroNuevo("Alfredo Vásquez")
aula1.asignarPresidenteCurso("Sonia Figueroa")

# Objeto 2
aula2 = Aula("Sonia", "Soto", 25)
aula2.agregarCompaneroNuevo("Claudio López")
aula2.asignarPresidenteCurso("Ivana Paredes")