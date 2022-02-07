import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Test;

class FiestaTest {

	/******* TEST UNITARIOS *******/
	@Test
	void testIngresoFiesta() {
		String mensajeObtenido = Fiesta.chequearEdad(17);
		String mensajeEsperado = "Lo siento, usted no puede ingresar a la fiesta";
		Assertions.assertEquals(mensajeEsperado, mensajeObtenido);
	}
	
	@Test
	void testPrecioEntrada() {
		String mensajeObtenido = Fiesta.precioEntrada('M');
		String mensajeEsperado = "Su precio de entrada tiene un 25% de descuento";
		Assertions.assertEquals(mensajeEsperado, mensajeObtenido);
	}
}
