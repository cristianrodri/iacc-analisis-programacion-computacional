CREATE DATABASE concesionario;

CREATE TABLE autos (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  marca varchar(20) NOT NULL,
  modelo varchar(15) NOT NULL,
  color varchar(15) NOT NULL,
  anio int NOT NULL,
  precio float NOT NULL
);

INSERT INTO autos (marca, modelo, color, anio, precio)
VALUES
  ('Ford', 'Fiesta', 'Blanco', 2015, 8500000),
  ('Chevrolet', 'Sail', 'Azul', 2017, 6500000),
  ('Toyota', 'Tacoma', 'Rojo', 2014, 22100000),
  ('Ford', 'Ecosport', 'Azul', 2018, 11200000),
  ('Toyota', '4Runner', 'Negro', 2019, 25600000),
  ('Ford', 'Explorer', 'Negro', 2015, 19900000),
  ('Nissan', 'Versa', 'Azul', 2016, 9350000),
  ('Chevrolet', 'Orlando', 'Gris', 2014, 14000000),
  ('Mercedes Benz', 'a200', 'Blanco', 2018, 25220000),
  ('Chevrolet', 'Spark', 'Rojo', 2019, 6100000);

