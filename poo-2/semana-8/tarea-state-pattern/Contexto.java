public class Contexto {
  private Estado estado;
  private String nombre;

  public Contexto(String nombre) {
    this.nombre = nombre;
    estado = null;
  }

  public String getNombre() {
    return nombre;
  }

  public void definirEstado(Estado estado){
    this.estado = estado;
  }

  public Estado obtenerEstado(){
    return estado;
  }
}
