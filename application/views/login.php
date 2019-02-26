<style type="text/css">
   .login-container{
   margin-top: 2%;
   margin-bottom: 2%;
   }
   .login-form-1{
   padding: 1%;
   box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
   background-color:#FFF;
   }
   .login-container form{
   padding: 0%;
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
  #radioBtn .notActive{
    color: #3276b1;
    background-color: #fff;
}
</style>




<script src="<?php echo base_url(); ?>application/scripts/ruta_login.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/jquery.multiselect.css">
<script src="<?php echo base_url(); ?>application/recursos/js/jquery.multiselect.js"></script>
<script type="text/javascript">
   function pagoOnChange(sel) {
       if (sel.value=="3"){
            divC = document.getElementById("visible");
            divC.style.display = "";
   
            divT = document.getElementById("oculto");
            divT.style.display = "none";
   
       }else{
   
            divC = document.getElementById("visible");
            divC.style.display="none";
   
            divT = document.getElementById("oculto");
            divT.style.display = "";
       }
   }
</script>
<html>
   <body style="background-color:#F4F7F9;">
      <div id="login">
         <div class="container login-container">
            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6 login-form-1">
                  <div id="estilo1" align="center">
                     <p>
                     <h3>Login Mundo Pituto</h3>
                     </p>
                  </div>
                  <div align="center">
                     <img class="img-responsive" src='https://127.0.0.1/MundoPituto/application/recursos/imagenes/logo.PNG' />
                  </div>
                  <form action='login' name="formulario" id="formulario" method="post">
                     <div class="form-group">
                        <label class="control-label col-sm-2">Usuario:</label>
                        <div class="col-sm-10">
                           <input class="form-control" id="usuario" name="usuario" type="text " placeholder="Usuario" onkeyup="javascript:this.value = this.value.toUpperCase()" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">Clave:</label>
                        <div class="col-sm-10">
                           <input class="form-control" id="clave" name="clave" type="password" placeholder="Clave" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">&nbsp;</label>
                        <div class="col-sm-10">
                           <button type="submit" class="btn bg-navy btn-block ajax"  onclick="testHoldon('sk-circle');"><i class="fa fa-unlock-alt"></i> Login</button></span>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">&nbsp;</label>
                        <div class="col-sm-10">
                           <button  onclick="myFunction(2)" class="btn bg-navy btn-block ajax"><i class="fa fa-user-plus"></i> Registrar Usuario</button></span>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-12">&nbsp;</div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="registrar_usuario" style="display:none;" >
         <div class="container login-container">
            <div class="row">
               <div class="col-md-12 login-form-1" >
                  <form id="formulario2" method="post" class="form-horizontal" action="">
                     <div id="estilo2" align="center">
                        <h3>Registro de Usuario</h3>
                     </div>
                     </br> 
                     <div class="form-group">
                        <label class="control-label col-sm-2">Identificaci&oacute;n:</label>
                        <div class="col-sm-2">
                        <select name="tipo_persona" id="tipo_persona"  class="form-control" >
                              <option value="">Tipo Persona</option>
                              <option value="NATURAL">NATURAL</option>
                              <option value="JURIDICA">JURIDICA</option>
                           </select>
                           </div>
                        <div class="col-sm-6">
                           <input type="text"  class="form-control text-uppercase form-control-sm" id="cedula" maxlength="20" name="cedula" placeholder="Identificaci&oacute;n">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">Nombres/ Raz&oacute;n Social:</label>
                        <div class="col-sm-8">
                           <input type="text"  v-model="nombres"  class="form-control text-uppercase" id="nombres" name="nombres" placeholder="Nombres" maxlength="20">
                        </div>
                     </div>
                     <!--      <div class="form-group">
                        <label class="control-label col-sm-2">Apellidos:</label>
                          <div class="col-sm-8">
                           <input type="text"  class="form-control text-uppercase" id="apellidos" onKeyPress="return soloLetras(event)" name="apellidos" placeholder="Apellidos" maxlength="20">
                          </div>
                        </div> -->
                     <div class="form-group">
                        <label class="control-label col-sm-2">Tel&eacute;fono:</label>
                        <div class="col-sm-8">
                           <input type="text"  class="form-control text-uppercase" id="telefono" onKeyPress="return soloNumeros(event)" name="telefono" placeholder="Tel&eacute;fono" maxlength="15">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">Email:</label>
                        <div class="col-sm-8">
                           <input type="text" class="form-control text-uppercase" id="correo" name="correo"  placeholder="Correo El&eacute;ctronico" maxlength="50">
                        </div>
                     </div>
                     <!-- <div class="form-group">
                        <label class="control-label col-sm-2">Prefil:</label>
                        <div class="col-sm-8">
                            <select name="id_perfil" id="id_perfil"  class="form-control" onChange="pagoOnChange(this)"> 
                            <select name="id_perfil" id="id_perfil"  class="form-control">
                              <option value="">Selecione...</option>
                              <?php
                                 foreach ($perfiles as $i => $perfil) {
                                     echo '<option value="' . $perfil->id_perfil . '">' . $perfil->descripcion_perfil . '</option>';
                                 }
                                 ?>                     
                           </select>
                        </div>
                     </div> -->

                     <div class="form-group">
                        <label class="control-label col-sm-2">Que quiero hacer?</label>
                        <div class="col-sm-8">
                          <div id="radioBtn" class="btn-group">
              <a class="btn btn-primary btn-sm active" data-toggle="id_perfil" data-title="2">QUIERO OFRECER TRABAJOS</a>
              <a class="btn btn-primary btn-sm notActive" data-toggle="id_perfil" data-title="3">QUIERO OFRECER MIS SERVIVICIOS</a>
            </div>
            <input type="hidden" name="id_perfil" id="id_perfil">
                            
                        </div>
                     </div>

                     

       



                     <!-- <div id="visible" style="display:none;"> -->
                      <div id="visible">
                        <div class="form-group">
                           <label class="control-label col-sm-2">Categor&iacute;a:</label>
                           <div class="col-sm-8">
                              <select name="categoria[]" id="categoria"  multiple="multiple" class="2col active form-control" >
                              <?php
                                 foreach ($categorias as $i => $categoria) {
                                     echo '<option value="' . $categoria->descripcion_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                                 }
                                 ?>                     
                              </select>
                           </div>
                        </div>
                        <!--  <div class="form-group">
                           <label class="control-label col-sm-2">Sub-Categor&iacute;a:</label>
                             <div class="col-sm-8">
                              <select name="id_sub_categoria" id="id_sub_categoria"  class="form-control" ><option value="">Selecione...</option>               
                           </select>
                             </div>
                           </div> -->
                     </div>
                     <!-- <div id="oculto" style="display:none;">
                        <div class="form-group">
                           <div class="col-sm-8">
                              <input type="hidden" name="id_categoria" id="id_categoria" value="0">
                           </div>
                        </div>
                     </div> -->
                     <div class="form-group">
                        <label class="control-label col-sm-2">Ubicaci&oacute;n:</label>
                        <div class="col-sm-2">
                           <select name="region_id" id="region_id"  class="form-control" required/>
                              <option value="">Seleccione Regi&oacute;n</option>
                              <option value="0"><strong>Todas las Regiones</strong></option>
                              <?php
                                 foreach ($regiones as $i => $region) {
                                     echo '<option value="' . $region->region_id . '">' . $region->region_nombre . '</option>';
                                 }
                                 ?>                     
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <select name="provincia_id" id="provincia_id"  class="form-control" >
                              <option value="">Provincia</option>
                           </select>
                        </div>
                        <div class="col-sm-3">
                           <select name="comuna_id" id="comuna_id"  class="form-control" >
                              <option value="">Comuna</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">Usuario:</label>
                        <div class="col-sm-8">
                           <input type="text"  class="form-control text-uppercase" id="usuario2" name="usuario" placeholder="Nombre de Usuario" maxlength="20">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="correo_modal">Clave:</label>
                        <div class="col-sm-8">
                           <input type="password" name="confirmar_clave" id="confirmar_clave" class="form-control text-uppercase" placeholder="Clave de Acceso" maxlength="20">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="correo_modal">Confirmar Clave:</label>
                        <div class="col-sm-8">
                           <input type="password" name="clave" id="clave" class="form-control text-uppercase" placeholder="Confirme su Clave de Acceso" maxlength="20">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="email">&nbsp;</label>
                        <div class="col-sm-8">
                           <button type="submit" class="btn bg-navy" onclick="myFunction(2)"><i class="fa fa-save"></i> Guardar</button>
                           <button type="button" class="btn bg-orange " onclick="myFunction(1)"><i class="fa fa-close">Cancelar</i></button>
                        </div>
                     </div>
                     </br>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="recuperar_usuario">
         recuperacion
      </div>
   </body>
