import java.util.logging.Level;
import java.util.logging.Logger;

public class MainCuentaCliente {
  static final Logger logger = Logger.getLogger(MainCuentaCliente.class.getName());

  public static void main(String[] args) {
    String cliente1 = "Juan Perez";
    String cliente2 = "Maria Fuentes";
    String cliente3 = "Marcelo Salas";

    logger.log(Level.INFO, "Los clientes son:");
    logger.log(Level.INFO, () -> cliente1);
    logger.log(Level.INFO, () -> cliente2);
    logger.log(Level.INFO, () -> cliente3);
  }
}