import java.time.LocalDate;

public class Pasajero {
  Cliente cliente;
  LocalDate fechaReserva;
  boolean haPagado = false;

  public Pasajero(Cliente cliente, LocalDate fechaReserva) {
    this.cliente = cliente;
    this.fechaReserva = fechaReserva;
  }
}
