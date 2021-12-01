public class App {
  public static void main(String[] args) {
    System.out.println("Chequear disponiblidad de un doctor en particular");
    System.out.println("");
    Contexto contexto = new Contexto("Patricio Vergara");

    Ocupado ocupado = new Ocupado();
    ocupado.atenderPaciente(contexto);

    // Se chequea el estado (state) del doctor mediante su contexto
    contexto.obtenerEstado().disponibilidad();

    // 15 minutos después se chequea nuevamente el estado del doctor
    contexto.obtenerEstado().disponibilidad();

    // El estado del doctor ha cambiado a disponible
    Disponible disponible = new Disponible();
    disponible.pacienteTerminado(contexto);

    // Como el estado del doctor ha cambiado, ahora su contexto es otro (disponible)
    contexto.obtenerEstado().disponibilidad();
  }
}