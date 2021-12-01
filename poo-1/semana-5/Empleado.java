public class Empleado extends Persona implements Test, Test2 {
  private double sueldo;

  public Empleado(String nombre, String apellido, double sueldo, int edad) {
    super(nombre, apellido, edad);
    this.sueldo = sueldo;
  }

  public double devuelveSueldoLiquido() {
    return sueldo * 0.9;
  }

  // Añadiendo métodos set y get a los atributos (en este caso sólo al atributo sueldo)
  public void setSueldo(double sueldo) {
    this.sueldo = sueldo;
  }

  public double getSueldo() {
    return sueldo;
  }
}
