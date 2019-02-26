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

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/menu.css">
<html>
   <body >
      
      <nav>
         <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> MP</a>
         <ul class="menu">
            <li><a  class="homer" href="<?php echo BASE_URL() ?>principal/presentacion" ><i class="fa fa-home"></i> Mundo Pituto</a></li>
            <li ><a><i class="fa fa-phone"></i> Fono: 12345678</a></li>
            <li style="float: right;"><a href="<?php echo BASE_URL() ?>principal/inicio" ><i class="fa fa-lock"></i> Login</a></li>
            
         </ul>
      </nav>
  
      
   </body>
</html>