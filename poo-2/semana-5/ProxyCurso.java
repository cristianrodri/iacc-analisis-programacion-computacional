public class ProxyCurso implements Curso {

  private RealCurso realCurso;
  private String curso;

  public ProxyCurso(String curso){
     this.curso = curso;
  }

  @Override
  public void display() {
     // Cuando este método sea llamado por primera vez, se creará una instancia de RealCurso, que nos conectará con la base de datos. Más adelante cuando el mismo método sea ejecutado, simplemente imprimirá los datos que ya tiene almacenados en la instancia de RealCurso.
     if(realCurso == null){
        realCurso = new RealCurso(curso);
     }
     realCurso.display();
  }
}