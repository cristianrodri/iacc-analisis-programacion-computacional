public class ProfesionalDisplayVisitor implements ProfesionalVisitor {

  @Override
  public void visit(Traumatologo traumatologo) {
    System.out.println("El costo del traumatólogo es de $ " + traumatologo.getPrecio());
    System.out.println("El costo del traumatólogo con un 15% de descuento pre-pago es de $ " + traumatologo.getPrecioConDescuento());
  }

  @Override
  public void visit(Dentista dentista) {
    System.out.println("El costo del dentista es de $ " + dentista.getPrecio());
    System.out.println("El costo del dentista con un 25% de descuento pre-pago es de $ " + dentista.getPrecioConDescuento());
  }

  @Override
  public void visit(Cardiologo cardiologo) {
    System.out.println("El costo del cardiólogo es de $ " + cardiologo.getPrecio());
    System.out.println("El costo del cardiólogo con un 20% de descuento pre-pago es de $ " + cardiologo.getPrecioConDescuento());
  }

}