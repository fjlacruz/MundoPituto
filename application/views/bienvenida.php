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
         <div class="container login-container" style="width: 99%;>
            <div class="row">
               <div class="col-md-3">
                  <div class="list-group">
                     <a href="#" class="list-group-item active">Solicitudes Pendientes</a>
                     <a href="#" onclick="myFunction(2)" class="list-group-item">Solicitudes Cerradas</a>
                     <a href="#" onclick="myFunction(3)" class="list-group-item">Generar Solicitud</a>
                  </div>
               </div>
               <div class="col-md-9 login-form-1">
                  <div id="estilo1" align="center">
                     <p>
                     <h3>Solicitudes Pendientes</h3>
                     </p>

                  </div>
               </br>
                  <div class="input-group"> <span class="input-group-addon">Buscar</span>
        <input id="filtrar" type="text" class="form-control" placeholder="Ingresa la canción de este Disco que deseas Buscar...">
      </div>
                  <table class="table table-hover">
        <thead>
          <tr>
            <th>Categoria</th>
            <th>Sub-Categoria</th>
            <th>Descripcion</th>
            <th>Tipo</th>            
            <th>Fecha</th>
          </tr>
        </thead>
        <tbody class="buscar">
          <tr><td>1UuaX3kHs5iKD1mFFsArHq</td><td>1</td><td>Till The Sky Falls Down - Vocal Mix</td><td><a target="_blank" alt="Till The Sky Falls Down - Vocal Mix" title="Till The Sky Falls Down - Vocal Mix" href=https://api.spotify.com/v1/tracks/1UuaX3kHs5iKD1mFFsArHq >Ver Detalles</a></td><td><a target="_blank" alt="Till The Sky Falls Down - Vocal Mix" title="Till The Sky Falls Down - Vocal Mix" href=https://open.spotify.com/track/1UuaX3kHs5iKD1mFFsArHq >Reproducir</a></td></tr><tr><td>4f0dhdt7rjOgUEv7HmF4rM</td><td>2</td><td>Man On The Run - Original Vocal Mix</td><td><a target="_blank" alt="Man On The Run - Original Vocal Mix" title="Man On The Run - Original Vocal Mix" href=https://api.spotify.com/v1/tracks/4f0dhdt7rjOgUEv7HmF4rM >Ver Detalles</a></td><td><a target="_blank" alt="Man On The Run - Original Vocal Mix" title="Man On The Run - Original Vocal Mix" href=https://open.spotify.com/track/4f0dhdt7rjOgUEv7HmF4rM >Reproducir</a></td></tr><tr><td>4U2zGQMK5L3mRuoGZA4WDy</td><td>3</td><td>Wired</td><td><a target="_blank" alt="Wired" title="Wired" href=https://api.spotify.com/v1/tracks/4U2zGQMK5L3mRuoGZA4WDy >Ver Detalles</a></td><td><a target="_blank" alt="Wired" title="Wired" href=https://open.spotify.com/track/4U2zGQMK5L3mRuoGZA4WDy >Reproducir</a></td></tr><tr><td>44DRt5JbAtRrt5vxH1lazp</td><td>4</td><td>Waiting - Original Mix</td><td><a target="_blank" alt="Waiting - Original Mix" title="Waiting - Original Mix" href=https://api.spotify.com/v1/tracks/44DRt5JbAtRrt5vxH1lazp >Ver Detalles</a></td><td><a target="_blank" alt="Waiting - Original Mix" title="Waiting - Original Mix" href=https://open.spotify.com/track/44DRt5JbAtRrt5vxH1lazp >Reproducir</a></td></tr><tr><td>2bUsni4knblLirfRD7DUS6</td><td>5</td><td>Never Cry Again - Original Mix</td><td><a target="_blank" alt="Never Cry Again - Original Mix" title="Never Cry Again - Original Mix" href=https://api.spotify.com/v1/tracks/2bUsni4knblLirfRD7DUS6 >Ver Detalles</a></td><td><a target="_blank" alt="Never Cry Again - Original Mix" title="Never Cry Again - Original Mix" href=https://open.spotify.com/track/2bUsni4knblLirfRD7DUS6 >Reproducir</a></td></tr><tr><td>36QfRyd9lQyPKL9eFmmSXa</td><td>6</td><td>To Be The One - Original Mix</td><td><a target="_blank" alt="To Be The One - Original Mix" title="To Be The One - Original Mix" href=https://api.spotify.com/v1/tracks/36QfRyd9lQyPKL9eFmmSXa >Ver Detalles</a></td><td><a target="_blank" alt="To Be The One - Original Mix" title="To Be The One - Original Mix" href=https://open.spotify.com/track/36QfRyd9lQyPKL9eFmmSXa >Reproducir</a></td></tr><tr><td>0KpehNMSwZQZ13KlwaFLyP</td><td>7</td><td>End Of Silence</td><td><a target="_blank" alt="End Of Silence" title="End Of Silence" href=https://api.spotify.com/v1/tracks/0KpehNMSwZQZ13KlwaFLyP >Ver Detalles</a></td><td><a target="_blank" alt="End Of Silence" title="End Of Silence" href=https://open.spotify.com/track/0KpehNMSwZQZ13KlwaFLyP >Reproducir</a></td></tr><tr><td>1zvFKlkIriv5yCp1HYGZTy</td><td>8</td><td>The Night Time</td><td><a target="_blank" alt="The Night Time" title="The Night Time" href=https://api.spotify.com/v1/tracks/1zvFKlkIriv5yCp1HYGZTy >Ver Detalles</a></td><td><a target="_blank" alt="The Night Time" title="The Night Time" href=https://open.spotify.com/track/1zvFKlkIriv5yCp1HYGZTy >Reproducir</a></td></tr><tr><td>6jXUnH9po91agPvwJPHINq</td><td>9</td><td>Renegade - Original Mix</td><td><a target="_blank" alt="Renegade - Original Mix" title="Renegade - Original Mix" href=https://api.spotify.com/v1/tracks/6jXUnH9po91agPvwJPHINq >Ver Detalles</a></td><td><a target="_blank" alt="Renegade - Original Mix" title="Renegade - Original Mix" href=https://open.spotify.com/track/6jXUnH9po91agPvwJPHINq >Reproducir</a></td></tr><tr><td>4IzhqrjLOwNuh3W7JryWqx</td><td>10</td><td>Janeiro</td><td><a target="_blank" alt="Janeiro" title="Janeiro" href=https://api.spotify.com/v1/tracks/4IzhqrjLOwNuh3W7JryWqx >Ver Detalles</a></td><td><a target="_blank" alt="Janeiro" title="Janeiro" href=https://open.spotify.com/track/4IzhqrjLOwNuh3W7JryWqx >Reproducir</a></td></tr><tr><td>6ShnXpRHu79ElednDKNfnJ</td><td>11</td><td>Feel U Here - Original Mix</td><td><a target="_blank" alt="Feel U Here - Original Mix" title="Feel U Here - Original Mix" href=https://api.spotify.com/v1/tracks/6ShnXpRHu79ElednDKNfnJ >Ver Detalles</a></td><td><a target="_blank" alt="Feel U Here - Original Mix" title="Feel U Here - Original Mix" href=https://open.spotify.com/track/6ShnXpRHu79ElednDKNfnJ >Reproducir</a></td></tr><tr><td>1UMKL51JlWiuKoqXoRwlpp</td><td>12</td><td>The New Daylight</td><td><a target="_blank" alt="The New Daylight" title="The New Daylight" href=https://api.spotify.com/v1/tracks/1UMKL51JlWiuKoqXoRwlpp >Ver Detalles</a></td><td><a target="_blank" alt="The New Daylight" title="The New Daylight" href=https://open.spotify.com/track/1UMKL51JlWiuKoqXoRwlpp >Reproducir</a></td></tr><tr><td>54G96vyYvYpq8JiU9sAxtD</td><td>13</td><td>Surround Me - Bonus Track</td><td><a target="_blank" alt="Surround Me - Bonus Track" title="Surround Me - Bonus Track" href=https://api.spotify.com/v1/tracks/54G96vyYvYpq8JiU9sAxtD >Ver Detalles</a></td><td><a target="_blank" alt="Surround Me - Bonus Track" title="Surround Me - Bonus Track" href=https://open.spotify.com/track/54G96vyYvYpq8JiU9sAxtD >Reproducir</a></td></tr>
        </tbody>
      </table>
               </div>
            </div>
         </div>
      </div>
      <div id="cerradas" style="display:none;" >
         <div class="container login-container" style="width: 99%;>
            <div class="row">
               <div class="col-md-3">
                  <div class="list-group">
                     <a href="#" onclick="myFunction(1)" class="list-group-item">Solicitudes Pendientes</a>
                     <a href="#" class="list-group-item active">Solicitudes Cerradas</a>
                     <a href="#" onclick="myFunction(3)" class="list-group-item">Generar Solicitud</a>
                  </div>
               </div>
               <div class="col-md-9 login-form-1" >
                  
               </div>
            </div>
         </div>

      </div>
      <div id="generar" style="display:none;">
         <div class="container login-container" style="width: 99%;>
            <div class="row">
               <div class="col-md-3">
                  <div class="list-group">
                     <a href="#" onclick="myFunction(1)" class="list-group-item">Solicitudes Pendientes</a>
                     <a href="#" onclick="myFunction(2)" class="list-group-item">Solicitudes Cerradas</a>
                     <a href="#"  class="list-group-item active">Generar Solicitud</a>
                  </div>
               </div>
               <div class="col-md-9 login-form-1" >
                  <form id="formulario2" method="post" class="form-horizontal">
                     <div id="estilo2" align="center">
                        <h3>Generar</h3>
                     </div>
                     </br> 
                     <div class="form-group">
                         <label class="control-label col-sm-2">Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="id_categoria" id="id_categoria"  class="form-control" ><option value="">Selecione...</option>
                             <?php
                             foreach ($categorias as $i => $categoria) {
                                 echo '<option value="' . $categoria->id_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                             }
                             ?>                     
                         </select>
                           </div>
                        </div>

                        <div class="form-group">
                         <label class="control-label col-sm-2">Sub-Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="id_sub_categoria" id="id_sub_categoria"  class="form-control" >
                              <option value="">Selecione...</option>                  
                         </select>
                           </div>
                        </div>
                           <div class="form-group">
                         <label class="control-label col-sm-2">Tipo Solicitud:</label>
                           <div class="col-sm-8">
                            <select name="tipo_solicitud" id="tipo_solicitud"  class="form-control" >
                              <option value="">Selecione...</option>
                              <option value="COTIZACION">COTIZACI&Oacute;N</option>
                              <option value="URGENCIA">URGENCIA</option>                   
                         </select>
                           </div>
                        </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="correo_modal">Descripci&oacute;n:</label>
                        <div class="col-sm-8">
                           <input type="text" name="descripcion_solicitud" id="descripcion_solicitud" class="form-control text-uppercase" placeholder="Breve descripci&oacute;n de su solicitud">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="email">&nbsp;</label>
                        <div class="col-sm-8">
                           <button type="submit" class="btn bg-navy" onclick="myFunction(3)"><i class="fa fa-save"></i> Guardar</button>
                           <button type="button" class="btn bg-orange " onclick="myFunction(1)"><i class="fa fa-close">Cancelar</i></button>
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



<script>
   //=================== Script para mostrar las sub-categorias ==================//
$(document).on("change", '#id_categoria', function ()
       {
$("#id_sub_categoria").load("<?php echo base_url() . 'index.php/Administracion/obtener_sub_categoria?id_categoria='; ?>" + $(this).val());
       });

</script>





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
        url: "<?php echo base_url() . 'index.php/Solicitudes/registrar_solicitud'; ?>",
        method: 'POST',
        data: $form.serialize()
    }).success(function(response) {

        alertify.log("Se ha Registrado una Solicitud...!!"); 

        $('#formulario2').formValidation('resetForm');
        $('#formulario2')[0].reset();
        myFunction(1);
    });
});
});

</script>