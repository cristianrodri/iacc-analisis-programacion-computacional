public class App {
  public static void main(String[] args) {

    Boleta boleta = Boleta.getInstancia();

    // Imprime boleta de un producto
    boleta.imprimirBoleta("Papas", 2000);
  }
}

// https://www.tutorialspoint.com/design_pattern/singleton_pattern.htm