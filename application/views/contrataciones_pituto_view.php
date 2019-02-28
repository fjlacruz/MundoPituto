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
         
            <div class="col-md-12 login-form-1" >
               <div id="estilo1" align="center">
                  <p>
                  <h3>Hist&oacute;rico de Contrataciones</h3>
                  </p>
               </div>
               </br>
               <div class="input-group"> <span class="input-group-addon">Buscar</span>
                  <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
               </div>
               </br>
               <div id="scroll">

      <table class="table table-striped" align='justify' width='100%'>
      <thead>
         <tr >
            <th align="justify">Solicitante</th>
            <th align="justify">Descripci&oacute;n Solicitud</th>
            <th align="justify">Tipo</th>
            <th align="justify">Categor&iacute;a</th>
            <th align="justify">Ubicaci&oacute;n</th>
            <th align="justify">Fecha</th>
            <th align="justify">Comentarios</th>
            <th align="justify">Valoraci&oacute;n</th>
         </tr>
      </thead>
      <?php
         echo "
         <tbody class='buscar'>";
         foreach ($resultados as $resultado) {
             $descripcion_solicitud = $resultado->descripcion_solicitud;
             $tipo_solicitud = $resultado->tipo_solicitud;
             $region_nombre = $resultado->region_nombre;
             $provincia_nombre = $resultado->provincia_nombre;
             $comuna_nombre = $resultado->comuna_nombre;
             $fecha_registro = $resultado->fecha_registro;
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




             $solicitante = $resultado->solicitante;
             $categoria = preg_split( "/[{}]+/", $resultado->categoria );
             
         echo "  
         <td >" . $solicitante . "</td>       
         <td  align='justify'>" . $descripcion_solicitud ."</td>              
         <td >" . $tipo_solicitud . "</td>
         <td>" . $categoria[1] . "</td>
         <td >" . $region_nombre . '/'.$provincia_nombre .'/'.$comuna_nombre."</td>
         <td >" . $fecha_registro . "</td>
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
