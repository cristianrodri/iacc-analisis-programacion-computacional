import java.text.DecimalFormat;
import java.util.Random;

public class Persona {
  private String nombre = "";
  private String apellido = "";
  private int edad = 0;
  private String RUT = generarRUT();
  private final char genero; // constante
  private int peso = 0;
  private double altura = 0;

  // constructor por defecto
  public Persona() {
    genero = 'H';
  }

  // constructor con 3 parámetros
  public Persona(String nombre, int edad, char genero) {
    this.nombre = nombre;
    this.edad = edad;
    this.genero = comprobarGenero(genero);
  }

  // constructor con todos los atributos como parámetros
  public Persona(
    String nombre, String apellido, String RUT, int edad, char genero, int peso, double altura
  ) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.RUT = RUT;
    this.edad = edad;
    this.genero = comprobarGenero(genero);
    this.peso = peso;
    this.altura = altura;
  }

  // calcula el índice de masa corporal (IMC) de la persona
  public int calcularIMC() {
    final int BAJO_PESO = -1;
    final int PESO_NORMAL = 0;
    final int SOBREPESO = 1;

    // IMC = peso / altura^2
    double IMC = this.peso / Math.pow(altura, 2);

    if (IMC < 20) return BAJO_PESO;
    else if (IMC >= 20 && IMC <= 25) return PESO_NORMAL;
    else return SOBREPESO;
  }

  // verifica si la persona es mayor de edad
  public boolean esMayorDeEdad() {
    return edad >= 18;
  }

  // verifica si el genero de la persona es correcto
  private char comprobarGenero(char genero) {
    // si el genero no 'H' o 'M', su valor por defecto será 'H'
    if (genero != 'H' && genero != 'M') {
      return 'H';
    }

    return genero;
  }

  // genera un rut automático
  private String generarRUT() {
    Random rand = new Random();
    DecimalFormat myFormatter = new DecimalFormat("###,###,###");

    // genera un número aleatorio entre 10 millones y 25 millones
    int rutAleatorio = rand.ints(10000000, 25000000).findFirst().getAsInt();

    // genera un dígito aleatorio entre 1 y 9
    int digitoVerificador = rand.ints(1, 9).findFirst().getAsInt();

    // formatea número aleatorio. Ejemplo: de 10000000 a 10,000,000
    String rutFormatoComa = myFormatter.format(rutAleatorio);

    // reemplaza la coma por el punto. Ejemplo: de 10,000,000 a 10.000.000
    String rutFormateado = rutFormatoComa.replace(',', '.');

    String rutFinal = rutFormateado + "-" + digitoVerificador;

    return rutFinal;
  }

  /*********************** MÉTODOS SET ***********************/
  public void setNombre(String nombre) {
    this.nombre = nombre;
  }

  public void setApellido(String apellido) {
    this.apellido = apellido;
  }

  public void setEdad(int edad) {
    this.edad = edad;
  }

  public void setRUT(String RUT) {
    this.RUT = RUT;
  }

  public void setPeso(int peso) {
    this.peso = peso;
  }

  public void setAltura(double altura) {
    this.altura = altura;
  }

  /*********************** MÉTODOS GET ***********************/
  public String getNombre() {
    return nombre;
  }

  public String getApellido() {
    return apellido;
  }

  public int getEdad() {
    return edad;
  }

  public String getRUT() {
    return RUT;
  }

  public char getGenero() {
    return genero;
  }

  public int getPeso() {
    return peso;
  }

  public double getAltura() {
    return altura;
  }
}
