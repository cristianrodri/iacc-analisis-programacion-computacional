public class App {
    public static void main(String[] args) throws Exception {
        Empleado empleado = new Empleado("Cristian", "Rodríguez", 650000, 28);
        System.out.println("Nombre: " + empleado.devuelveNombre());
        System.out.println("Sueldo: " + empleado.devuelveSueldoLiquido());
    }
}
