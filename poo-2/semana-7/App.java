public class App {
  public static void main(String[] args) {
    ExpresionTerminal expresion;
    Contexto contexto;
    String tipo; // tipo de inventario que se necesita conocer, ya sea los productos poseídos o faltantes

    do {

      /************ CAMBIO MEDIATOR ************/
      tipo = Mediador.mostrarVentana();
      // En caso de que se cierre la ventana o se presione cancelar, el proceso se termina.
      if (tipo == null) {return;}

      expresion = new ExpresionTerminal(tipo);

      // Interpreta si la palabra obtenida del input es diferente a las permitidas
      if (!expresion.interpretar()) {
        /************ CAMBIO MEDIATOR ************/
        Mediador.mostrarError();
      }
      
      // Si "tipo" no es ni "adquiridos" ni "faltante", entonces debe repetir el proceso
    } while (!expresion.interpretar());

    if (expresion.esAdquiridos()) {
      // En caso de haber escrito "adquiridos" se analiza el inventario de productos que ya posee la peluquería
      contexto = new Contexto(new Adquirido());
      contexto.analizarInventario();
    }

    if (expresion.esFaltante()) {
      // En caso de haber escrito "faltante" se analiza el inventario de productos aún no posee la peluquería
      contexto = new Contexto(new Faltante());
      contexto.analizarInventario();
    }

  }
}