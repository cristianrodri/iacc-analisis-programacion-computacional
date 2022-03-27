const cardsContainer = document.getElementById('cards-container')
const pagarContainer = document.getElementById('total-pagar-container')
const alerta = document.getElementById('alert')

const obtenerProductosLocalStorage = () => {
  return JSON.parse(localStorage.getItem('productos')) ?? []
}

const formatMoney = money => new Intl.NumberFormat('es-CL').format(money)

const imprimirCarrito = () => {
  const productos = obtenerProductosLocalStorage()

  let productosHTML = ''

  productos.forEach(producto => {
    productosHTML += `
      <div class="card" style="width: 18rem">
      <img
        src="${producto.image}"
        class="card-img-top"
        alt="${producto.name}"
        style="height: 150px; object-fit: contain"
      />
      <div class="card-body">
        <h5 class="card-title">${producto.name}</h5>
        <div class="d-flex justify-content-between h5">
          <p class="card-text">${producto.cantidad}x</p>
          <p>$ ${formatMoney(producto.cantidad * +producto.price)}</p>
        </div>
        <button class="btn btn-danger d-block" style="margin-left: auto" data-id="${
          producto.id
        }">
          Eliminar
        </button>
      </div>
    </div>
    `
  })

  if (productos.length > 0) {
    cardsContainer.innerHTML = productosHTML

    // Se suma el total de productos y se multiplican por sus cantidad previamente
    const totalPagar = productos.reduce((prev, curr) => {
      return prev + curr.cantidad * +curr.price
    }, 0)

    pagarContainer.innerHTML = `
      <p id="total-pagar" class="h4 mb-3">Total a pagar $ ${formatMoney(
        totalPagar
      )}</p>
      <button class="btn btn-primary">Pagar</button>
    `
  } else {
    cardsContainer.innerHTML =
      '<p class="text-center h4">No hay productos en el carrito</p>'

    pagarContainer.innerHTML = ''
  }
}

imprimirCarrito()

const eliminarProductosLocalStorage = id => {
  const productos = obtenerProductosLocalStorage()

  const carritoActualizado = productos.filter(producto => +producto.id !== id)

  if (carritoActualizado.length === 0) localStorage.removeItem('productos')
  else localStorage.setItem('productos', JSON.stringify(carritoActualizado))

  // Actualiza el DOM
  imprimirCarrito()
}

if (cardsContainer) {
  // Listener para eliminar un producto del carrito
  cardsContainer.addEventListener(
    'click',
    e => {
      if (e.target.tagName === 'BUTTON') {
        eliminarProductosLocalStorage(+e.target.dataset.id)
      }
    },
    true
  )
}

// Evento que llama después de presionar el botón pagar
pagarContainer.addEventListener('click', e => {
  if (e.target.tagName === 'BUTTON') {
    alerta.classList.add('show')

    // Remover los productos del localStorage después de pagar y actualizar el DOM
    localStorage.removeItem('productos')

    imprimirCarrito()
  }
})
