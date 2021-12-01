public class Disponible implements Estado {

  @Override
  public void disponibilidad() {
    System.out.println("Disponible");
  }
  
  public void pacienteTerminado(Contexto contexto) {
    contexto.definirEstado(this);
    System.out.println("El doctor " + contexto.getNombre() + " ha terminado de atender a su paciente.");
  }

}
