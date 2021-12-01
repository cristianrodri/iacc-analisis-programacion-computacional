public class Paciente {
  public static final String[] ruts = {"16.948.981-5", "6.738.982-4", "13.660.328-0", "7.032.826-7", "23.691.547-6"};

  public static AbstractPaciente chequearPaciente(String rut){
  
    for (int i = 0; i < ruts.length; i++) {
      // Analiza si el rut dado como parámetro es igual al rut almacenado en el arreglo de string.
      if (ruts[i].equalsIgnoreCase(rut)){
        return new PacienteReal(rut);
      }
    }
    return new PacienteNull();
  }
}
