from flask import Flask, render_template
import db

# Llama a la clase contenedora de la base de datos
database = db.Database()

app = Flask(__name__)

# Ruta principal
@app.route("/")
def homepage():
    nombres = database.obtenerCategorias()

    return render_template('index.html', categorias=nombres)

# Ruta que muestra las tiendas de una categoría en específica
@app.route("/categorias/<categoria>")
def tiendas_por_categoria(categoria):
    # Obtiene una categoría
    categoria = database.obtenerCategoria(categoria)

    # Obtiene el id de esa categoría
    id_categoria = categoria[0][0]

    # Busca todas las tiendas relacionadas a esa categoría
    tiendas = database.obtenerTiendasPorCategoria(id_categoria)

    return render_template('categoria.html', title=categoria[0][1], tiendas=tiendas)

# Ruta que muestra los productos de una tienda en específica
@app.route("/tienda/<id_tienda>")
def productos_por_tienda(id_tienda):
    tienda = database.obtenerTiendaPorId(id_tienda)
    productos = database.obtenerProductosPorTienda(id_tienda)

    # Obtiene el id de la categoria a la que pertenece la tienda
    id_categoria = tienda[0][4]

    # Busca el nombre de la categoría en la base de datos
    categoria = database.obtenerCategoriaPorId(id_categoria)

    return render_template('producto.html', title=tienda[0][1], piso=tienda[0][3], productos=productos, categoria=categoria[0][1])

# Ruta que muestra el carrito de compras
@app.route("/carrito")
def carrito():
    return render_template('carrito.html')

if __name__ == '__main__':
  app.run(debug=True)