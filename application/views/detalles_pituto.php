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
   height:290px;
   width:auto;
   }
   #scroll2 {
   overflow:scroll;
   height:130px;
   }
</style>
<style type="text/css">
   .btn:focus, .btn:active, button:focus, button:active {
   outline: none !important;
   box-shadow: none !important;
   }
   #image-gallery .modal-footer{
   display: block;
   }
   .thumb{
   margin-top: 5px;
   margin-bottom: 0px;
   }
   .aplanado {
   width: 100px;
   height: 100px; 
   }
   .img-container img{
   width:100%;
   height:100%
   }
</style>
<style type='text/css'>
   img.ribbon {
   position: fixed;
   z-index: 1;
   top: 0;
   right: 0;
   border: 0;
   cursor: pointer; }
   .starrr {
   display: inline-block; }
   .starrr a {
   font-size: 16px;
   padding: 0 1px;
   cursor: pointer;
   color: #FFD119;
   text-decoration: none; }
   .checked {
   color: orange;
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

<script type="text/javascript">
$(document).ready(function(){
  $("#hide").click(function(){
    $("#element").hide();
  });
  $("#show").click(function(){
    $("#element").show();
  });
});
</script>


<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_usuarioSolicitante=($variablesSesion['id_usuario']);
   $id_usuario = ($variablesSesion['id_usuario']);
   if ($variablesSesion == "") {
       redirect('principal/session');
   }
   
   $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);
   ?> 
