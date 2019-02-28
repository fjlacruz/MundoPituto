<style>
   .tooltip {
   position: relative;
   display: inline-block;
   border-bottom: 1px dotted black;
   }
   .tooltip .tooltiptext {
   visibility: hidden;
   width: 120px;
   background-color: black;
   color: #fff;
   text-align: center;
   border-radius: 6px;
   padding: 5px 0;
   /* Position the tooltip */
   position: absolute;
   z-index: 1;
   }
   .tooltip:hover .tooltiptext {
   visibility: visible;
   }
</style>
<?php
   $variablesSesion = $this->session->userdata('usuario');
   $id_usuario=($variablesSesion['id_usuario']);
   if ($variablesSesion == "") {
       redirect('principal/session');
        
   }
  $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);

  $data_foto = $this->Consultas_usuarios_model->mostrar_foto($id_usuario);
  
  foreach($data_foto as $resultado){
  $foto=  $resultado->foto;

}

   ?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/menu.css">
<html>
   <body >
      <?php if ($variablesSesion['id_perfil'] == 1) { ?>
      <nav>
         <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> MP</a>
         <ul class="menu">
            <li><a  class="homer" href="<?php echo BASE_URL() ?>Solicitudes/solicitudes" ><i class="fa fa-home"></i> Mundo Pituto</a></li>
            </li>
          
            <li><a  href="<?php echo BASE_URL() ?>administracion/usuarios"><i class="fa fa-users"></i></i> Usuarios</a></li>

            <li><a  href="<?php echo BASE_URL() ?>solicitudes/mensajes"><i class="fa fa-envelope"></i></i> Mensajes <div class="label label-warning" id="mensajes_recibidos_sol"></div></a></li>
            
            <li><a  href="<?php echo BASE_URL() ?>testing/inicio"></i></i> Testing</a></li>
            

            <li style="float: right;"><a href="<?php echo base_url() ?>principal/logout"><span class="glyphicon glyphicon-log-in" ></span></a></li>
            <li style="float: right;">
              <a href="<?php echo base_url() ?>Administracion/usuarioModificar"  class="navbar-link" >
               <?php echo $variablesSesion['usuario']  ?></a>
            </li>
            
            <?php 
            $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);


            if ($verficacion == 1) { ?>
            <li style="float: right; margin-top: 18px" >
            <img class="img-circle"  width="30" height="30" src='<?php echo base_url() ?>uploads/<?php echo $foto?>' />&nbsp;&nbsp;
            </li>
            <?php } ?>
            <?php 
            $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario); 
            if ($verficacion == 0) { ?>
            <li style="float: right; margin-top: 18px" >
            <img class="img-circle"  width="30" height="30" src='<?php echo base_url() ?>silueta.jpg' />&nbsp;&nbsp;
            </li>
            <?php } ?>
         </ul>
      </nav>
      <?php } ?>
      <?php if ($variablesSesion['id_perfil'] == 2) { ?>
      <nav>
         <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> MP</a>
         <ul class="menu">
            <li><a  class="homer" href="<?php echo BASE_URL() ?>Solicitudes/solicitudes" ><i class="fa fa-home"></i> Mundo Pituto</a></li>
            </li>

            <li><a  href="<?php echo BASE_URL() ?>solicitudes/mensajes"><i class="fa fa-envelope"></i></i> Mensajes <div class="label label-warning" id="mensajes_recibidos_sol"></div></a></li>



            <li style="float: right;"><a href="<?php echo base_url() ?>principal/logout"><span class="glyphicon glyphicon-log-in" ></span></a></li>
            <li style="float: right;">
              <a href="<?php echo base_url() ?>Administracion/usuarioModificar"  class="navbar-link" >
               <?php echo $variablesSesion['usuario']  ?></a>
            </li>
            
            <?php 
            $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);


            if ($verficacion == 1) { ?>
            <li style="float: right; margin-top: 18px" >
            <img class="img-circle"  width="30" height="30" src='<?php echo base_url() ?>uploads/<?php echo $foto?>' />&nbsp;&nbsp;
            </li>
            <?php } ?>
            <?php 
            $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario); 
            if ($verficacion == 0) { ?>
            <li style="float: right; margin-top: 18px" >
            <img class="img-circle"  width="30" height="30" src='<?php echo base_url() ?>silueta.jpg' />&nbsp;&nbsp;
            </li>
            <?php } ?>
         </ul>
      </nav>
      <?php } ?>
       <?php if ($variablesSesion['id_perfil'] == 3) { ?>
     <nav>
         <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> MP</a>
         <ul class="menu">
            <li><a  class="homer" href="<?php echo BASE_URL() ?>Solicitudes/solicitudes" ><i class="fa fa-home"></i> Mundo Pituto</a></li>
            </li>
            <li><a  href="<?php echo BASE_URL() ?>solicitudes/mensajes"><i class="fa fa-envelope"></i></i> Mensajes <div class="label label-warning" id="mensajes_recibidos_pit"></div></a></li>

            <li><a  href="<?php echo BASE_URL() ?>solicitudes/verContrataciones"><i class="fa fa-tag"></i></i>  Contrataciones</a></li>
            
            <li style="float: right;"><a href="<?php echo base_url() ?>principal/logout"><span class="glyphicon glyphicon-log-in" ></span></a></li>
            <li style="float: right;">
              <a href="<?php echo base_url() ?>Administracion/usuarioModificar"  class="navbar-link" >
               <?php echo $variablesSesion['usuario']  ?></a>
            </li>
            
            <?php 
            $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario);


            if ($verficacion == 1) { ?>
            <li style="float: right; margin-top: 18px" >
            <img class="img-circle"  width="30" height="30" src='<?php echo base_url() ?>uploads/<?php echo $foto?>' />&nbsp;&nbsp;
            </li>
            <?php } ?>
            <?php 
            $verficacion = $this->Consultas_usuarios_model->existe_foto($id_usuario); 
            if ($verficacion == 0) { ?>
            <li style="float: right; margin-top: 18px" >
            <img class="img-circle"  width="30" height="30" src='<?php echo base_url() ?>silueta.jpg' />&nbsp;&nbsp;
            </li>
            <?php } ?>
         </ul>
      </nav>
      <?php } ?>
       <?php if ($variablesSesion['id_perfil'] == 4) { ?>
      <nav>
         <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> MP</a>
         <ul class="menu">
            <li><a  class="homer" href="<?php echo BASE_URL() ?>Solicitudes/solicitudes" ><i class="fa fa-home"></i> SAC</a></li>
            </li>
            <li style="float: right;"><a href="<?php echo base_url() ?>Principal/logout"><span class="glyphicon glyphicon-log-in" ></span></a></li>
            <li style="float: right;"><a href="<?php echo base_url() ?>Administracion/usuarioModificar" data-toggle="tooltip" data-placement="top" class="navbar-link" ><span class="fa fa-wrench" ></span>&nbsp;Usuario:
               <?php echo $variablesSesion['nombres'] . " " . $variablesSesion['apellidos'] ?></a>
            </li>
         </ul>
      </nav>
    </br></br></br></br></br>
      <?php } ?>
      <div id="div-results"></div>
      <script type="text/javascript">
         $(document).ready(function() {
             $('#btn1').on('click', function(){
                 $.ajax({
                     type: "POST",
                     url: "<?php echo base_url() . 'administracion/usuarios'; ?>",
                     success: function(response) {
                         $('#div-results').html(response);
                          reload_table();
                     }
                 });
             });
         
              
          
             $('#btn2').on('click', function(){
                 $.ajax({
                     type: "POST",
                     url: "<?php echo base_url() ?>administracion/usuarioModificar",
                     success: function(response) {
                         $('#div-results').html(response);
                     }
                 });
             });
         });
      </script>
      <script>
         $(document).ready(function() {
                 $.ajax({
                     url: "tabla",
                     type: 'post',
                     success: function(salida) {
                         $("#tabla").html(salida);
                     }
                 });
             });
         
             function reload_table() {
                 $.ajax({
                     url: "tabla",
                     type: 'post',
                     success: function(salida) {
                         $("#tabla").html(salida);
                     }
                 });
         
             }
         
      </script>
      <script>
         $(document).ready(function(){ 
             var touch   = $('#resp-menu');
             var menu    = $('.menu');
          
             $(touch).on('click', function(e) {
                 e.preventDefault();
                 menu.slideToggle();
             });
             
             $(window).resize(function(){
                 var w = $(window).width();
                 if(w > 767 && menu.is(':hidden')) {
                     menu.removeAttr('style');
                 }
             });
             
         });
      </script>
      <script type="text/javascript">
         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', 'UA-36251023-1']);
         _gaq.push(['_setDomainName', 'jqueryscript.net']);
         _gaq.push(['_trackPageview']);
         
         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
         
      </script>
   </body>
</html>




<script type="text/javascript">
  $(document).ready(function() {
    var refreshId = setInterval(function() {
      $("#mensajes_recibidos_sol").load("<?php echo base_url() ?>Solicitudes/contar_mensajes_solicitante")
      .error(function() { alert("Error"); });
    }, 1000);
    $.ajaxSetup({ cache: false });        
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    var refreshId = setInterval(function() {
      $("#mensajes_recibidos_pit").load("<?php echo base_url() ?>Solicitudes/contar_mensajes_pituto")
      .error(function() { alert("Error"); });
    }, 1000);
    $.ajaxSetup({ cache: false });        
  });
</script>