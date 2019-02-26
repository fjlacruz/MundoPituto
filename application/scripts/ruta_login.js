
   function myFunction(idButton) {
      var login = document.getElementById('login');
      var registrar_usuario = document.getElementById('registrar_usuario');
      var recuperar_usuario = document.getElementById('recuperar_usuario');

      switch(idButton) {
       case 1:
       login.style.display = 'block';
       registrar_usuario.style.display = 'none';
       recuperar_usuario.style.display = 'none';
       break;

       case 2:
       login.style.display = 'none';
       registrar_usuario.style.display = 'block';
       recuperar_usuario.style.display = 'none';
       break;

       case 3:
       login.style.display = 'none';
       registrar_usuario.style.display = 'none';
       recuperar_usuario.style.display = 'block';
       break;

       default:
       alert("hay un problema: No la ruta....")
   }

}
