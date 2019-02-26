
<?php

$variablesSesion = $this->session->userdata('usuario');
        $id_usuario      = ($variablesSesion['id_usuario']);
        if ($id_usuario == "") {
            redirect('principal/session');
        }

?>



<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>

<style type="text/css">
   .login-container{
   margin-top: 2%;
   margin-bottom: 2%;
   }
   .login-form-1{
   padding: 1%;
   margin: 0%;
   box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
   background-color:#FFF;
   }
   #estilo1{
   color:#FFF;
   background:#001a36;
   border: #4B95F9 2px solid ;
   width: 50%;
   align-content: center;
   }
   #estilo2{
   color:#FFF;
   background:#001a36;
   border: #4B95F9 2px solid ;
   width: 30%;
   align-content: center;
   }
   p.italic {
   font-style: italic;
   }
</style>
<style type="text/css">
   #scroll {
   overflow:scroll;
   height:350px;
   width:auto;
   }
</style>
<style type="text/css">
   .panel.with-nav-tabs .panel-heading{
   padding: 5px 5px 0 5px;
   }
   .panel.with-nav-tabs .nav-tabs{
   border-bottom: none;
   }
   .panel.with-nav-tabs .nav-justified{
   margin-bottom: -1px;
   }
   /********************************************************************/
   /*** PANEL DEFAULT ***/
   .with-nav-tabs.panel-default .nav-tabs > li > a,
   .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
   color: #777;
   }
   .with-nav-tabs.panel-default .nav-tabs > .open > a,
   .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
   color: #777;
   background-color: #ddd;
   border-color: transparent;
   }
   .with-nav-tabs.panel-default .nav-tabs > li.active > a,
   .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
   color: #555;
   background-color: #fff;
   border-color: #ddd;
   border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
   background-color: #f5f5f5;
   border-color: #ddd;
   }
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
   color: #777;   
   }
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
   background-color: #ddd;
   }
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
   .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
   color: #fff;
   background-color: #555;
   }
   /********************************************************************/
   /*** PANEL PRIMARY ***/
   .with-nav-tabs.panel-primary .nav-tabs > li > a,
   .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
   color: #fff;
   }
   .with-nav-tabs.panel-primary .nav-tabs > .open > a,
   .with-nav-tabs.panel-primary .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-primary .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-primary .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-primary .nav-tabs > li > a:focus {
   color: #fff;
   background-color: #3071a9;
   border-color: transparent;
   }
   .with-nav-tabs.panel-primary .nav-tabs > li.active > a,
   .with-nav-tabs.panel-primary .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-primary .nav-tabs > li.active > a:focus {
   color: #428bca;
   background-color: #fff;
   border-color: #428bca;
   border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu {
   background-color: #428bca;
   border-color: #3071a9;
   }
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a {
   color: #fff;   
   }
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
   background-color: #3071a9;
   }
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a,
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
   .with-nav-tabs.panel-primary .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
   background-color: #4a9fe9;
   }
   /********************************************************************/
   /*** PANEL SUCCESS ***/
   .with-nav-tabs.panel-success .nav-tabs > li > a,
   .with-nav-tabs.panel-success .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-success .nav-tabs > li > a:focus {
   color: #3c763d;
   }
   .with-nav-tabs.panel-success .nav-tabs > .open > a,
   .with-nav-tabs.panel-success .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-success .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-success .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-success .nav-tabs > li > a:focus {
   color: #3c763d;
   background-color: #d6e9c6;
   border-color: transparent;
   }
   .with-nav-tabs.panel-success .nav-tabs > li.active > a,
   .with-nav-tabs.panel-success .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-success .nav-tabs > li.active > a:focus {
   color: #3c763d;
   background-color: #fff;
   border-color: #d6e9c6;
   border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu {
   background-color: #dff0d8;
   border-color: #d6e9c6;
   }
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a {
   color: #3c763d;   
   }
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
   background-color: #d6e9c6;
   }
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a,
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
   .with-nav-tabs.panel-success .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
   color: #fff;
   background-color: #3c763d;
   }
   /********************************************************************/
   /*** PANEL INFO ***/
   .with-nav-tabs.panel-info .nav-tabs > li > a,
   .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
   color: #31708f;
   }
   .with-nav-tabs.panel-info .nav-tabs > .open > a,
   .with-nav-tabs.panel-info .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-info .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li > a:focus {
   color: #31708f;
   background-color: #bce8f1;
   border-color: transparent;
   }
   .with-nav-tabs.panel-info .nav-tabs > li.active > a,
   .with-nav-tabs.panel-info .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li.active > a:focus {
   color: #31708f;
   background-color: #fff;
   border-color: #bce8f1;
   border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu {
   background-color: #d9edf7;
   border-color: #bce8f1;
   }
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a {
   color: #31708f;   
   }
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
   background-color: #bce8f1;
   }
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a,
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
   .with-nav-tabs.panel-info .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
   color: #fff;
   background-color: #31708f;
   }
   /********************************************************************/
   /*** PANEL WARNING ***/
   .with-nav-tabs.panel-warning .nav-tabs > li > a,
   .with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
   color: #8a6d3b;
   }
   .with-nav-tabs.panel-warning .nav-tabs > .open > a,
   .with-nav-tabs.panel-warning .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-warning .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-warning .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-warning .nav-tabs > li > a:focus {
   color: #8a6d3b;
   background-color: #faebcc;
   border-color: transparent;
   }
   .with-nav-tabs.panel-warning .nav-tabs > li.active > a,
   .with-nav-tabs.panel-warning .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-warning .nav-tabs > li.active > a:focus {
   color: #8a6d3b;
   background-color: #fff;
   border-color: #faebcc;
   border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu {
   background-color: #fcf8e3;
   border-color: #faebcc;
   }
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a {
   color: #8a6d3b; 
   }
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
   background-color: #faebcc;
   }
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a,
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
   .with-nav-tabs.panel-warning .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
   color: #fff;
   background-color: #8a6d3b;
   }
   /********************************************************************/
   /*** PANEL DANGER ***/
   .with-nav-tabs.panel-danger .nav-tabs > li > a,
   .with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
   color: #a94442;
   }
   .with-nav-tabs.panel-danger .nav-tabs > .open > a,
   .with-nav-tabs.panel-danger .nav-tabs > .open > a:hover,
   .with-nav-tabs.panel-danger .nav-tabs > .open > a:focus,
   .with-nav-tabs.panel-danger .nav-tabs > li > a:hover,
   .with-nav-tabs.panel-danger .nav-tabs > li > a:focus {
   color: #a94442;
   background-color: #ebccd1;
   border-color: transparent;
   }
   .with-nav-tabs.panel-danger .nav-tabs > li.active > a,
   .with-nav-tabs.panel-danger .nav-tabs > li.active > a:hover,
   .with-nav-tabs.panel-danger .nav-tabs > li.active > a:focus {
   color: #a94442;
   background-color: #fff;
   border-color: #ebccd1;
   border-bottom-color: transparent;
   }
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu {
   background-color: #f2dede; /* bg color */
   border-color: #ebccd1; /* border color */
   }
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a {
   color: #a94442; /* normal text color */  
   }
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
   background-color: #ebccd1; /* hover bg color */
   }
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a,
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
   .with-nav-tabs.panel-danger .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
   color: #fff; /* active text color */
   background-color: #a94442; /* active bg color */
   }