</html>
<script>
   $(function () {
       $('select[multiple].active.2col').multiselect({
           columns: 2,
           placeholder: 'Seleccione Categorias',
           search: true,
           searchOptions: {
               'default': 'Seleccione una o mas Categorias'
           },
           selectAll: true
       });
   
   });
</script>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
   $(document).on("change", '#id_categoria', function ()
       {
   $("#id_sub_categoria").load("<?php echo base_url() . 'index.php/Administracion/obtener_sub_categoria?id_categoria='; ?>" + $(this).val());
       });
   
</script>
<script>
   //validacion con boostrap
   $(document).ready(function() {
   
       $('#loginForm').formValidation({
           framework: 'bootstrap',
           excluded: ':disabled',
           fields: {
               correo: {
                   validators: {
                       notEmpty: {
                           message: 'La Direcci&oacute;n de Correo es Requerida'
                       },
                       regexp: {
                           regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                           message: ' '
                       },
                       emailAddress: {
                           message: 'Direcci&oacute;n de Correo Inv&aacute;lida'
                       }
                   }
               }
           }
       });
   });
   $('#formulario').formValidation({
       framework: 'bootstrap',
       fields: {
           usuario: {
               row: '.col-sm-10',
               validators: {
                   notEmpty: {
                       message: 'Nombre de Usuario Requerido'
                   }
               }
           },
           clave: {
               row: '.col-sm-10',
               validators: {
                   notEmpty: {
                       message: 'La Clave es Requerida'
                   }
               }
           }
   
       }
   
   });
   //consultamos si el correo existe
   $(document).ready(function() {
       $('#correo').keyup(function() {
           var correo = $(this).val();
           var dataString = 'correo=' + correo;
   
           $.ajax({
               type: "POST",
               url: "consultar_correo",
               data: dataString,
               success: function(data) {
                   if (data == 1) {
   
                       $("#botones").show();
                       $("#resultado2").html("<div class='alert alert-success alert-dismissable'>\n\
                   <button type='button' class='close' data-dismiss='alert'>&times;</button>\n\
               <i class='icon fa fa-check'></i>Correo <strong>validado</strong> correctamente</div>");
                   } else {
   
                       $("#resultado2").html("<div class='alert alert-danger alert-dismissible'>\n\
                   <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
               <i class='icon fa fa-ban'></i><strong>Alerta! </strong>Cuenta de correo <strong>No Existente</div>");
                       document.getElementById('botones').style.display = 'none';
   
                   }
               }
           });
       });
   });
   // si existe enviamos el correo 
   $(document).ready(function() {
       $('#botones').click(function() {
           var correo = $('#correo').val();
           var dataString = 'correo=' + correo;
           $('#alerta').html('<label>Enviando correo ...</label>');
           $.ajax({
               data: dataString,
               type: 'POST',
               url: "recuperarClave",
               success: function(salida)
               {
                   $("#alerta").delay(1000).fadeOut(1000);
                   setTimeout(function() {
                       $('#success2').html('<label>Correo enviado con exito</label>');
                   }, 2000);
               }
   
           });
       });
   });
   
   //consultamos is el usuario existe
   $(document).on("blur", '#usuario', function()
   {
       $.ajax({
           url: "<?php echo base_url() . 'index.php/administracion/consultar_usuario2'; ?>",
           data: {usuario: $('#usuario').val()},
           dataType: 'html',
           type: 'post',
           success: function(respuesta) {
   
               console.log(respuesta);
               if (respuesta == 0)
               {
                   $('#usuario').val('');
                    alertify.error("El Usuario NO existe...!!!"); 
   
               }
           }
       });
   });
   
</script>
<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formulario2').formValidation({
       fields: {
           cedula: {
               row: '.col-sm-6',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           correo: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   },
                   regexp: {
                       regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                       message: 'Direcci&oacute;n de Correo Inv&aacute;lida'
                   }
               }
           },
           usuario: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           telefono: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           rol: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           nombres: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           apellidos: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           categoria: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           region_id: {
               row: '.col-sm-2',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           provincia_id: {
               row: '.col-sm-3',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           comuna_id: {
               row: '.col-sm-3',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           id_perfil: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           tipo_persona: {
               row: '.col-sm-2',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           confirmar_clave: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   },
                       /////PASSWORD = Mayuscula, Minuscula, numero, caracter especial
                       regexp: {
                           regexp: '^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$@!%?&.-_#,/]).{8,12}$',
                           message: 'La contrase&ntilde;a debe contener m&iacute;nimo 8 y m&aacute;ximo 12 caracteres, y por lo menos 1 may&uacute;scula del alfabeto , 1 min&uacute;sculas del alfabeto , 1 N&uacute;mero y el car&aacute;cter especial'
                       }
   
                   }
               },
               clave: {
                   row: '.col-sm-8',
                   validators: {
                       notEmpty: {
                           message: 'CAMPO OBLIGATORIO'
                       },
                       identical: {
                           field: 'confirmar_clave',
                           message: 'Las contrase&ntilde;a deben ser iguales'
                       }
                   }
               }
   
           }
   //==============  registro de Usuario ======================================================          
   }).on('success.form.fv', function(e) {
   e.preventDefault();
   var $form = $(e.target);
   $.ajax({
       url: "<?php echo base_url() . 'index.php/Administracion/registrar_usuario'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
   
       alertify.log("Se ha Registrado un usuario...!!"); 
   
       $('#formulario2').formValidation('resetForm');
       $('#formulario2')[0].reset();
       myFunction(1);
   });
   });
   });
   
