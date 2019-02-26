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
<html>
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
      <div class="container login-container" style="width: 99%;">
         <div class="row">
            <div class="col-md-1">
               &nbsp;
            </div>
            <div class="col-md-10 login-form-1" >
               <div id="estilo1" align="center">
                  <p>
                  <h3>Mensajes</h3>
                  </p>
               </div>
               <div class="col-md-12">&nbsp;</div>
                <form id="formulario" name="formulario" method="POST">
                  <?php
                  foreach ($resultados as $resultado) { 
                    ?>
                  <input type="hidden" name="id_usuarios" id="id_usuarios" value="<?Php echo $resultado->id_usuarios; ?>">
              
                  <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?Php echo $resultado->id_solicitud; ?>">
                  <div class="col-sm-12">
                           <textarea class="form-control text-uppercase" rows="5" id="valoracion" name="valoracion" placeholder="Breve descripci&oacute;n de su experiecia con el trabajo realizado" readonly=""  value="<?Php echo $resultado->mensaje; ?>"><?Php echo $resultado->mensaje; ?></textarea>
                        </div>
                  <div class="col-md-12">&nbsp;</div>
                  <div class="col-sm-12">
                        <textarea class="form-control text-uppercase" rows="5" id="mensaje" name="mensaje" placeholder="Redacte un mensaje"></textarea>
                        </div>
                  
                   <div class="col-md-12">&nbsp;</div>
                  <div class="col-md-12">
                     <button type="submit" class="btn bg-navy"><i class="fa fa-paper-plane"></i> Enviar</button>
                           <a  href="<?php echo base_url() . 'solicitudes/mensajes'; ?>"><button type="button" class="btn bg-orange"><i class="fa fa-close"> Cancelar</i></button></a>
                  </div>
                   <div class="col-md-12">&nbsp;</div>
                    <div class="col-md-12">&nbsp;</div>      
                    <?php
                      }
                      ?>
                </form>
            </div>
         </div>
      </div>
   </body>
</html>
<input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>Solicitudes/solicitudes_cerradas">
<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formulario').formValidation({
       fields: {
   
           mensaje: {
               row: '.col-sm-12',
               validators: {
                   notEmpty: {
                       message: 'REDACTE UN MENSAJE'
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
       url: "<?php echo base_url() . 'Solicitudes/registrar_mensajesPit'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
   
       alertify.log("Se ha Registrado una Solicitud...!!"); 
   
       $('#formulario').formValidation('resetForm');
       $('#formulario')[0].reset();
       //myFunction(1);
       //window.location.reload();
       location.reload()
   });
   });
   });
   
</script>