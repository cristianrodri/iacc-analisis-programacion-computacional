import javax.swing.JOptionPane;

public class Mediador {
  public static String mostrarVentana() {
    return JOptionPane.showInputDialog(null,"Control de inventario. Escribe \"adquiridos\" o \"faltante\"");
  }

  public static void mostrarError() {
    JOptionPane.showMessageDialog(null,"Debes escribir \"adquiridos\" o \"faltante\" ","Alerta",JOptionPane.WARNING_MESSAGE);
  }
}
