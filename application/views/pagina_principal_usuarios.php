<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/tooltip.css" />
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
<style>
   .row{
   margin-top:40px;
   padding: 0 10px;
   }
   .clickable{
   cursor: pointer;   
   }
   .panel-heading span {
   margin-top: -20px;
   font-size: 15px;
   }
</style>
<style>
   #fondo_div{
   color:#0D418E;
   background:#F4F6F9;
   padding-left: 1px;
   padding-right:10px;
   }
</style>
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
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div>
         
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
               <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
               <li data-target="#myCarousel" data-slide-to="1"></li>
               <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
               <div class="item active">
                  <img  class="img-responsive" src="<?php echo base_url(); ?>application/recursos/imagenes/presentacion1.jpg" style="width:100%;">
               </div>
               <div class="item">
                  <img  class="img-responsive" src="<?php echo base_url(); ?>application/recursos/imagenes/presentacion2.jpg" style="width:100%;">
               </div>
               <div class="item">
                  <img  class="img-responsive" src="<?php echo base_url(); ?>application/recursos/imagenes/presentacion3.jpg" style="width:100%;">
               </div>
               <div class="item">
                  <img  class="img-responsive" src="<?php echo base_url(); ?>application/recursos/imagenes/presentacion4.jpg" style="width:100%;">
               </div>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
            </a>
         </div>
      </div>
      <div id="pendientes">
      <div class="container login-container" style="width: 98%;">
      <div class="row">
      <div class="col-md-2" id="fondo_div">
         <form name="formulario" id="formulario" method="POST" action="consulatarSolicitudes">
            <div class="col-sm-12">&nbsp;</div>
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title"><strong>Trabajos Ofertados </strong></h3>
               </div>
            </div>
            <div class="col-sm-12">
               <select name="id_categoria" id="id_categoria"  class="form-control" title="Seleccione una Categor&iacute;a" required/>
                  <option value="">Categor&iacute;a</option>
                  <?php
                     foreach ($categorias as $i => $categoria) {
                         echo '<option value="' . $categoria->id_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                     }
                     ?>                     
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="tipo_solicitud" id="tipo_solicitud"  class="form-control" required/>
                  <option value="">Tipo</option>
                  <option value="COTIZACION">COTIZACI&Oacute;N</option>
                  <option value="URGENCIA">URGENCIA</option>
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="region_id" id="region_id"  class="form-control" required/>
                  <option value="">Regi&oacute;n</option>
                  <option value="0"><strong>Todas las Regiones</strong></option>
                  <?php
                     foreach ($regiones as $i => $region) {
                         echo '<option value="' . $region->region_id . '">' . $region->region_nombre . '</option>';
                     }
                     ?>                     
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="provincia_id" id="provincia_id"  class="form-control" >
                  <option value="">Provincia</option>
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="comuna_id" id="comuna_id"  class="form-control" >
                  <option value="">Comuna</option>
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <button type="submit" class="btn bg-navy btn-sm btn-block"><i class="fa fa-filter"></i> Filtrar</button>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <a  href="<?php echo base_url() . 'Principal/presentacion'; ?>"><button type="button" class="btn bg-navy btn-sm btn-block"><i class="fa fa-search"> Ver todo</i></button></a>
            </div>
            <div class="col-sm-12">&nbsp;</div>
         </form>
      </div>
      <div class="col-md-8 login-form-1">
         <div align="left">
            <p>
            <h3>Personas que ofrecen sus servicios</h3>
            </p>
         </div>
         <div class="input-group"> <span class="input-group-addon"><i class="fa fa-search"></i> Buscar</span>
            <input id="filtrar" type="text" class="form-control" placeholder="Ingrese los datos para la b&uacute;squeda...">
         </div>
         <div id="scroll">
            <table class="table table-striped" align='justify'>
               <thead>
                  <tr >
                     <th align="justify">&nbsp;</th>
                     <th align="justify">Categor&iacute;a</th>
                     <th align="justify">Nombres</th>
                     <th align="justify">Regi&oacute;n</th>
                     <th align="justify">Provincia</th>
                     <th align="justify">&nbsp;</th>
                  </tr>
               </thead>
               <?php
                  echo "
                  <tbody class='buscar'>";
                  foreach ($resultados as $resultado) {
                      $foto = $resultado->foto;
                      $nombres = $resultado->nombres;
                      $region_nombre = $resultado->region_nombre;
                      $provincia_nombre = $resultado->provincia_nombre;
                      //$categoria =  $resultado->categoria; 

                     $categoria = preg_split( "/[{}]+/", $resultado->categoria );
                     
                      
                  echo "
                  <tr align='right'>
                  <td align='right'><img class='img-circle'  width='35' height='35' src='http://127.0.0.1/MundoPituto/uploads/".$resultado->foto."' /></td>
                  <td align='right'>" . $categoria[1] . "</td>             
                  <td align='right'>" . $nombres . "</td>               
                  <td align='right'>" . $region_nombre . "</td>
                  <td align='right'>" . $provincia_nombre . "</td>               
                  <td align='justify' > 
                  
                  </td>
                  </tr>";
                  }
                  echo "
                  <tbody>
                  ";
                  ?>
            </table>
         </div>
      </div>


      <div class="col-md-2" id="fondo_div">
        <form name="formulario" id="formulario" method="POST" action="consultarUsuarios">
            <div class="col-sm-12">&nbsp;</div>
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <h3 class="panel-title"><strong>Trabajadores </strong></h3>
               </div>
            </div>
            <div class="col-sm-12">
               <select name="categoria" id="categoria"  class="form-control" title="Seleccione una Categor&iacute;a" required/>
                  <option value="">Categor&iacute;a</option>
                  <?php
                     foreach ($categorias as $i => $categoria) {
                         echo '<option value="' . $categoria->descripcion_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                     }
                     ?>                     
               </select>
            </div>
            
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="region_id2" id="region_id2"  class="form-control" required/>
                  <option value="">Regi&oacute;n</option>
                  <option value="0"><strong>Todas las Regiones</strong></option>
                  <?php
                     foreach ($regiones2 as $i => $region2) {
                         echo '<option value="' . $region2->region_id . '">' . $region2->region_nombre . '</option>';
                     }
                     ?>                     
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="provincia_id2" id="provincia_id2"  class="form-control" >
                  <option value="0">Provincia</option>
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <select name="comuna_id2" id="comuna_id2"  class="form-control" >
                  <option value="0">Comuna</option>
               </select>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <button type="submit" class="btn bg-navy btn-sm btn-block"><i class="fa fa-filter"></i> Filtrar</button>
            </div>
            <div class="col-sm-12">&nbsp;</div>
            <div class="col-sm-12">
               <a  href="<?php echo base_url() . 'Principal/presentacion'; ?>"><button type="button" class="btn bg-navy btn-sm btn-block"><i class="fa fa-search"> Ver todo</i></button></a>
            </div>
            <div class="col-sm-12">&nbsp;</div>
         </form>
      </div>




   </body>
   <div class="col-sm-12">&nbsp;</div>
   <div align="center">
            <img class="img-responsive" width="20%" height="10%" src='<?php echo base_url(); ?>application/recursos/imagenes/logo.PNG' />
         </div>
</html>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
   $(document).on("change", '#id_categoria', function ()
          {
     $("#id_sub_categoria").load("<?php echo base_url() . 'index.php/Administracion/obtener_sub_categoria?id_categoria='; ?>" + $(this).val());
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
   $(document).on("change", '#region_id2', function ()
          {
     $("#provincia_id2").load("<?php echo base_url() . 'index.php/Principal/obtener_provincia2?region_id2='; ?>" + $(this).val());
          });
      
</script>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
   $(document).on("change", '#provincia_id', function ()
          {
     $("#comuna_id").load("<?php echo base_url() . 'index.php/Principal/obtener_comuna?provincia_id='; ?>" + $(this).val());
          });
      
</script>

<script>
   //=================== Script para mostrar las sub-categorias ==================//
   $(document).on("change", '#provincia_id2', function ()
          {
     $("#comuna_id2").load("<?php echo base_url() . 'index.php/Principal/obtener_comuna2?provincia_id2='; ?>" + $(this).val());
          });
      
</script>
