public class Boleta {
  // Se crea una instancia privada de la clase Boleta
  private static Boleta instancia = new Boleta();

  // Se crea un constructor privado para así no poder ser instanciado externamente
  private Boleta() {}

  public static Boleta getInstancia() {
    return instancia;
  }

  // Se imprime una boleta del producto y el precio. NOTA: para no hacer más complicado el ejercicio, sólo se imprimirá un sólo producto. El patrón se aplica tal cual es.
  public void imprimirBoleta(String producto, int precio) {
    System.out.println("El producto " + producto + " ha costado " + precio + " pesos.");
  }
}
