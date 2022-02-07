n = int(input("Digite un número: "))

def f(n):
  return n * 3

# Si el número dado por el usuario es mayor que cero, entonces ejecutar la funcion "f", después hacer los cálculos necesarios y mostrarlos por consola
if (n >= 0):
  a = f(n + 1)
  b = f(n) - f(n + 2)

  print(a)
  print(b)