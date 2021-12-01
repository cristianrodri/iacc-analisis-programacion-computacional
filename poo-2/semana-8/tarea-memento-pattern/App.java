import javax.swing.JOptionPane;

public class App {
  public static void main(String[] args) {
    Medico medico1 = new Medico("Francisco González", "traumatólogo", 20000);
    Paciente paciente1 = new Paciente("Joel Corral", "Osteoporosis");
    Paciente paciente2 = new Paciente("Alfredo Rodríguez", "Tendinitis");
    Paciente paciente3 = new Paciente("Julian Pérez", "Artrosis");
    Paciente paciente4 = new Paciente("Dionisio Serna", "Problemas de rodilla");
    Paciente paciente5 = new Paciente("Paula Hernández", "Osteoporosis");

    // Implementación de clases que usan el patrón memento
    Originator originator = new Originator();
    ListaAtendidos listaAtendidos1 = new ListaAtendidos(medico1); // Esta clase reemplaza al "CareTaker" original

    // Empieza a repasarse toda lista de pacientes del día. Sólo se va a guardar en el estado los pacientes que asistieron al médico.
    originator.setState(paciente1);
    listaAtendidos1.add(originator.guardarEstadoEnMemento());
    
    // El paciente 2 fue el único que no asistió al médico, por lo tanto su estado no se guarda en memento
    originator.setState(paciente2);

    originator.setState(paciente3);
    listaAtendidos1.add(originator.guardarEstadoEnMemento());

    originator.setState(paciente4);
    listaAtendidos1.add(originator.guardarEstadoEnMemento());

    originator.setState(paciente5);
    listaAtendidos1.add(originator.guardarEstadoEnMemento());

    // Imprime una ventana de dialogo mostrando el paciente actual
    JOptionPane.showMessageDialog(null, "El paciente que actualmente se atiende con el " + listaAtendidos1.medicoRelacionado().getEspecialidad() + " " + listaAtendidos1.medicoRelacionado().getNombre() + " se llama " + originator.getState().getNombre() + " y su patología es " + originator.getState().getPatologia());

    // A continuación, se muestra en consola la lista de pacientes que ya fueron atendidos
    System.out.println("Los pacientes que ya fueron atendidos por el doctor " + listaAtendidos1.medicoRelacionado().getNombre() + " fueron los siguientes:");
    System.out.println("");

    for (int index = 0; index < listaAtendidos1.totalAtendidos() - 1; index++) {
      originator.obtenerEstadoDeMemento(listaAtendidos1.get(index));
      System.out.println(originator.getState().getNombre() + " y patalogía es " + originator.getState().getPatologia());
    }
  }
}