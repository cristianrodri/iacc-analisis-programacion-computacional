public class ExpresionTerminal implements Expresion {
  private String adquiridos = "adquiridos";
  private String faltante = "faltante";
  private String datoIngresado;

  public ExpresionTerminal(String datoIngresado) {
    this.datoIngresado = datoIngresado;
  }

  @Override
  public boolean interpretar() {
    return datoIngresado.equals(adquiridos) || datoIngresado.equals(faltante);
  }

  public boolean esAdquiridos() {
    return datoIngresado.equals(adquiridos);
  }

  public boolean esFaltante() {
    return datoIngresado.equals(faltante);
  }
}
