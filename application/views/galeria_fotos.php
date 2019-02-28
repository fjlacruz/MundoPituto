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
  width: 250px;
  height: 250px; 
}

.img-container img{
  width:100%;
  height:100%
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/tooltip.css" />
<script src="<?php echo base_url(); ?>application/scripts/ruta_solicitudes.js"></script>


<?php
$variablesSesion = $this->session->userdata('usuario');
$id_usuario      = ($variablesSesion['id_usuario']);
  if ($id_usuario == "") {
      echo "<script>
              alert('Sesion cerrada por inactividad');
              location.href ='https://127.0.0.1/MundoPituto/';
            </script>";
    }
?>

<html>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
         <div class="container login-container" style="width: 90%;">
            <div class="row">
               <div class="col-md-12 login-form-1" >
                  <div id="estilo1" align="center">
                     <p>
                     <h4 style="font-size:1.5vw;">Galer&iacute;a: <?php echo $categ;?></h4>
                     </p>
                  </div>
                  </br>
                  <form name="formulario" id="formulario" method="POST" action="eliminar_foto_galeria">
                     <?php
                        foreach($resultados as $resultado){
                       ?>
                    <div class="img-container">  
                     <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                      <a type="button" href="https://localhost/MundoPituto/Administracion/eliminar_foto_galeria?id_foto_galeria=<?php echo $resultado->id_foto_galeria?>"><span tooltip='Eliminar Imagen de la Galer&iacute;a'><span class='fa  fa-trash'></span></span></a>
                        <a class="thumbnail fondo aplanado" href="#" data-image-id="" data-toggle="modal" data-title=""
                           data-image="<?php echo base_url(); ?>archivos/<?php echo $resultado->foto?>"
                           data-target="#image-gallery">

                        <img class="img-thumbnail fondo aplanado" 
                           src="<?php echo base_url(); ?>archivos/<?php echo $resultado->foto?>"
                           alt="Galeria">

                        </a>

                        <input type="hidden" name="id_foto_galeria" id="id_foto_galeria" value="<?php echo $resultado->id_foto_galeria?>">
                        
                     </div>
                   </div>

                    
                     <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h4 class="modal-title" id="image-gallery-title"></h4>
                                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span>
                                 </button>
                                 <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                 </button>
                                 <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
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
                        
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        
                        <div class="col-sm-12">
                           <a  href="<?php echo base_url() . 'Administracion/usuarioModificar'; ?>"><button type="button" class="btn bg-orange"><i class="fa fa-arrow-left"> Regresar</i></button></a>
                        </div>
                        <div class="col-sm-12">&nbsp;</div>
                     </div>
                    
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>Solicitudes/solicitudes_cerradas">



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