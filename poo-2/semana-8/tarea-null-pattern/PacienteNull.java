public class PacienteNull extends AbstractPaciente {

  @Override
  public boolean esNull() {
    return true;
  }

  @Override
  public String obtenerRut() {
    return "El rut dado no tiene reserva.";
  }
  
}