</script>
<script>
   // Validar si existe cedula, correo y usuario
   $(document).on("blur", '#cedula', function() {
       $.ajax({
           url: "<?php echo base_url() . 'index.php/consultas/existe_cedula'; ?>",
           data: {cedula: $('#cedula').val()},
           dataType: 'html',
           type: 'post',
           success: function(respuesta) {
               if (respuesta == 1)
               {
                   $('#formulario').formValidation('resetForm');
                   $('#cedula').val('');
                   $("#nombres").val('');
                   $("#apellidos").val('');
                   alertify.error("Identificaci&oacute;n Ya Registrada...!!"); 
                   return false;
               }
           }
       });
   });
   $(document).on("blur", '#correo', function() {
       $.ajax({
           url: "<?php echo base_url() . 'index.php/consultas/existe_correo'; ?>",
           data: {correo: $('#correo').val()},
           dataType: 'html',
           type: 'post',
           success: function(respuesta) {
               if (respuesta == 1)
               {
                   $('#correo').val('');
                   $('#formulario').formValidation('resetForm');
                   alertify.error("Email ya Registrado...!!"); 
                   return false;
               }
           }
       });
   });
   
   $(document).on("blur", '#usuario2', function() {
       $.ajax({
           url: "<?php echo base_url() . 'index.php/consultas/existe_usuario'; ?>",
           data: {usuario: $('#usuario2').val()},
           dataType: 'html',
           type: 'post',
           success: function(respuesta) {
   
               if (respuesta == 1)
               {
                   $('#formulario').formValidation('resetForm');
                   $('#usuario2').val('');
                   alertify.error("usuario ya Registrado...!!"); 
                   return false;
               }
           }
       });
   });
