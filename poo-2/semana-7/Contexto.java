public class Contexto {
  private Strategy strategy;

  // Esta clase Contexto recibe en su constructor, la clase Adquirido o la clase Faltante. Ambas clases implementan la interfaz Strategy
  public Contexto(Strategy strategy) {
    this.strategy = strategy;
  }

  public void analizarInventario() {
    // Se analiza el inventario, ya sea de la clase Adquirido o la clase Faltante, dependiendo de la clase instanciada en el constructor
    strategy.verInventario();
  }
}
