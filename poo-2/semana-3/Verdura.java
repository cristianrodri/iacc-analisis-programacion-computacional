public class Verdura extends Compra {
  private final double IMPUESTO = 1.17;

  public int comprar(String producto, int precio) {
    // Las compras de verduras tendrán un impuesto del 17%
    int precioFinal = (int) Math.round(precio * IMPUESTO);

    System.out.println("Has comprado " + producto + " por " + precioFinal + " pesos.");

    return precioFinal;
  }
  
}
