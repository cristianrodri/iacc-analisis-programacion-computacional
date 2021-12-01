import java.util.ArrayList;
import java.util.List;

public class Empleado {
   private String nombre;
   private String departamento;
   private int salario;
   private List<Empleado> subordinados;

   // constructor
   public Empleado(String nombre,String departamento, int salario) {
      this.nombre = nombre;
      this.departamento = departamento;
      this.salario = salario;
      subordinados = new ArrayList<Empleado>();
   }

   public void add(Empleado e) {
      subordinados.add(e);
   }

   public void remove(Empleado e) {
      subordinados.remove(e);
   }

   public List<Empleado> getSubordinados(){
     return subordinados;
   }

   public String toString(){
      return ("Empleado :[ nombre : " + nombre + ", departamento : " + departamento + ", salario :" + salario+" ]");
   }
}