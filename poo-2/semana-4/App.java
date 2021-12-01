public class App {
  public static void main(String[] args) {

    Empleado CEO = new Empleado("John","CEO", 30000);

    Empleado jefeVentas = new Empleado("Robert","Jefe de ventas", 20000);

    Empleado jefeExploracion = new Empleado("Michel","Jefe de Exploración", 20000);

    Empleado empleado1 = new Empleado("Laura","Exploración", 10000);
    Empleado empleado2 = new Empleado("Bob","Exploración", 10000);

    Empleado ejecutivoVentas1 = new Empleado("Richard","Ventas", 10000);
    Empleado ejecutivoVentas2 = new Empleado("Rob","Ventas", 10000);

    CEO.add(jefeVentas);
    CEO.add(jefeExploracion);

    jefeVentas.add(ejecutivoVentas1);
    jefeVentas.add(ejecutivoVentas2);

    jefeExploracion.add(empleado1);
    jefeExploracion.add(empleado2);

    System.out.println(CEO); 
    
    for (Empleado jefaturas : CEO.getSubordinados()) {
      System.out.println(jefaturas);
      
      for (Empleado Empleado : jefaturas.getSubordinados()) {
          System.out.println(Empleado);
       }
    }
 }
}
