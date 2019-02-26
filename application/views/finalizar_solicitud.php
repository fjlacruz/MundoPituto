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

  </style>




<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application/recursos/css/tooltip.css" />
<script src="<?php echo base_url(); ?>application/scripts/ruta_solicitudes.js"></script>
 
<html>
   <body style="background-color:#F4F7F9;">
      <div id="cerradas">
         <div class="container login-container" style="width: 99%;>
            <div class="row">
            <div class="col-md-3">
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
                <a href="<?php echo base_url() . 'Solicitudes/solicitudes'; ?>" class="list-group-item active">Finalizando Solicitud...</a>
               </div>
            </div>
            <div class="col-md-9 login-form-1" >
               <div id="estilo1" align="center">
                  <p>
                  <h3>Finalizar (Agregar Valoraci&oacute;n)</h3>
                  </p>
               </div>
               </br>
               <form name="formulario" id="formulario" method="POST" action="">
               <div class="form-group">
                 <?php
                      foreach($solicitud as $resultado)
                        {
                        ?>
                        <input type="hidden" name="id_solicitud" id="id_solicitud" value="<?php echo $resultado->id_solicitud?>">
                        <?php
                        }
                        ?>
                        <label class="control-label col-sm-2" >Valoraci&oacute;n:</label>
                        <div class="col-sm-8">
                           <textarea class="form-control text-uppercase" rows="5" id="valoracion" name="valoracion" placeholder="Breve descripci&oacute;n de su experiecia con el trabajo realizado"></textarea>
                        </div>
                     </div>
                     <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" >Puntuaci&oacute;n:</label>
                        <div class="col-sm-8">
                           
                           <div class='starrr' id='star2'></div>
                           <br />
                        <input type='hidden' name='puntuacion'  value='2' id='star2_input' />
                        </div>
                     </div>
                    <div class="col-sm-12">&nbsp;</div>
                     <div class="form-group">
                        <label class="control-label col-sm-2">&nbsp;</label>
                        <div class="col-sm-8">
                           <button type="submit" class="btn bg-navy"><i class="fa fa-check"></i> Finalizar</button>
                           <a  href="<?php echo base_url() . 'Solicitudes/solicitudes_procesando'; ?>"><button type="button" class="btn bg-orange"><i class="fa fa-close"> Cancelar</i></button></a>
                        </div>
                     </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>
<input type="hidden" id="redireccion_mensaje" value="<?php echo base_url() ?>Solicitudes/solicitudes_cerradas">
<script type="text/javascript">
   //====================== Validacion del formulario de registro de usuarios ============================
   $(document).ready(function() {
   $('#formulario').formValidation({
       fields: {
   
           valoracion: {
               row: '.col-sm-8',
               validators: {
                   notEmpty: {
                       message: 'CAMPO OBLIGATORIO'
                   }
               }
           },
           puntuacions: {
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
       url: "<?php echo base_url() . 'Solicitudes/finalizar_solicitud'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
       alertify.log("Solicitud finalizada...!!"); 
       $('#formulario').formValidation('resetForm');
       $('#formulario')[0].reset();
       setInterval(function() {
          window.location.href = $("#redireccion_mensaje").val();
          }, 2000);
       });
     });
   }); 
</script>



<script>
var slice = [].slice;
(function($, window) {
  var Starrr;
  window.Starrr = Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      max: 5,
      readOnly: false,
      emptyClass: 'fa fa-star-o',
      fullClass: 'fa fa-star',
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      this.createStars();
      this.syncRating();
      if (this.options.readOnly) {
        return;
      }
      this.$el.on('mouseover.starrr', 'a', (function(_this) {
        return function(e) {
          return _this.syncRating(_this.getStars().index(e.currentTarget) + 1);
        };
      })(this));
      this.$el.on('mouseout.starrr', (function(_this) {
        return function() {
          return _this.syncRating();
        };
      })(this));
      this.$el.on('click.starrr', 'a', (function(_this) {
        return function(e) {
          e.preventDefault();
          return _this.setRating(_this.getStars().index(e.currentTarget) + 1);
        };
      })(this));
      this.$el.on('starrr:change', this.options.change);
    }
    Starrr.prototype.getStars = function() {
      return this.$el.find('a');
    };
    Starrr.prototype.createStars = function() {
      var j, ref, results;
      results = [];
      for (j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; 1 <= ref ? j++ : j--) {
        results.push(this.$el.append("<a href='#' />"));
      }
      return results;
    };
    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };
    Starrr.prototype.getRating = function() {
      return this.options.rating;
    };
    Starrr.prototype.syncRating = function(rating) {
      var $stars, i, j, ref, results;
      rating || (rating = this.options.rating);
      $stars = this.getStars();
      results = [];
      for (i = j = 1, ref = this.options.max; 1 <= ref ? j <= ref : j >= ref; i = 1 <= ref ? ++j : --j) {
        results.push($stars.eq(i - 1).removeClass(rating >= i ? this.options.emptyClass : this.options.fullClass).addClass(rating >= i ? this.options.fullClass : this.options.emptyClass));
      }
      return results;
    };
    return Starrr;
  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;
      option = arguments[0], args = 2 <= arguments.length ? slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;
        data = $(this).data('starrr');
        if (!data) {
          $(this).data('starrr', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);
    var $s2input = $('#star2_input');
    $('#star2').starrr({
      max: 5,
      rating: $s2input.val(),
      change: function(e, value){
        $s2input.val(value).trigger('input');
      }
    });
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-39205841-5', 'dobtco.github.io');
    ga('send', 'pageview');
  </script>

