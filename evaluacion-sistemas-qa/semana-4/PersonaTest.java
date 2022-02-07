import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;

class PersonaTest {
	// El constructor de la clase Persona recibe el nombre, apellido, rut, edad, genero (H hombre, M mujer), peso y altura
	Persona persona = new Persona("Cristian", "Rodriguez", "18.193.323-6", 29, 'H', 78, 1.76);

	/******* TEST UNITARIOS *******/
	@Test
	void testNombre() {
		String nombreObtenido = persona.getNombre();
		String nombreEsperado = "Cristian";
		Assertions.assertEquals(nombreEsperado, nombreObtenido);
	}
	
	@Test
	void testEdad() {
		int edadObtenida = persona.getEdad();
		int edadEsperada = 29;
		Assertions.assertEquals(edadEsperada, edadObtenida);
	}
	
	@Test
	void testIMC() {
		// Testea el índice de masa corporal.
		// Recibe -1 si es bajo peso, 0 si es normal y 1 si es sobrepeso
		int IMCobtenido = persona.calcularIMC();
		int IMCesperado = 1;
		Assertions.assertEquals(IMCesperado, IMCobtenido);
	}
	
	/******* TEST DE INTEGRACIÓN *******/
	@Test
	void testIngreso() {
		// Testea si la edad de la persona puede ingresar a la fiesta
		String mensajeObtenido = Fiesta.chequearEdad(persona.getEdad());
		String mensajeEsperado = "Usted puede ingresar a la fiesta";
		Assertions.assertEquals(mensajeEsperado, mensajeObtenido);
	}
	
	@Test
	void testPrecioFiesta() {
		// Testea si la persona posee algún tipo de descuento en base a su género
		String mensajeObtenido = Fiesta.precioEntrada(persona.getGenero());
		String mensajeEsperado = "Su entrada no tiene descuento";
		Assertions.assertEquals(mensajeEsperado, mensajeObtenido);
	}

}
