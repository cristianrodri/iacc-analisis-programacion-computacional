import tkinter

formulario = tkinter.Tk()
# La ventana tiene una geometría de 500x400 y su parte superior izquierda se mueve 500 píxeles hacía la derecha y 200 píxeles hacía abajo
formulario.geometry("500x400+500+200")
formulario.title("Bonificación")

# Título del formulario
titulo = tkinter.Label(formulario, text = "Ingrese su monto de ventas alcanzado este mes", font=12, pady=20)
titulo.pack()

# Input del formulario
monto = tkinter.Entry(formulario, font=15)
monto.pack()
# Apenas se abre la ventana, el input queda enfocado sin la necesidad de ir con el mouse o tab
monto.focus()

# Label que muestra el mensaje de error en rojo
mensajeError = tkinter.Label(formulario, text="Ingrese un número válido", foreground="red", font=10)

# Label que muestra el mensaje de bonificación
mensajeBonificacion = tkinter.Label(formulario, font=10)

# Función que es llamada cuando se presiona el botón
def calcularBonificacion():
  # Obtiene el monto del input (Entry)
  montoIngresado = monto.get()
  bonificacion = 0

  # Si el monto ingresado no es un dígito, mostrar mensaje de error y terminar la función
  if montoIngresado.isdigit() == False:
    mensajeError.pack()
    return

  # Esconde el mensaje de error cuando el monto ingresado es un número
  mensajeError.pack_forget()

  montoNumero = int(montoIngresado)

  # Cambiar la "bonificacion" según el monto ingresado
  if montoNumero >= 140_000:
    bonificacion = int(montoNumero * 0.25)
  elif montoNumero < 140_000 and montoNumero >= 70_000:
    bonificacion = int(montoNumero * 0.20)
  elif montoNumero < 70_000 and montoNumero >= 50_000:
    bonificacion = int(montoNumero * 0.15)

  # Transforma el número en formato moneda
  bonificacionFormatoPeso = "${:,.0f}".format(bonificacion).replace(',', '.')

  mensajeBonificacion.config(text="Tu bonificación ha sido de " + bonificacionFormatoPeso)
  mensajeBonificacion.pack()

# Botón que inicia el formulario
contenedorBoton = tkinter.Frame(formulario, pady=10)
contenedorBoton.pack()
boton = tkinter.Button(contenedorBoton, text = "Calcular bonificación", cursor="hand1", command=calcularBonificacion, font=10, background="#ccc")
boton.pack()

formulario.mainloop()