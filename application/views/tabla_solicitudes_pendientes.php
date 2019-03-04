<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_usuario=($variablesSesion['id_usuario']);
   $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario); 
   if ($variablesSesion == "") {
       redirect('principal/session');
        
   }
   ?>




<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/froala_editor.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/froala_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/code_view.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/draggable.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/colors.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/emoticons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/image_manager.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/image.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/line_breaker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/table.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/char_counter.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/video.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/fullscreen.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/file.min.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/quick_insert.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/help.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/third_party/spell_checker.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/css/plugins/special_characters.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  <style>
      div#editor {
          width: 81%;
          margin: auto;
          text-align: left;
      }

      .ss {
        background-color: red;
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
      <div id="pendientes">
         <div class="container login-container" style="width: 99%;">
            <div class="row">
              <?php if (($variablesSesion['id_perfil'] == 1)  || ($variablesSesion['id_perfil'] == 2)) { ?>
              <!-- =============== verificamos el perfil para mostrar el menu de navegacion==============  -->
               <div class="col-md-2">
                  <div class="list-group">
                     <a href="#" class="list-group-item active">Solicitudes Publicadas
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
                      <a href="<?php echo base_url() . 'Solicitudes/solicitudes_cerradas'; ?>"  class="list-group-item">Solicitudes Cerradas 
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
                     <a href="#" onclick="myFunction(3)" class="list-group-item">Generar Solicitud</a>
                  </div>
               </div>

               <?php } ?>

               <?php if ($variablesSesion['id_perfil'] == 3) { ?>
                <div class="col-md-1">&nbsp;</div>
                <?php } ?>
              <!-- =========================================================================================  -->

               <div class="col-md-10 login-form-1">
                  <div id="estilo1" align="center">
                     <p>
                     <h3>Solicitudes Publicadas</h3>
                     </p>

                  </div>
               </br>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-search"></i> Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
      </div></br>
       <div id="scroll">
        <div id="tabla" style="width: 102%" ></div>
      </div>
            </div>
         </div>
      </div>
      <div id="editar" style="display:none;" >
         <div class="container login-container" style="width: 99%;>
            <div class="row">
               <div class="col-md-2">
                  <div class="list-group">
                     <a href="#" onclick="myFunction(1)" class="list-group-item">Solicitudes Publicadas
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
                     <a href="#" onclick="myFunction(3)" class="list-group-item">Generar Solicitud</a>
                     <a href="#" onclick="myFunction(3)" class="list-group-item active">Editando Solicitud....</a>
                  </div>
               </div>
               <div class="col-md-9 login-form-1" >
                  <form id="formEdit" method="post" class="form-horizontal">
                     <div id="estilo2" align="center">
                        <h3>Editar Solicitud</h3>
                     </div>
                     </br> 
                    <!--  <div class="form-group">
                         <label class="control-label col-sm-2">Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="id_categoria_edit" id="id_categoria_edit"  class="form-control" ><option value="">Selecione...</option>
                             <?php
                             foreach ($categorias as $i => $categoria) {
                                 echo '<option value="' . $categoria->id_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                             }
                             ?>                     
                         </select>
                           </div>
                        </div -->

                     <!--    <div class="form-group">
                         <label class="control-label col-sm-2">Sub-Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="id_sub_categoria_edit" id="id_sub_categoria_edit"  class="form-control" >
                              <option value="">Selecione...</option>                  
                         </select>
                           </div>
                        </div> -->
                          <div class="form-group">
                         <label class="control-label col-sm-2">Tipo Solicitud:</label>
                           <div class="col-sm-8">
                            <select name="tipo_solicitud_edit" id="tipo_solicitud_edit"  class="form-control" >
                              <option value="">Selecione...</option>
                              <option value="COTIZACION">COTIZACI&Oacute;N</option>
                              <option value="URGENCIA">URGENCIA</option>                   
                         </select>
                           </div>
                        </div>

                        <div class="form-group">
                        <label class="control-label col-sm-2" >Descripci&oacute;n:</label>
                        <div class="col-sm-8">
                           <input type="text" name="descripcion_solicitud_edit" id="descripcion_solicitud_edit" class="form-control text-uppercase" placeholder="Breve descripci&oacute;n de su solicitud">
                        </div>
                     </div>
                     
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="email">&nbsp;</label>
                        <div class="col-sm-8">
                           <button type="submit" class="btn bg-navy" onclick="myFunction(1)"><i class="fa fa-save"></i> Guardar</button>
                           <button type="button" class="btn bg-orange " onclick="myFunction(1)"><i class="fa fa-close">Cancelar....</i></button>
                        </div>
                     </div>
                     </br>
                     <input type="hidden" name="id" name="id">
                  </form>
               </div>
            </div>
         </div>

      </div>
      <div id="generar" style="display:none;">
         <div class="container login-container" style="width: 99%;">
            <div class="row">
               <div class="col-md-2">
                  <div class="list-group">
                     <a href="#" onclick="myFunction(1)" class="list-group-item">Solicitudes Publicadas
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
                     <a href="#" class="list-group-item active">Generar Solicitud</a>
                  </div>
               </div>
               <div class="col-md-10 login-form-1" >
                  <form id="formulario2" method="post" class="form-horizontal" action="">
                     <div id="estilo2" align="center">
                        <h3>Generar</h3>
                     </div>
                     </br> 
                     <div class="form-group">
                         <label class="control-label col-sm-2">Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="categoria" id="categoria"  class="form-control" ><option value="">Selecione...</option>
                             <?php
                             foreach ($categorias as $i => $categoria) {
                                 echo '<option value="' . $categoria->descripcion_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                             }
                             ?>                     
                         </select>
                           </div>
                        </div>
                           <div class="form-group">
                         <label class="control-label col-sm-2">Tipo Solicitud:</label>
                           <div class="col-sm-8">
                            <select name="tipo_solicitud" id="tipo_solicitud"  class="form-control" onchange="cargarTipoSolicitud()">
                              <option value="">Selecione...</option>
                              <option value="COTIZACION">COTIZACI&Oacute;N</option>
                              <option value="URGENCIA">URGENCIA</option>                   
                         </select>
                           </div>
                        </div>
                     <div id="urgencia" style="display:none">
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="correo_modal">Descripci&oacute;n:</label>
                        <div class="col-sm-8">
                               <textarea class="form-control text-uppercase" rows="5" name="descripcion_solicitud" id="descripcion_solicitud" placeholder="Breve descripci&oacute;n de su solicitud"></textarea>
                        </div>
                        
                     </div>
                     </div>

                     <div id="cotizacion" style="display:none">
                      <div class="form-group">
                        <label class="control-label col-sm-2" >Descripci&oacute;n:</label>
                        <div class="col-sm-8">
                         
                          <textarea id='edit' name="descripcion_cotizacion" rows="15"></textarea>
                     </div>
                     </div>
                   </div>

                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                         <label class="control-label col-sm-2">Regi&oacute;n:</label>
                           <div class="col-sm-8">
                            <select name="region_id" id="region_id"  class="form-control" >
                           <option value="">Seleccione.....</option>
                           <option value="0"><strong>Todas las Regiones</strong></option>
                           <?php
                              foreach ($regiones as $i => $region) {
                                  echo '<option value="' . $region->region_id . '">' . $region->region_nombre . '</option>';
                              }
                              ?>                     
                        </select>
                           </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-sm-2">Provincia:</label>
                           <div class="col-sm-8">
                            <select name="provincia_id" id="provincia_id"  class="form-control" >
                          <option value="">Provincia</option>
                            </select>
                           </div>
                        </div>
                        <div class="form-group">
                         <label class="control-label col-sm-2">Comuna:</label>
                           <div class="col-sm-8">
                            <select name="comuna_id" id="comuna_id"  class="form-control" > 
                            <option value="">Comuna</option>
                            <option value="0"><strong>Todas las Comunas</strong></option>
                        </select>
                           </div>
                        </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="email">&nbsp;</label>
                        <div class="col-sm-8">
                           <button type="submit" class="btn bg-navy" onclick="myFunction(3)"><i class="fa fa-plane"></i> Enviar</button>
                           <button type="button" class="btn bg-orange " onclick="myFunction(1)"><i class="fa fa-close"> Cancelar</i></button>
                        </div>
                     </div>

                     </br>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>Solicitudes/solicitudes">

<script>
   //=================== Script para mostrar las sub-categorias ==================//
$(document).on("change", '#id_categoria', function ()
       {
$("#id_sub_categoria").load("<?php echo base_url() . 'Administracion/obtener_sub_categoria?id_categoria='; ?>" + $(this).val());
       });

</script>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
$(document).on("change", '#id_categoria_edit', function ()
       {
$("#id_sub_categoria").load("<?php echo base_url() . 'Administracion/obtener_sub_categoria?id_categoria='; ?>" + $(this).val());
       });

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
    //====================== Validacion del formulario de registro de usuarios ============================
$(document).ready(function() {
    $('#formulario2').formValidation({
        fields: {

            categoria: {
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
            region_id: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            provincia_id: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            comuna_id: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
             descripcion_solicituddd: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            descripcion_cotizaciondd: {
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
        url: "<?php echo base_url() . 'index.php/Solicitudes/registrar_solicitud'; ?>",
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
    function cargarTipoSolicitud() {
        var tipo_solicitud = document.getElementById("tipo_solicitud").value;
        if (tipo_solicitud == "URGENCIA") {
            document.getElementById('urgencia').style.display = 'block';
            document.getElementById('cotizacion').style.display = 'none';
            
        } else if (tipo_solicitud == "COTIZACION") {
            document.getElementById('urgencia').style.display = 'none';
            document.getElementById('cotizacion').style.display = 'block';
        
        } else {
            document.getElementById('urgencia').style.display = 'none';
            document.getElementById('cotizacion').style.display = 'none';
        }

    }
</script>




  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/froala_editor.min.js" ></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/align.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/char_counter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/code_beautifier.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/code_view.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/colors.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/draggable.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/emoticons.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/entities.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/file.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/font_size.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/font_family.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/fullscreen.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/image.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/image_manager.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/line_breaker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/inline_style.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/link.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/lists.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/paragraph_format.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/paragraph_style.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/quick_insert.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/quote.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/table.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/save.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/url.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/video.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/help.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/print.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/third_party/spell_checker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/special_characters.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.9.3/js/plugins/word_paste.min.js"></script>

<script>
    $(function(){
      $('#edit').froalaEditor()
    });
  </script>