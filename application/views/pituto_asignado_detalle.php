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
<script type="text/javascript">
   $(function(){
        $("#BotonParaEsconder").click(function(){
            $("#DivAEsconder").hide();
        });
    });
</script>


<html>
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
         <div class="container login-container" style="width: 99%;>
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
                  <a href="<?php echo base_url() . 'Solicitudes/solicitudes_procesando'; ?>"  class="list-group-item active">Solicitudes procesando 
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
               </div>
            </div>
            <div class="col-md-10 login-form-1" >
               <div id="estilo1" align="center">
                  <p>
                  <h3>Solicitudes Procesando</h3>
                  </p>
               </div>
               </br>
               <div class="input-group"> <span class="input-group-addon">Buscar</span>
                  <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
               </div>
               </br>
               <div id="scroll">
                  <div id="tabla_datos">
                  


                     <table class="table table-striped" align='justify'>
                        <thead>
                           <tr >
                              <th align="justify">Tipo</th>
                              <th align="justify">Categoria</th>
                              <th align="justify">Descripci&oacute;n</th>
                              <th align="justify">Fecha</th>
                              <th align="justify">Acciones</th>
                           </tr>
                        </thead>
                        <?php
                           echo "
                           <tbody class='buscar'>";
                           foreach ($resultados as $resultado) {
                               $id_solicitud = $resultado->id_solicitud;   
                               $tipo_solicitud = $resultado->tipo_solicitud;
                               $categoria = preg_split( "/[{}]+/", $resultado->categoria );
                               $descripcion_solicitud = $resultado->descripcion_solicitud;
                               $fecha_registro = $resultado->fecha_registro;
                               
                               
                           echo "
                           <tr align='right'> 
                           <td align='right' style='display:none'>" . $id_solicitud ."</td>           
                           <td align='right'>" . $tipo_solicitud ."</td>   
                           <td align='right'>" . $categoria[1] ."</td>
                           <td align='right'>" . $descripcion_solicitud ."</td>
                           <td align='right'>" . $fecha_registro ."</td>            
                      
                           <td align='justify' > 
                           <a href='" . base_url() . "Solicitudes/valoracion?id_solicitud=" . "$resultado->id_solicitud" . "' class=''><span tooltip='Finalizar Solicitud'><span class='fa  fa-check'></span></span></a>

                            <a href='" . base_url() . "Solicitudes/verDetallesPitutoAsignado?id_solicitud=" . "$resultado->id_solicitud" . "' class=''><span tooltip='Ver Pituto'><span class='fa  fa-user' onclick='myFunction(2)'></span></span></a>
                           </td>
                           </tr>";
                           }
                           echo "
                           <tbody>
                           ";
                           ?>
                     </table>

                      <div id="DivAEsconder">
                       <br/><br/>
                        <div class="col-sm-12">
                          <div class="panel panel-default">
                           <div class="panel-heading"><strong>Detalles del Pituto...</strong></div>
                            <div class="panel-body">
                              <?php
                                foreach($result as $resultado)
                                 {
                                 ?>
                                 <div class="col-sm-12"><strong>Nombres y Apellidos: </strong><?php echo $resultado->nombre_pituto?></div>
                                 <div class="col-sm-12"><strong>Email: </strong><?php echo $resultado->correo?> </div>
                                 <div class="col-sm-12"><strong>Categor&iacute;a: </strong>
                                  <?php 
                                  
                                  $categoria= preg_split( "/[{}]+/", $resultado->categoria );
                                  echo  $categoria[1];
                                   

                                  ?></div>
                                 <div class="col-sm-12"><strong>Valoraciones:</strong></div>
                                 <div class="col-sm-12">

                                 <?php 


                                  $id_usuario=$resultado->id_usuario;
                                  $contenido = "";
                                  $query = "SELECT * from t_asignacion_solicitudes where id_usuario='{$id_usuario}'";
                                  $query=pg_query($query);
                                  while($row=pg_fetch_array($query,NULL,PGSQL_ASSOC) )
                                  {
                                    echo '<div class="col-sm-12>"
                                          <table  class="table table-striped">
                                            <tr>
                                                <td>'. ($row['valoracion']) . '</td>
                                            </tr>
                                          </table>
                                          </div>';
                                  }
                                 ?>

                                <?php
                                 }
                                 ?>
                                 </div>                  
                              <div class="col-sm-12">&nbsp;&nbsp;</div>
                              <div class="col-sm-12">
                              <button type="button" class="btn bg-orange" id="BotonParaEsconder"><i class="fa fa-close"> Cerrar</i></button> 
                            </div>
                            </div>
                           </div>
                        </div>
                     </div>
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
