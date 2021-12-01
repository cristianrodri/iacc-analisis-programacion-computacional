public class Fruta extends Compra {
  private final double IMPUESTO = 1.15;

  public int comprar(String producto, int precio) {
    // Las compras de frutas tendrán un impuesto del 15%
    int precioFinal = (int) Math.round(precio * IMPUESTO);

    System.out.println("Has comprado " + producto + " por " + precioFinal + " pesos.");

    return precioFinal;
  }
  
}
