public class Persona {
  protected String nombre;
  protected String apellido;
  protected int edad;

  public Persona(String nombre, String apellido, int edad) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.edad = edad;
  }

  public String devuelveNombre() {
    return nombre + " " + apellido;
  }

  // añadiendo set y get a los atributos
  public void setNombre(String nombre) {
    this.nombre = nombre;
  }

  public String getNombre() {
    return nombre;
  }

  public void setApellido(String apellido) {
    this.apellido = apellido;
  }

  public String getApellido() {
    return apellido;
  }

  public void setEdad(int edad) {
    this.edad = edad;
  }

  public int getEdad() {
    return edad;
  }
}
