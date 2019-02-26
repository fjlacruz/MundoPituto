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
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/mensajes.css" />
<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_usuario=($variablesSesion['id_usuario']);
   
   $data = $this->Consultas_usuarios_model->buscar_categorias_usuario($id_usuario);
   
   foreach ($data as $resultado) {
   $id_usuario=$resultado->id_usuario;
   $categoria = preg_split( "/[{}]+/", $resultado->categoria );
   $categorias=$categoria[1];
   $array_categorias=explode(",", $categorias);
   $longitud = count($array_categorias);
   for($i=0; $i<$longitud; $i++)
         {
    $array_categorias[$i];
         }
   }
   ?>
<script src="<?php echo base_url(); ?>application/scripts/ruta_usuarios_datos.js"></script>


<!--=============================================================================================-->
<!-- =============================== Script para los mensajes ===================================-->
<!--=============================================================================================-->
<?php
$correcto = $this->session->flashdata('correcto');
    if ($correcto) 
    {
    ?>
       <div class="container content" >
   <div class="row" id="mensaje">
      <div class="span12">
         <div id="estilo"> 
            <?php echo $correcto ?>
         </div>
      </div>
   </div>
</div>
    <?php
    }
    ?>


<?php
$correcto2 = $this->session->flashdata('correcto2');
    if ($correcto2) 
    {
    ?>
       <div class="container content" >
   <div class="row" id="mensaje">
      <div class="span12">
         <div id="estilo"> 
            <?php echo $correcto2 ?>
         </div>
      </div>
   </div>
</div>
    <?php
    }
    ?>    
<!--=============================================================================================-->
<!--=============================================================================================-->
<!--=============================================================================================-->