<html>
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
         <div class="container login-container" style="width: 99%;">
            <div class="row">
               <div class="col-md-2">
                  <div class="list-group">
                     <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item">Solicitudes Pendientes
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
                     <a href="<?php echo base_url() . 'Solicitudes/solicitudes_cerradas'; ?>" class="list-group-item ">Solicitudes Cerradas
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
                     <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item">Generar Solicitud</a>
                     <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item active">Valoraciones...</a>
                  </div>
               </div>
               <div class="col-md-10 login-form-1" >
                  <div id="estilo1" align="center">
                     <p>
                     <h3>Valoraciones</h3>
                     </p>
                  </div>
                  <div id="scroll">
                     <div class="col-sm-12">&nbsp;</div>
                     <?php
                        if ($verf_foto == 1) { 
                          foreach($foto_usuario as $resultado){
                          $foto=  $resultado->foto;
                            } 
                          ?>
                     <div class="col-sm-4" align="left"  >
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <a target="_blank" href="https://127.0.0.1/MundoPituto/uploads/<?php echo $foto?>">
                        <img class="img-thumbnail img-responsive zoom"  width="250" height="250" src='https://127.0.0.1/MundoPituto/uploads/<?php echo $foto?>'/>
                        </a><br/>
                        <div align="center" >
                           <br/><br/>

<!-- ==================================== Galeria del Pituto ========================================================-->
                          <?php
                          if($verf_foto_galeria == 1){ ?>
                           <i class="fa fa-camera"></i>  Ver Galer&iacutea
                           <div class="img-container" align="center" id="scroll2" style="width: 40%">
                              <div class="col-lg-3 col-md-4 col-xs-6 thumb" align="center">
                                 <?php
                                    foreach($galeria as $resultado)
                                      {
                                      ?>
                                 <a align="center" class="thumbnail fondo aplanado" href="#" data-image-id="" data-toggle="modal" data-title=""
                                    data-image="https://127.0.0.1/MundoPituto/archivos/<?php echo $resultado->foto?>"
                                    data-target="#image-gallery">
                                 <img class="img-thumbnail fondo aplanado" 
                                    src="https://127.0.0.1/MundoPituto/archivos/<?php echo $resultado->foto?>"
                                    alt="Galeria">
                                 </a>
                                 <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                       <div class="modal-content">
                                          <div class="modal-header" align="left">
                                             <h4 class="modal-title" id="image-gallery-title"></h4>
                                             <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span>
                                             </button>
                                             <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                             </button>
                                             <button type="button" id="show-next-image" class="btn btn-secondary float-right">
                                                <i class="fa fa-arrow-right"></i>
                                          </div>
                                          <div class="modal-body">
                                          <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                                          </div>
                                          <div class="modal-footer">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                    }
                                    ?>  
                              </div>
                           </div>
                           <?php } ?>
<!-- ====================================Fin Galeria del Pituto ========================================================-->

                        </div>
                     </div>
                     <?php } ?>
                     <?php
                        if ($verf_foto == 0) { 
                          foreach($foto_usuario as $resultado){
                          $foto=  $resultado->foto;
                            } 
                          ?>
                     <div class="col-sm-4" align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                     <img class="img-circle" width="150" height="150" src='https://127.0.0.1/MundoPituto/silueta.jpg'/>
                     </div>
                     <?php } ?>
                     <?php
                        foreach($perfil as $resultado)
                          {
                          ?>
                     <div class="col-sm-8">
                     <div class="panel panel-default">
                     <div class="panel-heading"><strong>Informaci&oacute;n </strong></div>
                     <div class="panel-body">
                     <p align="justify"><strong>Nombres:</strong> <?php echo $resultado->nombres ?></br>
                     <strong>Tipo Persona:</strong><?php echo $resultado->tipo_persona?></br>
                     <strong>Fono:</strong> <?php echo $resultado->telefono?></br>
                     <strong>Email:</strong> <?php echo $resultado->correo?></br>
                     <strong>Ubicaci&oacute;n:</strong> <?php echo $resultado->region_nombre?>/<?php echo $resultado->provincia_nombre?>/<?php echo $resultado->comuna_nombre?></br>
                     <strong>Conocimientos/habilidades: </br></strong><?php echo $resultado->conocimientos_habilidades?></br>
                     <strong>Experiencia: </br></strong><?php echo $resultado->experiencia?></br>
                     </p>
                     <br/><br/>  
                     </div>
                     </div>
                     </div>
                     <?php
                        }
                        ?>
                     <div class="col-sm-12">&nbsp;</div>
                     <table class="table table-striped" align='justify'>
                     <thead>
                     <tr >
                     <th align="justify">Descripci&oacute;n Solicitud</th>
                     <th align="justify">Valoraci&oacute;n</th>
                     <th align="justify">Calificaci&oacute;n</th>
                     <th align="justify">&nbsp;</th>
                     </tr>
                     </thead>
                     <?php
                        if($verf=="1")
                           {
                           echo "
                           <tbody class='buscar'>";
                           foreach ($resultados as $resultado) {
                               $id_usuario = $resultado->id_usuario;
                               $descripcion_solicitud = $resultado->descripcion_solicitud;
                               $valoracion = $resultado->valoracion;
                               $puntuacion = $resultado->puntuacion;
                               $puntuacion_num = $resultado->puntuacion;
                               if($puntuacion=='5'){
                                $puntuacion = "<div class='starrr' id='star2'>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               </div>";
                               }elseif ($puntuacion=='4') {
                                $puntuacion = "<div class='starrr' id='star2'>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star'></span>
                                               </div>";
                               }elseif($puntuacion=='3'){
                                $puntuacion = "<div class='starrr' id='star2'>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star'></span>
                                               <span class='fa fa-star'></span>
                                              </div>";
                               }elseif($puntuacion=='2'){
                                $puntuacion = "<div class='starrr' id='star2'>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star'></span>
                                               <span class='fa fa-star'></span>
                                               <span class='fa fa-star'></span>
                                              </div>";
                               }else{
                                $puntuacion = "<div class='starrr' id='star2'>
                                               <span class='fa fa-star checked'></span>
                                               <span class='fa fa-star'></span>
                                               <span class='fa fa-star'></span>
                                               <span class='fa fa-star'></span>
                                               <span class='fa fa-star'></span>
                                              </div>";
                               }
                               
                           echo "
                           <tr>                      
                           <td >" . $descripcion_solicitud . "</td>
                           <td >" . $valoracion . "</td>
                           <td>" . $puntuacion . "</td>
                        
                           <td>&nbsp;</td>             
                           </tr>";
                           }
                           echo "
                           <tbody>
                           ";
                           }else{
                              echo '<tr>
                              <td colspan="6">Este usuario aun no posee valoraciones.</td>
                              </tr>';
                            }
                           ?>
                     </table>
                     <div class="col-sm-12" id="element" style="display: none;">
                     <form name="formulario_msj" id="formulario_msj" method="POST" action="">
                      <?php
                         foreach($solicitud_usuario as $resultado)
                          {
                         ?>

                     <input type="hidden" name="id_usuarioS" id="id_usuarioS" value="<?php echo $id_usuarioSolicitante ?>">
                     <input type="hidden" name="id_solicitud" id="id_solicitud" value="<?php echo $resultado->id_solicitud ?>"> 
                     <input type="hidden" name="id_usuarioP" id="id_usuarioP" value="<?php echo $resultado->id_usuario ?>">
                     <div class="col-sm-12">
                     <textarea class="form-control text-uppercase" rows="5" id="mensaje" name="mensaje" placeholder="Envie un mensaje para acordar trabajo" required=""></textarea>
                       </div>
                       <div class="col-sm-12">&nbsp;</div>
                     <button type="submit" class="btn bg-navy"><i class="fa fa-plane"></i> Enviar</button>
                       <button type="button" class="btn bg-orange" id="hide"><i class="fa fa-close"></i> Cerrar</button>
                       <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-12">&nbsp;</div>

                     </form>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-12">
                     <button type="submit" class="btn bg-navy" id="show" ><i class="fa fa-envelope"></i> Enviar Mensaje</button>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-12">&nbsp;</div>

                     




                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <div class="container login-container" style="width: 99%;">
      <div class="row">
      <div class="col-md-2">
      </div>
      <div class="col-md-10 login-form-1" >
      <form name="formularioModal" id="formularioModal" method="POST" action="">
      
      <input type="hidden" name="id_solicitud" id="id_solicitud" value="<?php echo $resultado->id_solicitud?>">
      <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $resultado->id_usuario?>">
      <br/>
      <div class="col-sm-12">
      <div class="panel panel-default">
      <div class="panel-heading"><strong>Contratar</strong></div>
      <div class="panel-body">
      Estimado(a) <?php echo $variablesSesion['nombres'] ?> si desea procesar su solicitud con el usuario: <?php echo $resultado->nombres?> para: <?php echo $resultado->descripcion_solicitud?>, haga clic en el bot&oacute;n contratar.
      <br/><br/>  
      <button type="submit" class="btn bg-navy"><i class="fa fa-save"></i> Contratar</button>
      <br/> 
      </div>
      </div>
      </div>
      </form>
      </div>
      </div>
     
      </div>
      <?php
         }
         ?>
   </body>
