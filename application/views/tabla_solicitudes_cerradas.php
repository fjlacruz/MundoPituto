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
<html>
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
      <div class="container login-container" style="width: 99%;">
         <div class="row">
            <div class="col-md-2">
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
                  <a href="<?php echo base_url() . 'Solicitudes/solicitudes_cerradas'; ?>" class="list-group-item active">Solicitudes Cerradas
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
               </div>
            </div>
            <div class="col-md-10 login-form-1" >
               <div id="estilo1" align="center">
                  <p>
                  <h3>Solicitudes Cerradas</h3>
                  </p>
               </div>
               </br>
               <div class="input-group"> <span class="input-group-addon">Buscar</span>
                  <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
               </div>
               </br>
               <div id="scroll">
                  <div>
                     <table class="table table-striped" align='justify' width='100%'>
                        <thead>
                           <tr >
                              <th align="justify">Categor&iacute;a</th>
                              <th align="justify">Tipo</th>
                              <th align="justify">Descripci&oacute;n</th>
                              <th align="justify">Pituto</th>
                              <th align="justify">Ubicaci&oacute;n</th>
                              <th align="justify">Fecha</th>
                              <th align="justify">Valoraci&oacute;n</th>
                              <th align="justify">Puntuaci&oacute;n</th>
                           </tr>
                        </thead>
                        <?php
                           echo "
                           <tbody class='buscar'>";
                           foreach ($resultados as $resultado) {
                               $id_solicitud = $resultado->id_solicitud;
                               $tipo_solicitud = $resultado->tipo_solicitud;
                               $descripcion_solicitud = $resultado->descripcion_solicitud;
                               $fecha_registro = $resultado->fecha_registro;
                               $categoria = preg_split( "/[{}]+/", $resultado->categoria );
                               $nombre_pituto = $resultado->nombre_pituto;
                               $region_nombre = $resultado->region_nombre;
                               $provincia_nombre = $resultado->provincia_nombre;
                               $comuna_nombre = $resultado->comuna_nombre;
                               $valoracion = $resultado->valoracion;
                               $puntuacion=$resultado->puntuacion;
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

                               // <td align='justify' > 
                           // <a href='#' data-id='$resultado->id_solicitud' class='deleteButton'><span tooltip='Eliminar del Historial'><span class='fa  fa-trash'></span></span></a>
                           // </td>

                               
                           echo "         
                           <td style='display:none'>" . $id_solicitud ."</td>  
                           <td>" . $categoria[1] . "</td>            
                           <td>" . $tipo_solicitud . "</td>
                           <td>" . $descripcion_solicitud . "</td>
                           <td>" . $nombre_pituto . "</td>
                           <td >" . $region_nombre . '/'.$provincia_nombre .'/'.$comuna_nombre."</td>
                           <td>" . $fecha_registro . "</td>
                           <td>" . $valoracion . "</td>
                           <td>" . $puntuacion . "</td>
                                         
                           
                           </tr>";
                           }
                           echo "
                           <tbody>
                           ";
                           ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
<input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>Solicitudes/solicitudes_cerradas">
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
           url: "<?php echo base_url() . 'Solicitudes/eliminar_solicitud_pendiente/'; ?>" + id,
           method: 'POST'
   
       }).success(function(response) {
            alertify.log("Solicitud Eliminada...!!!"); 
            $('#formulario')[0].reset();
               reload_table();
           });
       setInterval(function() {
                    window.location.href = $("#redireccion_mensaje").val();
                }, 2000);
       });
   });
</script>