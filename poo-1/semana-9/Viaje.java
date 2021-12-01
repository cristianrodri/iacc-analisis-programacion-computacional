import java.time.LocalDate;
import java.time.temporal.ChronoUnit;
import java.util.ArrayList;

public class Viaje {
  int id;
  Destino destino;
  LocalDate fechaDestino;
  ArrayList<Pasajero> reservas = new ArrayList<Pasajero>();

  // CONSTRUCTOR
  public Viaje(int id, Destino destino, LocalDate fechaDestino) {
    this.id = id;
    this.destino = destino;
    this.fechaDestino = fechaDestino;
  }

  public void reservar(Cliente cliente, LocalDate fechaReserva) {
    // Si el viaje está lleno, no puede reservar
    if (estaLleno()) {
      System.out.println("El viaje a " + destino.ciudad + " con fecha el " + fechaDestino + " se encuentra con todas las reservas ocupadas");

      return;
    }

    // Si el cliente tiene 5 pasajes, no puede reservar este viaje
    if (cliente.tienePasajesLimitados()) {
      System.out.println("El cliente " + cliente.nombreCompleto() + " tiene sus 5 pasajes ocupados.");

      return;
    }

    // Si el cliente ya contiene este viaje en su id de viajes, entonces no puede reservar
    if (cliente.viajes.contains(this.id)) {
      System.out.println("Lo sentimos. " + cliente.nombreCompleto() + " ya tiene reserva para " + this.destino.ciudad + ".");

      return;
    }

    // Si el viaje no está disponible, entonces no puede reservar el viaje
    if (!estaDisponible(fechaReserva)) {
      System.out.println("Lo sentimos. Su fecha de reserva no puede ser aceptada. El viaje iniciará en menos de 48 horas.");

      return;
    }

    // Si ninguna de las condiciones anteriormente señaladas se cumple, entonces el cliente si puede reservar este viaje. Se convierte en un nuevo pasajero y se añade a la lista de reservas
    reservas.add(new Pasajero(cliente, fechaReserva));
    cliente.setViaje(this.id); // se le añade el id de este viaje al arreglo viajes del cliente

    System.out.println("- " + cliente.nombreCompleto() + " ha reservado un viaje para " + this.destino.ciudad + ".");
  }

  public void pagar(Cliente cliente, LocalDate fechaPago) {
    // Verificar si el cliente tiene reserva de este viaje
    if (!cliente.viajes.contains(this.id)) {
      System.out.println("Lo sentimos. Usted no ha reservado este viaje aún, así que no puede pagarlo.");
      return;
    }

    // Verificar fecha de pago
    if (!puedePagar(fechaPago)) {
      System.out.println("No puede pagar, ya que el viaje iniciará en menos de 24 horas. Lamentablemente usted perderá su reserva.");

      // Elimiar el id del viaje del arreglo viajes del cliente
      for (int i = 0; i < cliente.viajes.size(); i++) {
        if (cliente.viajes.get(i) == this.id) {
          cliente.viajes.remove(i);
        }
      }

      // Eliminar el pasajero de este viaje que esta almacenado en la lista de reservas
      for (int i = 0; i < reservas.size(); i++) {
        Pasajero pasajero = reservas.get(i);

        if (pasajero.cliente.rut == cliente.rut) {
          reservas.remove(i);
          return;
        }
      }
    }

    // Pagar el viaje. Se recorre todas las reservas hasta encontrar al cliente dado como parámetro
    for (int i = 0; i < reservas.size(); i++) {
      Pasajero pasajero = reservas.get(i);

      // Si el cliente que es usado como parámetro es el mismo de la actual iteración, entonces el cliente ha pagado y se le modifica su atributo haPagado a true. Además se imprime un mensaje indicando el monto pagado. Aplicar descuento a los menores de 8 años y mayores de 65.
      if (cliente.rut == pasajero.cliente.rut) {

        // Si el cliente no ha pagado, cambiar la variable
        if (!pasajero.haPagado) {
          pasajero.haPagado = true;

          System.out.println(cliente.nombreCompleto() + " ha pagado su viaje a " + this.destino.ciudad + " en $ " + formatearPago(this.destino.costo, cliente.edad) + " pesos.");

          reservas.set(i, pasajero);
        } else {
          // de lo contrario, si ya pago, entonces imprime lo siguiente
          System.out.println(cliente.nombreCompleto() + " ya ha pagado este viaje.");
        }

        break;
      }
    }
  }

  // Método que verifica si el bus (viaje) iguala o supera las 40 reservas (clientes)
  public boolean estaLleno() {
    return reservas.size() >= 40;
  }

  // Método que calcula la diferencia de días entre la fecha de reserva (del cliente) y la fecha de destino (del viaje)
  private boolean estaDisponible(LocalDate fechaReserva) {
    // Si la diferencia de días entre la fecha de reserva y la fecha de destino es menor a 2 (o en su defecto 48 horas), entonces no está disponible el viaje. De lo contrario, si es mayor o igual a 2, está disponible.
    long diff = ChronoUnit.DAYS.between(fechaReserva, this.fechaDestino);

    return diff >= 2;
  }

  // Método que calcula la diferencia de días entre la fecha de pago (del cliente) y la fecha de destino (del viaje)
  private boolean puedePagar(LocalDate fechaPago) {
    // Si la diferencia de días entre la fecha de pago y la fecha de destino es menor a 1 (o en su defecto 24 horas), entonces no está disponible el pago. De lo contrario, si es mayor o igual a 1, está disponible.
    long diff = ChronoUnit.DAYS.between(fechaPago, this.fechaDestino);

    return diff >= 1;
  }

  // Devuelve descuentos en el pago en caso de aplicar cierta edad
  private int formatearPago(int pago, int edad) {
    if (edad < 8) {
      return (int) (pago * 0.5); // pago - 50% descuento
    } else if (edad > 65) {
      return (int) (pago * 0.7); // pago - 30% descuento
    } else {
      return pago; // pago sin descuento
    }
  }
}
