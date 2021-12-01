import java.util.ArrayList;
import java.util.Arrays;

public class Adquirido implements Strategy {
  ArrayList<String> productos = new ArrayList<String>(Arrays.asList("silla", "tijeras", "capa", "peineta"));

  @Override
  public void verInventario() {
    System.out.println("La peluquería cuenta con los siguentes productos en su inventario: ");
    System.out.println("");

    // Imprime todos los artículos obtenidos
    for (String producto : productos) {
      System.out.println(producto);
    }
  }
  
}
