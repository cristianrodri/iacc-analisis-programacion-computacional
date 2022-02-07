public class Fiesta {
	public static String chequearEdad(int edad) {
		if (edad >= 18) {
			return "Usted puede ingresar a la fiesta";
		}
		
		return "Lo siento, usted no puede ingresar a la fiesta";
	}
	
	public static String precioEntrada(char genero) {
		// Si el genero ingresado es 'M' (mujer) tiene un 25% de descuento, de lo contrario no posee descuento
		if (genero == 'M') return "Su precio de entrada tiene un 25% de descuento";
		
		return "Su entrada no tiene descuento";
	}
}
