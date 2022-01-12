<script>
// El siguiente código JavaScript ocasiona que siempre al momento de refrescar la página "manualmente" lo haga como GET y no como POST (cuando el formulario es enviado)
if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
</script>

</body>

</html>