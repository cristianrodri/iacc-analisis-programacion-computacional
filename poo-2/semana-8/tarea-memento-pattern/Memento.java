public class Memento {
  private Paciente state;

  public Memento(Paciente state) {
    this.state = state;
  }

  public Paciente getState() {
    return state;
  }
}
