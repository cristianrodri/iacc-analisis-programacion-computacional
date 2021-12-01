public class Originator {
  private Paciente state;

  public void setState(Paciente state){
    this.state = state;
  }

  public Paciente getState(){
    return state;
  }

  public Memento guardarEstadoEnMemento(){
    return new Memento(state);
  }

  public void obtenerEstadoDeMemento(Memento memento){
    state = memento.getState();
  }
}