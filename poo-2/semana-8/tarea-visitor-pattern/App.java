public class App {
  public static void main(String[] args) {

    Profesional[] profesionales = new Profesional[] {
      new Traumatologo(10000),
      new Dentista(15000),
      new Cardiologo(20000)
    };
    ProfesionalVisitor visitor = new ProfesionalDisplayVisitor();

    for (int i = 0; i < profesionales.length; i++) {
      profesionales[i].accept(visitor);
    }
  }
}