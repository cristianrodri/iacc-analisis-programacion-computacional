# Código 1
ropa = [["pantalones", 5], ["poleras", 7]]

print("El inventario cuenta con lo siguiente:")

i = 0

while i < len(ropa):
  print(ropa[i][0] + ": " + str(ropa[i][1]))
  i += 1

print("\nAhora se ha vendido un pantalón, por lo que inventario es:")

i = 0

while i < len(ropa):
  prenda = ropa[i][0]
  cantidad = ropa[i][1]

  if prenda == "pantalones":
    cantidad -= 1

  print(prenda + ": " + str(cantidad))
  i += 1

# Código 2
vestuarios = [["pantalones", 5], ["poleras", 7]]

print("\nEl inventario cuenta con lo siguiente:")

for vestuario in vestuarios:
  print(vestuario[0] + ": " + str(vestuario[1]))

print("\nAhora se ha vendido un pantalón, por lo que inventario es:")

for vestuario in vestuarios:
  prenda = vestuario[0]
  cantidad = vestuario[1]

  if prenda == "pantalones":
    cantidad -= 1

  print(prenda + ": " + str(cantidad))