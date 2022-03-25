const toastTrigger = document.getElementById('liveToastTrigger')
const toastLiveExample = document.getElementById('liveToast')
const toastBody = document.querySelector('.toast-body')

// Se agrega el producto al localStorage para poder recuperar el carrito cada vez que se refresque la página
const agregarProductoLocalStorage = producto => {
  const productosPrevios = JSON.parse(localStorage.getItem('productos')) ?? []
  let nuevoStorage = []

  const idDisponible = productosPrevios.some(
    productoPrev => +productoPrev.id === +producto.id
  )

  // Si el id del producto ya se encuentra disponible en el storage, simplemente se le agrega la cantidad dada, de lo contrario se añade el nuevo producto al storage
  if (idDisponible) {
    nuevoStorage = productosPrevios.map(productoPrev => {
      if (+productoPrev.id === +producto.id) {
        return {
          ...productoPrev,
          cantidad: productoPrev.cantidad + producto.cantidad
        }
      }

      return productoPrev
    })
  } else {
    nuevoStorage = [...productosPrevios, producto]
  }

  // Se actualiza el storage
  localStorage.setItem('productos', JSON.stringify(nuevoStorage))
}

const eliminarProductoLocalStorage = () => {}

if (toastTrigger) {
  toastTrigger.addEventListener(
    'click',
    e => {
      if (e.target.tagName === 'BUTTON') {
        // Muestra un mensaje Toast cada vez que se ingrese un producto al carrito
        const toast = new bootstrap.Toast(toastLiveExample)
        toastBody.innerHTML = `<strong>${e.target.dataset.name}</strong> ha sido agregado al carrito`

        toast.show()

        const datos = {
          ...e.target.dataset,
          cantidad: +e.target.previousElementSibling.value
        }

        agregarProductoLocalStorage(datos)
      }
    },
    true
  )
}