</html>
<input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>Solicitudes/solicitudes_procesando">
<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formulario_msj').formValidation({
       fields: {
            mensaje: {
               row: '.col-sm-12',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           }
        }         
   }).on('success.form.fv', function(e) {
   e.preventDefault();
   var $form = $(e.target);
   $.ajax({
       url: "<?php echo base_url() . 'Solicitudes/registrar_mensajes'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
      alertify.log("Mensaje Enviado...!!!");
      $('#formulario_msj')[0].reset();
  
       });
      });
   });
   
</script>



<script type="text/javascript">
   $(document).ready(function() {
   $('.enviar').on('click', function() {
       var id_solicitud = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'Solicitudes/registrar_mensajes/'; ?>" + id_solicitud,
           method: 'POST'
   
       }).success(function(response) {
            alertify.log("Mensaje Enviado...!!!"); 
            $('#formulario')[0].reset();
              // reload_table();
           });
       
       });
   });
</script>


<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formularioModal').formValidation({
       fields: {
            mensaje: {
               row: '.col-sm-12',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           }
        }         
   }).on('success.form.fv', function(e) {
   e.preventDefault();
   var $form = $(e.target);
   $.ajax({
       url: "<?php echo base_url() . 'Solicitudes/registrar_contratacion'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
       alertify.log("contratacion exitosa...!!!"); ;
       setInterval(function() {
                    window.location.href = $("#redireccion_mensaje").val();
                }, 2000);
       });
      });
   });
   
</script>



<script>
   $(function () {
   $('[data-toggle="tooltip"]').tooltip()
   })
</script>
<script type="text/javascript">
   let modalId = $('#image-gallery');
   $(document)
   .ready(function () {
     loadGallery(true, 'a.thumbnail');
   
     //This function disables buttons when needed
     function disableButtons(counter_max, counter_current) {
       $('#show-previous-image, #show-next-image')
         .show();
       if (counter_max === counter_current) {
         $('#show-next-image')
           .hide();
       } else if (counter_current === 1) {
         $('#show-previous-image')
           .hide();
       }
     }
   
     function loadGallery(setIDs, setClickAttr) {
       let current_image,
         selector,
         counter = 0;
   
       $('#show-next-image, #show-previous-image')
         .click(function () {
           if ($(this)
             .attr('id') === 'show-previous-image') {
             current_image--;
           } else {
             current_image++;
           }
   
           selector = $('[data-image-id="' + current_image + '"]');
           updateGallery(selector);
         });
   
       function updateGallery(selector) {
         let $sel = selector;
         current_image = $sel.data('image-id');
         $('#image-gallery-title')
           .text($sel.data('title'));
         $('#image-gallery-image')
           .attr('src', $sel.data('image'));
         disableButtons(counter, $sel.data('image-id'));
       }
   
       if (setIDs == true) {
         $('[data-image-id]')
           .each(function () {
             counter++;
             $(this)
               .attr('data-image-id', counter);
           });
       }
       $(setClickAttr)
         .on('click', function () {
           updateGallery($(this));
         });
     }
   });
   
   // build key actions
   $(document)
   .keydown(function (e) {
     switch (e.which) {
       case 37: // left
         if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
           $('#show-previous-image')
             .click();
         }
         break;
   
       case 39: // right
         if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
           $('#show-next-image')
             .click();
         }
         break;
   
       default:
         return; // exit this handler for other keys
     }
     e.preventDefault(); // prevent the default action (scroll / move caret)
   });
   
</script>