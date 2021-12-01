public class Ocupado implements Estado {

  @Override
  public void disponibilidad() {
    System.out.println("Ocupado");
  }
  
  public void atenderPaciente(Contexto contexto) {
    contexto.definirEstado(this);
    System.out.println("El doctor " + contexto.getNombre() + " ha comenzado a atender a su paciente.");
  }

}
