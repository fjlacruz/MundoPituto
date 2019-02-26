
   function myFunction(idButton) {
      var pendientes = document.getElementById('pendientes');
      var editar = document.getElementById('editar');
      var generar = document.getElementById('generar');

      switch(idButton) {
       case 1:
       pendientes.style.display = 'block';
       editar.style.display = 'none';
       generar.style.display = 'none';
       break;

       case 2:
       pendientes.style.display = 'none';
       editar.style.display = 'block';
       generar.style.display = 'none';
       break;

       case 3:
       pendientes.style.display = 'none';
       editar.style.display = 'none';
       generar.style.display = 'block';
       break;

       default:
       alert("hay un problema: No la ruta....")
   }

}
