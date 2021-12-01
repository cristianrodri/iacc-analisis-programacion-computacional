import java.util.ArrayList;
import java.util.List;

// Clase que reemplaza al "CareTaker"
public class ListaAtendidos {
  private List<Memento> mementoList = new ArrayList<Memento>();
  private Medico medico;

  // A diferencia de la clase "CareTaker" original, se añade el médico como constructor para ver la lista diaria de un doctor particular
  public ListaAtendidos(Medico medico) {
    this.medico = medico;
  }

  public void add(Memento state){
    mementoList.add(state);
  }

  public Memento get(int index){
    return mementoList.get(index);
  }

  // Devuelve la información relacionada con el médico dado como constructor
  public Medico medicoRelacionado() {
    return medico;
  }

  public int totalAtendidos() {
    return mementoList.size();
  }
}