</style>


<style type="text/css">
   
</style>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/tooltip.css" />
<script src="<?php echo base_url(); ?>application/scripts/ruta_solicitudes.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
       (function ($) {
           $('#filtrar').keyup(function () {
               var rex = new RegExp($(this).val(), 'i');
               $('.buscar tr').hide();
               $('.buscar tr').filter(function () {
                   return rex.test($(this).text());
               }).show();
           })
       }(jQuery));
   });
</script> 
<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_usuario=($variablesSesion['id_usuario']);
   ?> 


</br></br>
<div class="container" style="width: 99%;">
<div id="estilo1" align="center">
   <p><h3>Mensajes</h3></p>
</div>
</div>

<div class="container login-container" style="width: 99%;">
<div class="row">
   <div class="col-md-12">
      <div class="panel with-nav-tabs panel-default">
         <div class="panel-heading">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#tab1default" data-toggle="tab"><strong> Mensajes Recibidos </strong></a></li>
               <li><a href="#tab2default" data-toggle="tab">Mensajes Enviados</a></li>
            </ul>
         </div>
         <div class="panel-body">
            <div class="tab-content">
               <div class="tab-pane fade in active" id="tab1default">
                  <div class="row">
                                 <div class="col-md-12 " >
                                    </br>
                                    <!-- <div class="input-group"> <span class="input-group-addon">Buscar</span>
                                       <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
                                    </div> -->
                                    </br>
                                    <div id="scroll">
                                       <div id="tabla_recibidos">

                                          <!--============================Tabla recibidos  ======================================-->
                                          

                                       </div>
                                    </div>
                                 </div>
                              </div>
               </div>
               <div class="tab-pane fade" id="tab2default">
                  <html>
                     <body style="background-color:#F4F7F9;">
                        <div id="cerradas">
                           <div >
                              <div class="row">
                                 <div class="col-md-12 " >
                                    </br>
                                 <!--    <div class="input-group"> <span class="input-group-addon">Buscar</span>
                                       <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
                                    </div> -->
                                    </br>
                                    <div id="scroll">
                                       <div id="tabla_enviadas">
                                          <!--============================Tabla recibidos  ======================================-->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                     </body>
                  </html>
                  <input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>solicitudes/mensajes"></div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<br/>



  



