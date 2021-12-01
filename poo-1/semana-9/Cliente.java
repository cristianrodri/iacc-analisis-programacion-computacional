import java.util.ArrayList;

public class Cliente {
  String rut;
  String nombre;
  String apellido;
  int edad;
  ArrayList<Integer> viajes = new ArrayList<Integer>();

  public Cliente(String nombre, String apellido, String rut, int edad) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.rut = rut;
    this.edad = edad;
  }

  // Método que verifica si el cliente tiene sus 5 pasajes disponibles ocupados
  public boolean tienePasajesLimitados() {
    return viajes.size() >= 5;
  }

  // Añade el id del viaje al arreglo viajes del cliente
  public void setViaje(int idViaje) {
    viajes.add(idViaje);
  }

  public String nombreCompleto() {
    return nombre.toUpperCase() + " " + apellido.toUpperCase();
  }
}
