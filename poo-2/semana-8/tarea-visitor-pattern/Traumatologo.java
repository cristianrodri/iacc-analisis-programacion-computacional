public class Traumatologo extends Precio implements Profesional {

  public Traumatologo(int precio) {
    this.precio = precio;
    this.descuentoPrePago = 0.15; // 15% descuento
  }

  @Override
  public void accept(ProfesionalVisitor profesionalVisitor) {
    profesionalVisitor.visit(this);
  }
}