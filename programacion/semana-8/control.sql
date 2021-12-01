-- EJERCICIO 1

-- Creación de la tabla
CREATE TABLE empleados (
  NOMBRE VARCHAR(50),
  GENERO VARCHAR(5),
  EDAD INTEGER,
  AREA VARCHAR(20),
  SALARIO FLOAT
);

-- Se insertan todos los datos
INSERT INTO empleados (NOMBRE, GENERO, EDAD, AREA, SALARIO)
VALUES
  ('ANDREA', 'F', 30, 'VENTAS', 1401.00),
  ('LORENZO', 'M', 27, 'LOGISTICA', 1072.00),
  ('NATALIA', 'F', 24, 'COMPRAS', 1707.00),
  ('YOLANDA', 'F', 40, 'VENTAS', 1291.00),
  ('ARTURO', 'M', 26, 'RR.HH', 2710.00),
  ('LUIS', 'M', 27, 'LOGISTICA', 2702.00),
  ('JUAN', 'M', 29, 'MARKETING', 1321.00),
  ('CARLOS', 'M', 25, 'VENTAS', 1721.00),
  ('ANA', 'F', 24, 'COMPRAS', 2887.00),
  ('CARMEN', 'F', 30, 'RR.HH', 2988.00),
  ('MATIAS', 'M', 25, 'MARKETING', 1202.00);

-- Muestra todos los campos de la tabla
SELECT * FROM empleados;

-- Muestra sólo los campos que tengan sexo femenino
SELECT *
FROM empleados
WHERE GENERO = 'F';

-- Muestra sólo los campos de las personas que trabajan en el departamento de marketing
SELECT *
FROM empleados
WHERE AREA = 'MARKETING';
