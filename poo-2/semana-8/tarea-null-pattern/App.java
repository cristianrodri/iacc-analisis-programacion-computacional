public class App {
  public static void main(String[] args) {
    System.out.println("Analizando Reservas de pacientes");
    System.out.println("");

    AbstractPaciente paciente1 = Paciente.chequearPaciente("16.948.981-5");
    AbstractPaciente paciente2 = Paciente.chequearPaciente("6.738.982-4");
    AbstractPaciente paciente3 = Paciente.chequearPaciente("13.660.328-0");
    AbstractPaciente paciente4 = Paciente.chequearPaciente("7.032.826-7");
    AbstractPaciente paciente5 = Paciente.chequearPaciente("23.691.547-6");
    AbstractPaciente paciente6 = Paciente.chequearPaciente("10.493.309-1");
    AbstractPaciente paciente7 = Paciente.chequearPaciente("14.336.827-7");

    System.out.println(paciente1.obtenerRut());
    System.out.println(paciente2.obtenerRut());
    System.out.println(paciente3.obtenerRut());
    System.out.println(paciente4.obtenerRut());
    System.out.println(paciente5.obtenerRut());
    System.out.println(paciente6.obtenerRut());
    System.out.println(paciente7.obtenerRut());
  }
}