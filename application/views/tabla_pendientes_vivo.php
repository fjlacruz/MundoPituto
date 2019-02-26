<div>
   <table class="table table-striped" align='justify'>
      <thead>
         <tr >
            <th align="justify">&nbsp;</th>
            <th align="justify">Solicitante</th>
            <th align="justify">Tipo</th>
            <th align="justify">Categor&iacute;a</th>
            <th align="justify">Descripci&oacute;n</th>
            <th align="justify">Fecha</th>
         </tr>
      </thead>
      <?php
         echo "
         <tbody class='buscar'>";
         foreach ($resultados as $resultado) {
             $id_solicitud = $resultado->id_solicitud;
             $nombres = $resultado->nombres;
             $id_usuario = $resultado->id_usuario;
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
             $foto_solicitante= $this->Consultas_usuarios_model->mostrar_foto($id_usuario);
            
             foreach ($foto_solicitante as $resultado) {
              $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);
               $foto_sol = $resultado->foto;

               if($verficacion==1){
                   $foto_sol="<img class='img-circle'  width='35' height='35' src='http://localhost/MundoPituto/uploads/".$resultado->foto."' />";
                                
                     }else{
                      $foto_sol="<img class='img-circle'  width='35' height='35' src='http://localhost/MundoPituto/silueta.jpg' />";
                 }
                
             }
             
             
         echo "
         <tr align='right'>             
         <td>" . $foto_sol . "</td>
         <td>" . $nombres . "</td>              
         <td width='8%'>" . $tipo_solicitud . "</td>
         <td>" . $categoria[1] . "</td>
         <td>" . $descripcion_solicitud . "</td>
         <td>" . $fecha_registro . "</td>               
         </tr>";
         }
         echo "
         <tbody>
         ";
         ?>
   </table>
</div>