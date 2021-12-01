import java.time.LocalDate;

public class App {
  public static void main(String[] args) {
    System.out.println("Proyecto final Semana 9");
    System.out.println();

    System.out.println("Se crea una lista de 10 clientes");

    Cliente cliente1 = new Cliente("Macarena", "Parrau", "14.232.983-2", 33);
    Cliente cliente2 = new Cliente("Jacqueline", "Farías", "15.371.275-1", 31);
    Cliente cliente3 = new Cliente("Luis", "Arce", "7.585.475-7", 65);
    Cliente cliente4 = new Cliente("Aladino", "Espinoza", "7.904.448-2", 62);
    Cliente cliente5 = new Cliente("Luis", "Rodríguez", "5.542.409-8", 69);
    Cliente cliente6 = new Cliente("Eduardo", "Aracena", "20.211.277-6", 20);
    Cliente cliente7 = new Cliente("Ramón", "Velásquez", "25.834.225-4", 5);
    Cliente cliente8 = new Cliente("Ximena", "Sánchez", "24.257.132-7", 7);
    Cliente cliente9 = new Cliente("Isabel", "Pérez", "19-069.062-6", 25);
    Cliente cliente10 = new Cliente("Javier", "Arancibia", "16.238.983-8", 30);

    System.out.println("Se crea una lista de 6 destinos");

    Destino ptoMontt = new Destino("Puerto Montt", 22000);
    Destino osorno = new Destino("Osorno", 20000);
    Destino temuco = new Destino("Temuco", 18000);
    Destino concepcion = new Destino("Concepción", 16000);
    Destino talca = new Destino("Talca", 14000);
    Destino rancagua = new Destino("Rancagua", 10000);

    System.out.println("Se crean 6 viajes (para las 6 ciudades seleccionadas)");

    Viaje viaje1 = new Viaje(1, ptoMontt, LocalDate.of(2021, 8, 20)); // 20 agosto
    Viaje viaje2 = new Viaje(2, osorno, LocalDate.of(2021, 8, 22)); // 22 agosto
    Viaje viaje3 = new Viaje(3, temuco, LocalDate.of(2021, 8, 24)); // 24 agosto
    Viaje viaje4 = new Viaje(4, concepcion, LocalDate.of(2021, 8, 26)); // 26 agosto
    Viaje viaje5 = new Viaje(5, talca, LocalDate.of(2021, 8, 28)); // 28 agosto
    Viaje viaje6 = new Viaje(6, rancagua, LocalDate.of(2021, 8, 30)); // 30 agosto

    System.out.println("*****************************************************");
    System.out.println();
    System.out.println("VIAJE 1 - (20 agosto)");
    viaje1.reservar(cliente1, LocalDate.of(2021, 8, 15)); // reserva 15 agosto
    viaje1.reservar(cliente2, LocalDate.of(2021, 8, 15)); // reserva 15 agosto
    viaje1.reservar(cliente3, LocalDate.of(2021, 8, 16)); // reserva 16 agosto
    viaje1.reservar(cliente4, LocalDate.of(2021, 8, 17)); // reserva 17 agosto
    viaje1.reservar(cliente5, LocalDate.of(2021, 8, 17)); // reserva 17 agosto

    // cliente 5 trata de repetir reserva
    viaje1.reservar(cliente5, LocalDate.of(2021, 8, 18)); // reserva 18 agosto
    viaje1.reservar(cliente6, LocalDate.of(2021, 8, 18)); // reserva 18 agosto

    // cliente 7 trata de reservar 1 día antes
    viaje1.reservar(cliente7, LocalDate.of(2021, 8, 19)); // reserva 19 agosto

    // cliente 1 paga su reserva
    viaje1.pagar(cliente1, LocalDate.of(2021, 8, 19));

    // cliente 1 intenta pagar otra vez
    viaje1.pagar(cliente1, LocalDate.of(2021, 8, 19)); // pago 19 agosto

    // cliente 2 intenta pagar el mismo día del viaje
    viaje1.pagar(cliente2, LocalDate.of(2021, 8, 20)); // pago 20 agosto

    System.out.println();
    System.out.println("*****************************************************");
    System.out.println("VIAJE 2 - (22 agosto)");
    viaje2.reservar(cliente5, LocalDate.of(2021, 8, 15)); // reserva 15 agosto
    viaje2.reservar(cliente6, LocalDate.of(2021, 8, 15)); // reserva 15 agosto
    viaje2.reservar(cliente7, LocalDate.of(2021, 8, 16)); // reserva 16 agosto
    viaje2.reservar(cliente8, LocalDate.of(2021, 8, 19)); // reserva 19 agosto
    viaje2.reservar(cliente9, LocalDate.of(2021, 8, 19)); // reserva 19 agosto
    viaje2.reservar(cliente10, LocalDate.of(2021, 8, 19)); // reserva 19 agosto
    viaje2.reservar(cliente1, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje2.reservar(cliente2, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje2.reservar(cliente3, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje2.reservar(cliente5, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje2.reservar(cliente4, LocalDate.of(2021, 8, 21)); // reserva 21 agosto (1 día antes)

    System.out.println();
    System.out.println("*****************************************************");
    System.out.println("VIAJE 3 - (24 agosto)");
    viaje3.reservar(cliente1, LocalDate.of(2021, 8, 19)); // reserva 19 agosto
    viaje3.reservar(cliente1, LocalDate.of(2021, 8, 19)); // reserva 19 agosto
    viaje3.reservar(cliente2, LocalDate.of(2021, 8, 19)); // reserva 19 agosto
    viaje3.reservar(cliente3, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje3.reservar(cliente4, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje3.reservar(cliente5, LocalDate.of(2021, 8, 20)); // reserva 20 agosto
    viaje3.reservar(cliente6, LocalDate.of(2021, 8, 21)); // reserva 21 agosto
    viaje3.reservar(cliente7, LocalDate.of(2021, 8, 21)); // reserva 21 agosto
    viaje3.reservar(cliente8, LocalDate.of(2021, 8, 22)); // reserva 22 agosto
    viaje3.reservar(cliente9, LocalDate.of(2021, 8, 22)); // reserva 22 agosto
    viaje3.reservar(cliente10, LocalDate.of(2021, 8, 23)); // reserva 23 agosto (1 día antes)

    System.out.println();
    System.out.println("*****************************************************");
    System.out.println("VIAJE 4 - (26 agosto)");
    viaje4.reservar(cliente1, LocalDate.of(2021, 8, 22)); // reserva 22 agosto
    viaje4.reservar(cliente2, LocalDate.of(2021, 8, 22)); // reserva 22 agosto
    viaje4.reservar(cliente3, LocalDate.of(2021, 8, 23)); // reserva 23 agosto
    viaje4.reservar(cliente4, LocalDate.of(2021, 8, 24)); // reserva 24 agosto
    viaje4.reservar(cliente5, LocalDate.of(2021, 8, 25)); // reserva 25 agosto (1 día antes)

    System.out.println();
    System.out.println("*****************************************************");
    System.out.println("VIAJE 5 - (28 agosto)");
    viaje5.reservar(cliente1, LocalDate.of(2021, 8, 24)); // reserva 24 agosto
    viaje5.reservar(cliente2, LocalDate.of(2021, 8, 25)); // reserva 25 agosto
    viaje5.reservar(cliente3, LocalDate.of(2021, 8, 26)); // reserva 26 agosto
    viaje5.reservar(cliente4, LocalDate.of(2021, 8, 26)); // reserva 26 agosto
    viaje5.reservar(cliente5, LocalDate.of(2021, 8, 27)); // reserva 27 agosto (1 día antes)

    System.out.println();
    System.out.println("*****************************************************");
    System.out.println("VIAJE 6 - (30 agosto) - OJO, ALGUNOS CLIENTES SOBREPASARÁN LOS 5 VIAJES DISPONIBLES");
    viaje6.reservar(cliente1, LocalDate.of(2021, 8, 25)); // reserva 25 agosto
    viaje6.reservar(cliente2, LocalDate.of(2021, 8, 25)); // reserva 25 agosto
    viaje6.reservar(cliente3, LocalDate.of(2021, 8, 26)); // reserva 26 agosto
    viaje6.reservar(cliente5, LocalDate.of(2021, 8, 26)); // reserva 26 agosto
    viaje6.reservar(cliente7, LocalDate.of(2021, 8, 27)); // reserva 27 agosto
    viaje6.reservar(cliente8, LocalDate.of(2021, 8, 28)); // reserva 28 agosto
    viaje6.reservar(cliente9, LocalDate.of(2021, 8, 28)); // reserva 28 agosto
    viaje6.reservar(cliente10, LocalDate.of(2021, 8, 28)); // reserva 28 agosto

    // cliente 1 trata de pagar una reserva que no tiene
    viaje6.pagar(cliente1, LocalDate.of(2021, 8, 28)); // pago 28 agosto

    // cliente 5, 7 y 10 pagan su reserva
    viaje6.pagar(cliente5, LocalDate.of(2021, 8, 28)); // pago 28 agosto (aplica descuento del 30%)
    viaje6.pagar(cliente7, LocalDate.of(2021, 8, 28)); // pago 28 agosto (aplica descuento del 50%)
    viaje6.pagar(cliente10, LocalDate.of(2021, 8, 28)); // pago 28 agosto
    
    // cliente 8 paga su reserva el mismo día del viaje
    viaje6.pagar(cliente8, LocalDate.of(2021, 8, 30)); // pago 30 agosto

  }
}