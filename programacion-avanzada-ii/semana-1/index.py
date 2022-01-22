numero = input('Escriba un numero ')

# Si el número dado por el usuario no es número o es un cero, la inversa va a dar error, por lo que se repite el ciclo hasta que sea un número correcto. Puede ser negativo o positivo.
# "isdigit" verifica si el string dado por el usuario es un dígito
# La función "lstrip" remueve los +- (si es que el usuario los usó) para así verificar si lo escrito por el usuario es número o no mediante "isdigit", ya que esta funcion no funcionaría con los signos dentro del string. Gracias a esto el usuario puede escribir -6, 6 o +6 sin problemas.
while not numero.lstrip('+-').isdigit() or numero == '0':
  print('Escriba un numero válido y diferente de cero')
  numero = input('Escriba un numero ')
else:
  # Si el dato dado por el usuario es número, entonces calcula la inversa de ese número.
  inversa = 1 / int(numero)
  print('La inversa de ' + numero + ' es ' + str(inversa))