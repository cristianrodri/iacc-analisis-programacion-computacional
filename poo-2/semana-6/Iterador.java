public class Iterador implements InterfazIterador {
  int indice = 0;
  String iterador[];

  public Iterador(String iterador[]) {
    this.iterador = iterador;
  }

  @Override
  public boolean hasNext() {
    // Mientras el índice sea menor al total del iterador, retorna true
    if (indice < iterador.length) {
      return true;
    }
    return false;
  }

  @Override
  public String next() {
    if (hasNext()) {
      return iterador[indice++];
    }
    return null;
  }


}
