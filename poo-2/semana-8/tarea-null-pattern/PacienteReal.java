public class PacienteReal extends AbstractPaciente {

  public PacienteReal(String rut) {
    this.rut = rut;
  }

  @Override
  public boolean esNull() {
    return false;
  }

  @Override
  public String obtenerRut() {
    return rut;
  }
  
}