<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formulario2').formValidation({
       fields: {
   
           id_categoria: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           id_sub_categoria: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           tipo_solicitud: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
            descripcion_solicitud: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           }
        }
   //==============  registro de Usuario ======================================================          
   }).on('success.form.fv', function(e) {
   e.preventDefault();
   var $form = $(e.target);
   $.ajax({
       url: "<?php echo base_url() . 'Solicitudes/registrar_solicitud'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
   
       alertify.log("Se ha Registrado una Solicitud...!!"); 
   
       $('#formulario2').formValidation('resetForm');
       $('#formulario2')[0].reset();
       //myFunction(1);
       //window.location.reload();
       location.reload()
   });
   });
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $('#userForm').formValidation({
          
       }).on('success.form.fv', function(e) {
           e.preventDefault();
           var $form = $(e.target);
           $.ajax({
               url: "<?php echo base_url() . 'administracion/actualizar_usuario'; ?>",
               method: 'POST',
               data: $form.serialize()
           }).success(function(response) {
            alertify.log("Usuario Actualizado...!!!"); 
               return false;
            $('#formulario')[0].reset();
               myFunction(1)
               reload_table();
           });
       });
   });
   $('.editButton').on('click', function() {
       var id = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'consultas/consultar_usuario_id/'; ?>" + id,
           method: 'GET'
   
       }).success(function(data) {
   
            var obj1 = JSON.parse(data);//parceamos los datos
            var obj = eval("(" + JSON.stringify(obj1) + ")");// limpiamos el json
            
           $('#userForm')
           $('[name="id"]').val(obj.id_usuario);
           $('[name="cedula_modal"]').val(obj.cedula);
           $('[name="nombres_modal"]').val(obj.nombres);
           $('[name="apellidos_modal"]').val(obj.apellidos);
           $('[name="usuario_modal"]').val(obj.usuario);
           $('[name="correo_modal"]').val(obj.correo);
           $('[name="rol_modal"]').val(obj.rol);
           $('[name="estatus_modal"]').val(obj.estatus);
           $('[name="id_comunidad_modal"]').val(obj.id_comunidad);
           
       });
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   $('.deleteButton').on('click', function() {
       var id = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'Solicitudes/eliminar_mensaje/'; ?>" + id,
           method: 'POST'
   
       }).success(function(response) {
            alertify.log("Mensaje Eliminado...!!!"); 
            $('#formulario')[0].reset();
               reload_table();
           });
       setInterval(function() {
                    window.location.href = $("#redireccion_mensaje").val();
                }, 2000);
       });
   });
</script>
<script>
   $(function () {
   $('[data-toggle="tooltip"]').tooltip()
   })
</script>


<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



<script type="text/javascript">
  $(document).ready(function() {
    var refreshId = setInterval(function() {
      $("#tabla_enviadas").load("<?php echo base_url() ?>Solicitudes/carga_msj_enviados")
      .error(function() { alert("Error"); });
    }, 1000);
    $.ajaxSetup({ cache: false });        
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var refreshId = setInterval(function() {
      $("#tabla_recibidos").load("<?php echo base_url() ?>Solicitudes/carga_msj_recibidos")
      .error(function() { alert("Error"); });
    }, 1000);
    $.ajaxSetup({ cache: false });        
  });
</script>