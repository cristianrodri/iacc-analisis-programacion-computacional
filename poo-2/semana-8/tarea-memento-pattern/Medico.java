public class Medico extends Persona {
  private String especialidad;
  private int costo;

  public Medico(String nombre, String especialidad, int costo) {
    super(nombre);
    this.especialidad = especialidad;
    this.costo = costo;
  }

  public String getEspecialidad() {
    return especialidad;
  }

  public int getCosto() {
    return costo;
  }
}
