import javax.swing.*;
import java.awt.*;
import java.awt.event.*;

public class Formulario extends JFrame implements ActionListener {
  // nombres
  // rut
  // telefono
  // direccion
  // region (lista despegable)
  // motivo del contacto
  // satisfaccion (slider)
  // enviar

  String[] regiones = {"Arica y Parinacota", "Tarapacá", "Antofagasta", "Atacama", "Coquimbo", "Valparaíso", " Metropolitana de Santiago", "O'Higgins", "Maule y Ñuble", "Biobío", "La Araucanía", "Los Ríos", "Los Lagos", "Aysén", "Magallanes"};

    // Componentes del formulario
    private Container c;
    private JLabel titulo;

    private JLabel nombre;
    private JTextField tNombre;

    private JLabel rut;
    private JTextField tRut;

    private JLabel telefono;
    private JTextField tTelefono;

    private JLabel direccion;
    private JTextField tDireccion;

    private JLabel region;
    private JComboBox<String> combo = new JComboBox<String>(regiones);

    private JLabel motivo;
    private JTextArea motivoArea;

    private JLabel satisfaccion;
    private JSlider satisfaccionSlider;

    private JButton enviar;

    Cursor textCursor = new Cursor(Cursor.TEXT_CURSOR);

    // fuente usada para los label
    Font font = new Font("Arial", Font.PLAIN, 20);

    // fuente usada para los text field
    Font fontTextField = new Font("Arial", Font.PLAIN, 15);

    public Formulario()
    {
        setTitle("Formulario");
        setBounds(500, 90, 600, 600);
        setDefaultCloseOperation(EXIT_ON_CLOSE);
        setResizable(false);
        int mitadFrame = getBounds().width / 2;

        c = getContentPane();
        c.setLayout(null);

        titulo = new JLabel("Formulario", SwingConstants.CENTER);
        titulo.setFont(new Font("Arial", Font.PLAIN, 30));
        titulo.setSize(mitadFrame, 30);
        titulo.setLocation(titulo.getSize().width / 2, 30);
        c.add(titulo);

        // NOMBRE
        nombre = new JLabel("Nombre");
        nombre.setFont(font);
        nombre.setCursor(textCursor);
        nombre.setSize(mitadFrame, 20);
        nombre.setLocation(100, 100);
        c.add(nombre);

        tNombre = new JTextField();
        tNombre.setFont(fontTextField);
        tNombre.setSize(190, 20);
        tNombre.setLocation(200, 100);
        c.add(tNombre);

        // RUT
        rut = new JLabel("RUT");
        rut.setFont(font);
        rut.setCursor(textCursor);
        rut.setSize(mitadFrame, 20);
        rut.setLocation(100, 150);
        c.add(rut);

        tRut = new JTextField();
        tRut.setFont(new Font("Arial", Font.PLAIN, 15));
        tRut.setSize(150, 20);
        tRut.setLocation(200, 150);
        c.add(tRut);

        // TELEFONO
        telefono = new JLabel("Telefono");
        telefono.setFont(new Font("Arial", Font.PLAIN, 20));
        telefono.setCursor(textCursor);
        telefono.setSize(mitadFrame, 20);
        telefono.setLocation(100, 200);
        c.add(telefono);

        tTelefono = new JTextField();
        tTelefono.setFont(fontTextField);
        tTelefono.setSize(150, 20);
        tTelefono.setLocation(200, 200);
        c.add(tTelefono);

        // DIRECCION
        direccion = new JLabel("Direccion");
        direccion.setFont(new Font("Arial", Font.PLAIN, 20));
        direccion.setCursor(textCursor);
        direccion.setSize(mitadFrame, 20);
        direccion.setLocation(100, 250);
        c.add(direccion);

        tDireccion = new JTextField();
        tDireccion.setFont(fontTextField);
        tDireccion.setSize(200, 20);
        tDireccion.setLocation(200, 250);
        c.add(tDireccion);

        // REGION
        region = new JLabel("Región");
        region.setFont(font);
        region.setSize(mitadFrame, 20);
        region.setLocation(100, 300);
        c.add(region);

        combo.setLocation(200, 300);
        combo.setSize(mitadFrame, 20);
        c.add(combo);

        // MOTIVO DE CONTACTO
        motivo = new JLabel("Motivo");
        motivo.setFont(font);
        motivo.setCursor(textCursor);
        motivo.setSize(mitadFrame, 20);
        motivo.setLocation(100, 350);
        c.add(motivo);

        motivoArea = new JTextArea();
        motivoArea.setFont(fontTextField);
        motivoArea.setSize(mitadFrame, 50);
        motivoArea.setLocation(200, 350);
        c.add(motivoArea);

        // SATISFACCION
        satisfaccion = new JLabel("Satisfaccion");
        satisfaccion.setFont(font);
        satisfaccion.setSize(mitadFrame, 20);
        satisfaccion.setLocation(100, 420);
        c.add(satisfaccion);

        satisfaccionSlider = new JSlider(1, 10);
        satisfaccionSlider.setLocation(210, 430);
        satisfaccionSlider.setSize(mitadFrame, 40);
        satisfaccionSlider.setMajorTickSpacing(1);
        satisfaccionSlider.setMinorTickSpacing(1);
        satisfaccionSlider.setPaintTicks(true);
        satisfaccionSlider.setPaintLabels(true);
        c.add(satisfaccionSlider);

        // ENVIAR
        enviar = new JButton("Enviar");
        enviar.setFont(font);
        enviar.setSize(100, 20);
        enviar.setLocation(mitadFrame - 50, 500);
        enviar.addActionListener(this);
        c.add(enviar);

        setVisible(true);
    }

    @Override
    public void actionPerformed(ActionEvent e)
    {
      // SE ENVIA EL FORMULARIO PRESIONANDO EL BOTON
      JOptionPane.showMessageDialog(this, "Nombre: " + tNombre.getText() + "!\n" +
              "RUT: " + tRut.getText() + "\n" + 
              "Telefono: " + tTelefono.getText() + "\n" +
              "Direccion: " + tDireccion.getText() + "\n" +
              "Region: " + combo.getSelectedItem() + "\n" +
              "Motivo de contacto: " + motivoArea.getText() + "\n" +
              "Satisfacción: " + satisfaccionSlider.getValue() + "\n");
    }
}