<html>
   <body style="background-color:#F4F7F9;">
      <div id="datos">
         <div class="container login-container" style="width: 90%;">
            <div class="row">
               <div class="col-md-2">
                  <div class="list-group">
                     <a href="#" onclick="myFunction(1)" class="list-group-item active">Datos</a>
                     <a href="#" onclick="myFunction(2)" class="list-group-item">Cambiar Clave</a>
                  </div>
               </div>
               <div class="col-md-10 login-form-1" >
                  <div id="estilo2" align="center">
                     <h3>Datos</h3>
                  </div>
                  <form action='do_upload' name="form" id="form" method="POST" enctype="multipart/form-data">
                     <div class="col-sm-12"  id='resultado'></div>
                     <div class="col-sm-12" id="alert"></div>
                     <div class="col-sm-2" align="left">&nbsp;</div>
                     <?php
                        $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);
                        ?>
                     <?php
                        if ($verficacion == 1) { 
                          foreach($foto_usuario as $resultado){
                          $foto=  $resultado->foto;
                            } 
                          ?>
                     <div class="col-sm-6" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                        <img class="img-circle" width="150" height="150" src='https://localhost/MundoPituto/uploads/<?php echo $foto?>'/>
                     </div>
                     <?php } ?>
                     <?php if ($verficacion == 0) { ?>
                     <div class="col-sm-6" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img class="img-circle"  width="150" height="150" src='http://localhost/MundoPituto/silueta.jpg' /></div>
                     <?php } ?>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-4"></div>
                     <div class="col-sm-2" align="right">
                        <span class='fa fa-camera' ></span> <strong>Subir Foto</strong>
                        <input type="file"  name="foto" id="foto" onchange="return fileValidation()">
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-4"></div>
                     <div class="col-sm-2" align="right">
                        <div class="col-sm-12" align="center"><button type="submit" class="btn bg-navy btn-block">Guardar</button></div>
                     </div>
                     <div class="col-sm-12">
                     </div>
                  </form>
                  <form action='' name="formulario" id="formulario" method="POST">
                     <input type="hidden" class="form-control" readonly id="id_usuario" name="id_usuario" value="<?php echo $id_usuario?>" >
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rut:</label>
                        <div class="col-sm-8">
                           <input type="text"  class="form-control" readonly id="cedula" name="cedula" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombres:</label>
                        <div class="col-sm-8">
                           <input type="text"  class="form-control"  readonly id="nombres" name="nombres" >
                        </div>
                     </div>
                     <!-- <div class="col-sm-12">&nbsp;</div>
                        <div class="form-group">
                         <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apellidos:</label>
                           <div class="col-sm-8">
                             <input type="text" class="form-control" readonly id="apellidos" name="apellidos" >
                           </div>
                        </div> -->
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:</label>
                        <div class="col-sm-8">
                           <input type="text"   class="form-control" id="correo" name="correo" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fono:</label>
                        <div class="col-sm-8">
                           <input type="text"   class="form-control" id="telefono" name="telefono" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usuario:</label>
                        <div class="col-sm-8">
                           <input type="text"  class="form-control text-uppercase" readonly id="usuario" name="usuario" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Conocimientos:</label>
                        <div class="col-sm-8">
                           <textarea class="form-control text-uppercase" rows="3"  id="conocimientos_habilidades" name="conocimientos_habilidades" placeholder="Conocimientos/Habilidades"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Experiencia:</label>
                        <div class="col-sm-8">
                           <textarea class="form-control text-uppercase" rows="3"  id="experiencia" name="experiencia" placeholder="Experiencia"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categor&iacute;as:</label>
                        <div class="col-sm-5">
                           <table class="table table-striped" align='left' width="50%">
                              <?php
                                 echo "
                                 <tbody class='buscar'>";
                                 foreach ($data as $resultado) {
                                     $id_usuario=$resultado->id_usuario;
                                     $categoria = preg_split( "/[{}]+/", $resultado->categoria );
                                     $categorias=$categoria[1];
                                     $array_categorias=explode(",", $categorias);
                                     $longitud = count($array_categorias);
                                     for($i=0; $i<$longitud; $i++)
                                         {
                                 
                                          $array=$array_categorias[$i];
                                          $rest=$array=$array_categorias[$i];
                                 
                                 echo "
                                 <tr align='right'>           
                                 <td align='right'>" . $rest ."</td>                       
                                 <td align='justify' > 
                                 <a href='" . base_url() . "Administracion/galeria?categoria=" . "$rest"  . "' class=''><span tooltip='Agregar Galer&iacute;a'><span class='fa  fa-camera'></span></span></a>&nbsp;&nbsp;&nbsp;

                                 <a href='" . base_url() . "Administracion/verGaleria?categoria=" . "$rest" . "&id_usuario=" . $resultado->id_usuario . "' class=''><span tooltip='Ver Galer&iacute;a'><span class='fa  fa-search'></span></span></a>
                                 </td>
                                 </tr>";
                                  }
                                 }
                                 echo "
                                 <tbody>
                                 ";
                                 ?>
                           </table>
                        </div>
                     </div>
                     <input type="hidden" id="url_respuesta">
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" align="right">&nbsp;</label>
                        <div class="col-sm-8">
                           <button  type="button" class="btn bg-navy" id="modificar" >
                           <span class='glyphicon glyphicon-pencil'></span> Modificar
                           </button>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="col-sm-12">&nbsp;</div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="clave" style="display:none;" >
         <div class="container login-container" style="width: 90%;">
            <div class="row">
               <div class="col-md-2">
                  <div class="list-group">
                     <a href="#" onclick="myFunction(1)" class="list-group-item">Datos</a>
                     <a href="#" onclick="myFunction(2)" class="list-group-item active">Cambiar Clave</a>
                  </div>
               </div>
               <div class="col-md-6 login-form-1" >
                  <div id="estilo2" align="center">
                     <h3>Cambiar Clave</h3>
                  </div>
                  <form action='' name="formulario2" id="formulario2" method="post" >
                     <div class="form-group">
                        <label class="control-label col-sm-4">Clave:</label>
                        <div class="col-sm-8">
                           <input class="form-control" id="confirmar_clave" name="confirmar_clave" type="password" placeholder="Clave" >
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-4" for="email">Confirmar Clave:</label>
                        <div class="col-sm-8">
                           <input class="form-control" id="clave" name="clave" type="password" placeholder="Confirmar Clave" > 
                        </div>
                     </div>
                     <input type="hidden" id="url_respuesta">
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-4">&nbsp;</label>
                        <div class="col-sm-8">
                           <button  type="button" class="btn bg-navy" id="actualizar" >
                           <span class='glyphicon glyphicon-pencil'></span> Modificar
                           </button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div id="foto" style="display:none;" >
         foto
      </div>
   </body>
</html>
<script  src="<?php echo base_url(); ?>application/scripts/usuarios.js"></script>
<script src="<?php echo base_url(); ?>application/recursos/js/mensajes.js"></script>
<script type="text/javascript">
   $(document).ready(function() {
       setTimeout(function() {
           $(".formato_incorrecto").fadeOut(1500);
       },3000);
   });
</script>
<script>
  $(document).ready(function () {
       $('#form').formValidation({
           framework: 'bootstrap',
           excluded: ':disabled',
           fields: {
               foto: {
                   row: '.col-sm-2',
                   validators: {
                       notEmpty: {
                           message: 'Seleccione una Imagen'
                       }
                   }
               }
           }
       });
   });
     function fileValidation(){
       var fileInput = document.getElementById('foto');
       var filePath = fileInput.value;
       var allowedExtensions = /(.jpg|.jpeg|.png|.gif|.gif)$/i;
       if(!allowedExtensions.exec(filePath)){
           
           alertify.error("Formato Incorrecto  (Seleccione un archivo jpg,jpeg,png,gif)...!!");
           fileInput.value = '';
           return false;
       }else{
           //Image preview
           if (fileInput.files && fileInput.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                   document.getElementById('imagePreview').innerHTML = '<img width="100" height="100" src="'+e.target.result+'"/>';
               };
               reader.readAsDataURL(fileInput.files[0]);
           }
       }
   }
</script>