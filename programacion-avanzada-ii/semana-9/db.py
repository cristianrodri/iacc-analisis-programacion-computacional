import pymysql

class Database:
  def __init__(self):
    self.conexion = pymysql.connect(
      host='localhost',
      user='root',
      passwd='',
      db='centro-comercial'
    )

    self.cursor = self.conexion.cursor()
    print("Conexión a la base de datos exitosa")

  # Obtener todas las categorias
  def obtenerCategorias(self):
    sql = 'SELECT * FROM categorias'

    try:
      self.cursor.execute(sql)
      nombres = self.cursor.fetchall()

      return nombres
    except Exception as e:
      raise

  # Obtiene los datos de una categoria
  def obtenerCategoria(self, categoria):
    sql = f"SELECT * FROM categorias WHERE nombre = '{categoria}'"

    try:
      self.cursor.execute(sql)
      nombre = self.cursor.fetchall()

      return nombre
    except Exception as e:
      raise

  # Obtiene los datos de una categoria mediante su id
  def obtenerCategoriaPorId(self, id):
    sql = f"SELECT * FROM categorias WHERE id = {id}"

    try:
      self.cursor.execute(sql)
      nombre = self.cursor.fetchall()

      return nombre
    except Exception as e:
      raise

  # Obtener las tiendas correspondientes a una categoria en específico
  def obtenerTiendasPorCategoria(self, id_categoria):
    sql = f"SELECT * FROM tiendas WHERE categoria_id = {id_categoria}"

    try:
      self.cursor.execute(sql)
      tiendas = self.cursor.fetchall()

      return tiendas
    except Exception as e:
      raise

  # Obtener los productos de una tienda en específico (según su id)
  def obtenerTiendaPorId(self, id_tienda):
    sql = f"SELECT * FROM tiendas WHERE id = {id_tienda}"

    try:
      self.cursor.execute(sql)
      tienda = self.cursor.fetchall()

      return tienda
    except Exception as e:
      raise

  # Obtener los productos correspondientes a una tienda en específico
  def obtenerProductosPorTienda(self, id_tienda):
    sql = f"SELECT * FROM productos WHERE tienda_id = {id_tienda}"

    try:
      self.cursor.execute(sql)
      productos = self.cursor.fetchall()

      return productos
    except Exception as e:
      raise