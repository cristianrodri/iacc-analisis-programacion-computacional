CREATE DATABASE inventario;

CREATE TABLE equipo (
  id SERIAL PRIMARY KEY,
  marca VARCHAR(25) NOT NULL,
  modelo VARCHAR(20) NOT NULL,
  generacion SMALLINT NOT NULL,
  anio SMALLINT NOT NULL,
  costo DOUBLE PRECISION NOT NULL,
  precio_venta DOUBLE PRECISION NOT NULL,
  cantidad SMALLINT NOT NULL
);

INSERT INTO equipo (marca, modelo, generacion, anio, costo, precio_venta, cantidad)
VALUES ('HP', 'CF0003LA', 4, 2015, 170000, 280000, 12),
      ('Acer', 'Aspire 3', 5, 2016, 150000, 250000, 10),
      ('HP', 'Envy', 6, 2017, 200000, 300000, 15),
      ('Dell', 'Inspiron', 6, 2017, 220000, 320000, 18),
      ('Dell', 'Vostro', 7, 2018, 250000, 380000, 25),
      ('Acer', 'Aspire 5', 6, 2017, 190000, 300000, 14),
      ('Lenovo', 'ThinkPad 5', 7, 2018, 200000, 310000, 10),
      ('HP', '13-ab004la', 7, 2018, 230000, 340000, 18),
      ('Dell', 'Allienware', 7, 2018, 220000, 350000, 20),
      ('Lenovo', 'IdeaPad', 6, 2017, 210000, 320000, 22);

-- actualizar datos
UPDATE equipo
SET costo = costo + costo * 0.2, precio_venta = precio_venta + precio_venta * 0.3
WHERE marca = 'HP';

-- ver datos
SELECT marca, generacion, precio_venta, cantidad
FROM equipo
WHERE cantidad > 18;
