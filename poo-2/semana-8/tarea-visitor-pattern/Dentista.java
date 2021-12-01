public class Dentista extends Precio implements Profesional {

  public Dentista(int precio) {
    this.precio = precio;
    this.descuentoPrePago = 0.25; // 25% descuento
  }

  @Override
  public void accept(ProfesionalVisitor profesionalVisitor) {
    profesionalVisitor.visit(this);
  }
}