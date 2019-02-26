
   function myFunction(idButton) {
      var datos = document.getElementById('datos');
      var clave = document.getElementById('clave');
      var foto = document.getElementById('foto');

      switch(idButton) {
       case 1:
       datos.style.display = 'block';
       clave.style.display = 'none';
       foto.style.display = 'none';
       break;

       case 2:
       datos.style.display = 'none';
       clave.style.display = 'block';
       foto.style.display = 'none';
       break;

       case 3:
       datos.style.display = 'none';
       clave.style.display = 'none';
       foto.style.display = 'block';
       break;

       default:
       alert("hay un problema: No existe la ruta.")
   }

}
