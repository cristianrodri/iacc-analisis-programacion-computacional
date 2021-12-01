public class CompraFactory {
  public static final String FRUTA = "fruta";
  public static final String VERDURA = "verdura";

  public static Compra comprarProductoAgricola(String tipo) {
    if (tipo == CompraFactory.FRUTA) {
      return new Fruta();
    } else if (tipo == CompraFactory.VERDURA) {
      return new Verdura();
    }

    return null;
  }
}
