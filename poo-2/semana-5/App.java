public class App {
  public static void main(String[] args) {
    Curso cursoHTML = new ProxyCurso("HTML");
    Curso cursoCSS = new ProxyCurso("CSS");

    // imprime curso HTML (primero lo busca en la base de datos si es que es primera vez que se llama)
    cursoHTML.display(); 

    // imprime curso HTML (esta vez no busca en la base de datos porque ya se encuentra disponible)
    cursoHTML.display();

    // salto de línea
    System.out.println("");

    // imprime curso CSS (busca´ra en base de datos ya que es la primera vez que se busca)
    cursoCSS.display();

    // imprime curso CSS más veces (no buscará en base de datos)
    cursoCSS.display();
    cursoCSS.display();
    cursoCSS.display();
    cursoCSS.display();
  }
}