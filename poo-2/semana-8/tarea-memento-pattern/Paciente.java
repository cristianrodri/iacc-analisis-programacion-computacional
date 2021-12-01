public class Paciente extends Persona {
  private String patologia;

  public Paciente(String nombre, String patologia) {
    super(nombre);
    this.patologia = patologia;
  }

  public String getPatologia() {
    return patologia;
  }
}
