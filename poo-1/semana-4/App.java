public class App {
  public static void main(String[] args) {
      // Instancia de la clase Persona
      Persona persona = new Persona("Cristian", 28, 'H');
      persona.setApellido("Rodríguez");
      System.out.println("Nombre: " + persona.getNombre());
      System.out.println("Apellido: " + persona.getApellido());
      System.out.println("Edad: " + persona.getEdad());
      System.out.println("RUT: " + persona.getRUT());
  }
}
