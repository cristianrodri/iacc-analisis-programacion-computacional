CREATE DATABASE concesionario;

CREATE TABLE clientes (
  id AUTO PRIMARY KEY NOT NULL,
  nombre_completo VARCHAR(40) NOT NULL,
  rut VARCHAR(12) NOT NULL,
  direccion VARCHAR(40) NOT NULL,
  correo VARCHAR(35) NOT NULL,
  telefono VARCHAR(12) NOT NULL
);

CREATE TABLE autos (
  id SERIAL PRIMARY KEY NOT NULL,
  marca VARCHAR(20) NOT NULL,
  modelo VARCHAR(15) NOT NULL,
  color VARCHAR(15) NOT NULL,
  anio INTEGER NOT NULL,
  costo_diario REAL NOT NULL
);

CREATE TABLE alquileres (
  id SERIAL PRIMARY KEY NOT NULL,
  id_auto INTEGER NOT NULL,
  id_cliente INTEGER NOT NULL,
  fecha DATE NOT NULL,
  descripcion VARCHAR(25) NOT NULL,
  cantidad_dias INTEGER NOT NULL,
  costo_diario REAL NOT NULL,
  FOREIGN KEY (id_auto) REFERENCES autos(id) ON DELETE CASCADE,
  FOREIGN KEY (id_cliente) REFERENCES clientes(id) ON DELETE CASCADE
);

INSERT INTO autos (marca, modelo, color, anio, costo_diario)
VALUES
  ('Ford', 'Fiesta', 'Blanco', 2015, 100000),
  ('Chevrolet', 'Sail', 'Azul', 2017, 120000),
  ('Toyota', 'Tacoma', 'Rojo', 2014, 180000),
  ('Ford', 'Ecosport', 'Azul', 2018, 150000),
  ('Toyota', '4Runner', 'Negro', 2019, 250000),
  ('Ford', 'Explorer', 'Negro', 2015, 220000),
  ('Nissan', 'Versa', 'Azul', 2016, 130000),
  ('Chevrolet', 'Orlando', 'Gris', 2014, 180000),
  ('Mercedes Benz', 'a200', 'Blanco', 2018, 290000),
  ('Chevrolet', 'Spark', 'Rojo', 2019, 100000);

INSERT INTO clientes (nombre_completo, rut, direccion, correo, telefono)
VALUES
  ('Carmen Jara', '18.345.234-2', 'San Antonio 786', 'cjara@gmail.com', '912342233'),
  ('Pamela Reyes', '16.765.123-K', 'Las Nieves 1485', 'preyes@gmail.com', '988775532'),
  ('Daniel Cataldo', '23.987.454-4', 'Colchagua 2244', 'dcataldo@gmail.com', '990442354'),
  ('Víctor Pérez', '25.455.778-1', 'San Diego 1310', 'vperez@gmail.com', '943223123'),
  ('Manuel Rivas', '20.229.551-3', 'Huérfanos 1020', 'mrivas@gmail.com', '925768900');

INSERT INTO alquileres (id_auto, id_cliente, fecha, descripcion, cantidad_dias, costo_diario)
VALUES
  (1, 1, '2019-10-02', 'Uso Región Metropolitana', 2, 100000),
  (1, 2, '2019-10-05', 'Uso Región Metropolitana', 3, 100000),
  (3, 2, '2019-10-09', 'Uso Cuarta Región', 2, 180000),
  (4, 3, '2019-10-09', 'Uso Séptima Región', 1, 150000),
  (2, 1, '2019-10-10', 'Uso Quinta Región', 1, 120000),
  (2, 2, '2019-10-12', 'Uso Región Metropolitana', 3, 120000),
  (5, 3, '2019-10-12', 'Uso Séptima Región', 2, 250000),
  (5, 5, '2019-10-15', 'Uso Quinta Región', 5, 250000),
  (7, 2, '2019-10-16', 'Uso Séptima Región', 7, 130000),
  (8, 4, '2019-10-16', 'Uso Región Metropolitana', 4, 180000);

SELECT marca, color, anio FROM autos;
SELECT nombre_completo, rut, telefono FROM clientes;
SELECT fecha, descripcion, cantidad_dias FROM alquileres
WHERE cantidad_dias > 3;

SELECT alquileres.fecha, alquileres.descripcion, alquileres.cantidad_dias
FROM alquileres INNER JOIN autos
ON alquileres.id_auto = autos.id
WHERE alquileres.cantidad_dias < 3 AND autos.anio BETWEEN 2015 AND 2017;

SELECT fecha, descripcion, cantidad_dias
FROM alquileres
WHERE cantidad_dias < 3 AND descripcion = 'Uso Región Metropolitana';