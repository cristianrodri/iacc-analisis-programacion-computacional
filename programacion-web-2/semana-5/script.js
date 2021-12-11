function validarFormulario(target) {
  // El parámetro "target" es el formulario en si. target[0] es su primer hijo y así sucesivamente.
  const matricula = target[0]
  // const serial = target[1]
  // const carroceria = target[2]
  // const marca = target[3]
  // const modelo = target[4]
  const year = target[5]
  // const color = target[6]

  // Si los caracteres de matrícula son menores que 6, mostrar una alerta y no enviar el formulario
  if (matricula.value.length < 6) {
    alert('Matrícula debe tener al menos 6 caracteres')

    // Cuando esta función retorna falso, no se envía a PHP
    return false
  }

  // Si el valor del año es diferente de 4 o si el valor ingresado no es un número, mostrar una alerta y no enviar el formulario gracias a "return false"
  if (year.value.length !== 4 || isNaN(year.value)) {
    alert('El año debe tener sólo 4 números y sin letras')

    return false
  }
}
