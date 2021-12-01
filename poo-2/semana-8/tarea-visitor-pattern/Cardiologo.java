public class Cardiologo extends Precio implements Profesional {

  public Cardiologo(int precio) {
    this.precio = precio;
    this.descuentoPrePago = 0.2; // 20% descuento
  }

  @Override
  public void accept(ProfesionalVisitor profesionalVisitor) {
    profesionalVisitor.visit(this);
  }
}