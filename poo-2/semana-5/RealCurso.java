public class RealCurso implements Curso {

  private String curso;

  // Esta clase buscará la información en la base de datos apenas sea instanciada. Esta clase sólo será llamada en la clase proxy
  public RealCurso(String curso){
     this.curso = curso;
     cargarDesdeBaseDatos(curso);
  }

  @Override
  public void display() {
     System.out.println("Se imprime curso " + curso);
  }

  private void cargarDesdeBaseDatos(String curso){
     System.out.println("Buscando curso " + curso + "...");
  }
}