<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_perfil=($variablesSesion['id_perfil']);
   //print_r($id_perfil);
   $verificacion=$id_perfil;
   ?> 
<style type="text/css">
   a {
   color: black;
   }
   a:visited { 
   color: grey;
   }
</style>
<table class="table table-striped" align='justify'>
   <thead>
      <tr>
         <th align="justify">&nbsp;</th>
         <th align="justify">Destinatario</th>
         <th align="justify">Solicitud</th>
         <th align="justify">Categoria</th>
         <th align="justify">Mensaje</th>
         <th align="justify">Fecha</th>
         <th align="justify">Acciones</th>
      </tr>
   </thead>
   <?php
      echo "
          <tbody class='buscar'>";
              foreach ($resultados as $resultado) {
                  $leido = $resultado->leido;
                  $id_usuariop = $resultado->id_usuariop;
                  $id_mensaje = $resultado->id_mensaje;
                  $id_solicitud = $resultado->id_solicitud;
                  $nombres_pituto = $resultado->nombres_pituto;
                  $nombres_solicitante = $resultado->nombres_solicitante;
                  if($verificacion==='3'){
                   $nombre=$nombres_solicitante;
                  }else{
                     
                  $nombre=$nombres_pituto;
                  }
                  
                  $descripcion_solicitud = $resultado->descripcion_solicitud;
                  $mensaje = $resultado->mensaje;
                  $fecha_registro = $resultado->fecha_registro;
                  $hora_registro = $resultado->hora_registro;
                  $categoria = preg_split( "/[{}]+/", $resultado->categoria );
                 $foto = $resultado->foto;
          if(is_null($foto))
              {
            $foto="<img class='img-circle'  width='35' height='35' src='http://localhost/MundoPituto/silueta.jpg' />";  
      
               }else{
                $foto="<img class='img-circle'  width='35' height='35' src='http://localhost/MundoPituto/uploads/".$resultado->foto."' />";  
               }
      
      
                      echo "
      
                          <tr align='right'>
                          <td align='right'>" . $foto ."</td>
                          <td align='right'>" . $nombre ."</td>  
                          <td align='right'>" . $descripcion_solicitud ."</td>
                          <td align='right'>" . $categoria[1] ."</td>            
                          <td align='right'>" . $mensaje . '....'. "</td> 
                          <td align='right'>" . $fecha_registro ."&nbsp;&nbsp;&nbsp;". $hora_registro. "</td>     
                          <td align='justify' > 
                              <a href='#' data-id='$resultado->id_mensaje' class='deleteButton'><span tooltip='Eliminar'><span class='fa  fa-trash'></span></span></a>
                          </td>
                          </strong></tr>";
                              }
                          echo "
                          <tbody>
                              ";
                              ?>
</table>




<script type="text/javascript">
   $(document).ready(function() {
   $('.deleteButton').on('click', function() {
       var id = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'Solicitudes/eliminar_mensaje_pituto/'; ?>" + id,
           method: 'POST'
   
       }).success(function(response) {
            alertify.log("Mensaje Eliminado...!!!"); 
            $('#formulario')[0].reset();
               reload_table();
           });
   
       });
   });
</script>