</script>
<script type="text/javascript">
   function soloLetras(e) {
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " qwertyuiop�lkjhgfdsazxcvbnm";
       especiales = "8-37-39-46";
       tecla_especial = false
       for (var i in especiales) {
           if (key == especiales[i]) {
               tecla_especial = true;
               break;
           }
       }
   
       if (letras.indexOf(tecla) == -1 && !tecla_especial) {
           return false;
       }
   }
   
   function soloNumeros(e)
   {
       var key = window.Event ? e.which : e.keyCode
       return ((key >= 48 && key <= 57) || (key == 8))
   }
   
</script>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
   $(document).on("change", '#region_id', function ()
          {
     $("#provincia_id").load("<?php echo base_url() . 'index.php/Principal/obtener_provincia?region_id='; ?>" + $(this).val());
          });
      
</script>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
   $(document).on("change", '#provincia_id', function ()
          {
     $("#comuna_id").load("<?php echo base_url() . 'index.php/Principal/obtener_comuna?provincia_id='; ?>" + $(this).val());
          });
      
</script>

<script type="text/javascript">
  $('#radioBtn a').on('click', function(){
    var sel = $(this).data('title');
    var tog = $(this).data('toggle');
    $('#'+tog).prop('value', sel);
    
    $('a[data-toggle="'+tog+'"]').not('[data-title="'+sel+'"]').removeClass('active').addClass('notActive');
    $('a[data-toggle="'+tog+'"][data-title="'+sel+'"]').removeClass('notActive').addClass('active');
})
</script>