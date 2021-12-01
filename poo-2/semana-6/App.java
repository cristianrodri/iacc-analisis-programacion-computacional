public class App {
  public static void main(String[] args) {
    // Compradores
    System.out.println("Compradores");
    String compradores[] = {"Green Day", "Tus Jeans"};
    Iterador it = new Iterador(compradores);

    while (it.hasNext()) {
      System.out.println("La empresa " + it.next() + " es un comprador.");
    }
    
    // Proveedores
    System.out.println("Proveedores");
    String proveedores[] = {"Hilo Mexicano", "Hilo Argentino"};
    Iterador it2 = new Iterador(proveedores);

    while (it2.hasNext()) {
      System.out.println("La empresa " + it2.next() + " es un proveedor.");
    }
  }
}