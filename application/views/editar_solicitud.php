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

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/tooltip.css" />
<script src="<?php echo base_url(); ?>application/scripts/ruta_solicitudes.js"></script>
 
<html>
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
         <div class="container login-container" style="width: 99%;>
            <div class="row">
            <div class="col-md-3">
               <div class="list-group">
                  <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item">Solicitudes Publicadas
                  <span class="badge badge-primary badge-pill">
                  <?php
                     foreach($pendientes as $resultado)
                       {
                       ?>
                  <?php echo $resultado->cantidad?>
                  <?php
                     }
                     ?>
                  </span></a>
                  <a href="<?php echo base_url() . 'Solicitudes/solicitudes_procesando'; ?>"  class="list-group-item">Solicitudes procesando 
                  <span class="badge badge-primary badge-pill">
                  <?php
                     foreach($procesando as $resultado)
                       {
                       ?>
                  <?php echo $resultado->cantidad?>
                  <?php
                     }
                     ?>
                  </span></a>
                  <a href="<?php echo base_url() . 'Solicitudes/solicitudes_cerradas'; ?>" class="list-group-item">Solicitudes Cerradas
                  <span class="badge badge-primary badge-pill">
                  <?php
                     foreach($cerradas as $resultado)
                       {
                       ?>
                  <?php echo $resultado->cantidad?>
                  <?php
                     }
                     ?>
                  </span></a>
                  <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item">Generar Solicitud</a>
                <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item active">Editando Solicitud...</a>
               </div>
            </div>
            <div class="col-md-9 login-form-1" >
               <div id="estilo1" align="center">
                  <p>
                  <h3>Editar Solicitud</h3>
                  </p>
               </div>
               </br>
               <form name="formularios" id="formularios" method="POST" action="actualizar_solicitud">
                <?php
                      foreach($resultados as $resultado)
                        {
                  $categoria = preg_split("/[{}]+/", $resultado->categoria);
                        ?>
                        <input type="hidden" name="id_solicitud" id="id_solicitud" value="<?php echo $resultado->id_solicitud?>">
                        <div class="form-group">
                         <label class="control-label col-sm-2">Tipo Solicitud:</label>
                           <div class="col-sm-8">
                            <select name="tipo_solicitud" id="tipo_solicitud"  class="form-control" >
                              <option value="<?php echo $resultado->tipo_solicitud?>"><?php echo $resultado->tipo_solicitud?></option>
                              <option value="COTIZACION">COTIZACI&Oacute;N</option>
                              <option value="URGENCIA">URGENCIA</option>                   
                         </select>
                           </div>
                        </div>
                       <div class="col-sm-12">&nbsp;</div> 
                        <div class="form-group">
                         <label class="control-label col-sm-2">Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="categoria" id="categoria"  class="form-control" >
                              <option value="<?php echo $categoria[1] ?>"><?php echo $categoria[1] ?></option>
                              <?php
                                foreach ($categorias as $i => $categoria) {
                                  echo '<option value="' . $categoria->descripcion_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                                   }
                                 ?>                   
                         </select>
                           </div>
                        </div>

                        <div class="col-sm-12">&nbsp;</div> 

                        <div class="form-group">
                         <label class="control-label col-sm-2">Regi&oacute;n:</label>
                           <div class="col-sm-8">
                         <select name="region_id" id="region_id"  class="form-control" >
                            <option value="<?php echo $resultado->region_id ?>"><?php echo $resultado->region_nombre ?></option>
                              <?php
                                foreach ($regiones as $i => $region) {
                                    echo '<option value="' . $region->region_id . '">' . $region->region_nombre . '</option>';
                                   }
                                  ?>                     
                        </select>
                           </div>
                        </div>

                        <div class="col-sm-12">&nbsp;</div> 
                        <div class="form-group">
                         <label class="control-label col-sm-2">Provincia:</label>
                           <div class="col-sm-8">
                            <select name="provincia_id" id="provincia_id"  class="form-control" >
                              <option value="<?php echo $resultado->provincia_id ?>"><?php echo $resultado->provincia_nombre ?></option>                  
                         </select>
                           </div>
                        </div>

                        <div class="col-sm-12">&nbsp;</div> 
                        <div class="form-group">
                         <label class="control-label col-sm-2">Comuna:</label>
                           <div class="col-sm-8">
                            <select name="comuna_id" id="comuna_id"  class="form-control" >
                              <option value="<?php echo $resultado->comuna_id ?>"><?php echo $resultado->comuna_nombre ?></option>                  
                         </select>
                           </div>
                        </div>

                        <div class="col-sm-12">&nbsp;</div> 
                        <div class="form-group">
                         <label class="control-label col-sm-2">Descripci&oacute;n:</label>
                           <div class="col-sm-8">
                            <input type="text" class="form-control text-uppercase" name="descripcion_solicitud" id="descripcion_solicitud"
                            value="<?php echo $resultado->descripcion_solicitud ?>">
                           </div>
                        </div>

                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">&nbsp;</label>
                        <div class="col-sm-8">
                           <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Modificar</button>
                           <a  href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>"><button type="button" class="btn bg-orange"><i class="fa fa-close"> Cancelar</i></button></a>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
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




<script>
   $(document).on("change", '#region_id', function ()
          {
     $("#provincia_id").load("<?php echo base_url() . 'index.php/Principal/obtener_provincia?region_id='; ?>" + $(this).val());
          });
      $(document).on("change", '#provincia_id', function ()
          {
     $("#comuna_id").load("<?php echo base_url() . 'index.php/Principal/obtener_comuna?provincia_id='; ?>" + $(this).val());
          });
</script>
<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formulario').formValidation({
       fields: {
   
           valoracion: {
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
       url: "<?php echo base_url() . 'Solicitudes/finalizar_solicitud'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
       alertify.log("Solicitud finalizada...!!"); 
       $('#formulario').formValidation('resetForm');
       $('#formulario')[0].reset();
       setInterval(function() {
          window.location.href = $("#redireccion_mensaje").val();
          }, 2000);
       });
     });
   }); 
</script>
