import java.util.ArrayList;
import java.util.Arrays;

public class Faltante implements Strategy {
  ArrayList<String> productos = new ArrayList<String>(Arrays.asList("máquina afeitadora", "máquina de cortar pelo", "rociador"));

  @Override
  public void verInventario() {
    System.out.println("La peluquería necesita adquirir los siguientes productos en su inventario: ");
    System.out.println("");

    // Imprime todos los artículos faltantes
    for (String producto : productos) {
      System.out.println(producto);
    }
  }
  
}
