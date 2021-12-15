<script>
// El siguiente código JavaScript ocasiona que siempre al momento de refrescar la página "manualmente", lo haga como GET y no como POST (cuando el formulario es enviado), ya que al momento de agregar un producto al carrito de compras, se llama al método POST y agrega el producto a la sesión. De lo contrario, cada vez que se agrege un producto al carrito y se refresque la página manualmente se estaría mostrando el mensaje de éxito infinitamente.
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script>
</body>

</html>