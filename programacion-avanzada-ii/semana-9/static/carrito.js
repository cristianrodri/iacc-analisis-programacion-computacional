const obtenerProductosLocalStorage = () => {
  return JSON.parse(localStorage.getItem('productos'))
}

console.log(obtenerProductosLocalStorage())
