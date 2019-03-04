
<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_usuario=($variablesSesion['id_usuario']);
   if ($variablesSesion == "") {
       redirect('principal/session');
        
   }
   ?>

<style type="text/css">
  .btn-circle.btn-xl {
    width: 20px;
    height: 20px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 20px;
    height: 20px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/tooltip.css" />


<?php if (($variablesSesion['id_perfil'] == 1) ||  ($variablesSesion['id_perfil'] == 2)){ ?>
<div>
   <table class="table table-striped" align='justify' width='100%'>
      <thead>
         <tr >
            <th align="justify">Solicitante</th>
            <th align="justify">Tipo</th>
            <th align="justify">Categor&iacute;a</th>
            <th align="justify">Ubicaci&oacute;n</th>
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
             $nombres = $resultado->nombres;
           
             $tipo_solicitud = $resultado->tipo_solicitud;
             if($tipo_solicitud=='COTIZACION'){
              $tipo_solicitud = "<span tooltip='Cotizacion'>
                                  <img width='20%' src='https://127.0.0.1/MundoPituto/application/recursos/imagenes/boton_verde.PNG'>
                                  </span>";
             }else{
              $tipo_solicitud = "<span tooltip='Urgente'>
                                   <img width='20%' src='https://127.0.0.1/MundoPituto/application/recursos/imagenes/button_rojo.PNG'>
                                  </span>";

             } 
             $descripcion_solicitud = $resultado->descripcion_solicitud;
             $fecha_registro = $resultado->fecha_registro;
             $categoria = preg_split( "/[{}]+/", $resultado->categoria );
             $region_nombre = $resultado->region_nombre;
             $provincia_nombre = $resultado->provincia_nombre;
             $comuna_nombre = $resultado->comuna_nombre;
             
         echo "
         <tr align='right'>             
         <td>" . $nombres . "</td>            
         <td width='8%'>" . $tipo_solicitud . "</td>
         <td>" . $categoria[1] . "</td>
         <td>" . $region_nombre . '/'. $provincia_nombre .'/'. $comuna_nombre ."</td>
         <td>" . $descripcion_solicitud . "</td>
         <td>" . $fecha_registro . "</td>               
         <td align='justify' > 
         
         <a href='" . base_url() . "Solicitudes/consultar_solicitudes_pendientes_id?categoria=" . "$categoria[1]" . "&id_solicitud=" . $resultado->id_solicitud . "' class=''>
         <span tooltip='Editar'><span class='fa  fa-pencil-square-o'></span></span></a>

         <a href='" . base_url() . "Solicitudes/VerPitutos?categoria=" . "$categoria[1]" . "&id_solicitud=" . $resultado->id_solicitud . "' class=''>
         <span tooltip='Ver Pitutos'><span class='fa  fa-users'></span></span></a>

         <a href='#' data-id='$resultado->id_solicitud' class='deleteButton'><span tooltip='Eliminar Solicitud'><span class='fa  fa-trash'></span></span></a>
         </td>
         </tr>";
         }
         echo "
         <tbody>
         ";
         ?>
   </table>
</div>
<?php } ?>


<?php if($variablesSesion['id_perfil'] == 3){ ?>
<div id="tabla_vivo"></div>
<?php } ?>








<script type="text/javascript">
  $(document).ready(function() {
    var refreshId = setInterval(function() {
      $("#tabla_vivo").load("<?php echo base_url() ?>Solicitudes/tabla_en_vivo")
      .error(function() { alert("Error"); });
    }, 1000);
    $.ajaxSetup({ cache: false });        
  });
</script>

<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formEdit').formValidation({
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
           tipo_solicitud_edit: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
            descripcion_solicitud_edit: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           }
        }         
     })
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
       $('#formEdit').formValidation({
          
       }).on('success.form.fv', function(e) {
           e.preventDefault();
           var $form = $(e.target);
           $.ajax({
               url: "<?php echo base_url() . 'index.php/Solicitudes/actualizar_solicitud'; ?>",
               method: 'POST',
               data: $form.serialize()
           }).success(function(response) {
            alertify.log("Solicitud Actualizada...!!!"); 
               return false;
            $('#formulario')[0].reset();
           });
           setInterval(function() {
                   window.location.href = $("#redireccion_mensaje").val();
               }, 2000);
       });
   });
   $('.editButton').on('click', function() {
       var id = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'index.php/Solicitudes/consultar_solicitudes_pendientes_id/'; ?>" + id,
           method: 'GET'
   
       }).success(function(data) {
   
            var obj1 = JSON.parse(data);//parceamos los datos
            var obj = eval("(" + JSON.stringify(obj1) + ")");// limpiamos el json
            
           $('#formEdit')
           $('[name="id"]').val(obj.id_solicitud);
           $('[name="id_usuario_edit"]').val(obj.id_usuario);
           $('[name="id_categoria_edit"]').val(obj.id_categoria);
           $('[name="descripcion_solicitud_edit"]').val(obj.descripcion_solicitud);
           $('[name="tipo_solicitud_edit"]').val(obj.tipo_solicitud);
           $('[name="estatus_edit"]').val(obj.estatus);
           $('[name="fecha_registro_edit"]').val(obj.fecha_registro);
           
       });
   });
   
</script>
<script type="text/javascript">
   $(document).ready(function() {
   $('.deleteButton').on('click', function() {
       var id = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'index.php/Solicitudes/eliminar_solicitud_pendiente/'; ?>" + id,
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