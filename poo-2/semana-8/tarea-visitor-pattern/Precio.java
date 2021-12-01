public abstract class Precio {
  protected int precio;
  protected double descuentoPrePago;

  public int getPrecio() {
    return precio;
  }

  public int getPrecioConDescuento() {
    int descuento = (int)(precio * descuentoPrePago);
    return precio - descuento;
  }
}
