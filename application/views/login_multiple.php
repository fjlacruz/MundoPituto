

<style type="text/css">
    .login-container{
    margin-top: 2%;
    margin-bottom: 2%;
}
.login-form-1{
    padding: 1%;
    box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    background-color:#FFF;
}
.login-container form{
    padding: 0%;
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
  .ms-container{
  background: transparent url('../img/switch.png') no-repeat 50% 50%;
  width: 370px;
}

.ms-container:after{
  content: ".";
  display: block;
  height: 0;
  line-height: 0;
  font-size: 0;
  clear: both;
  min-height: 0;
  visibility: hidden;
}

.ms-container .ms-selectable, .ms-container .ms-selection{
  background: #fff;
  color: #555555;
  float: left;
  width: 45%;
}
.ms-container .ms-selection{
  float: right;
}

.ms-container .ms-list{
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  -webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
  -moz-transition: border linear 0.2s, box-shadow linear 0.2s;
  -ms-transition: border linear 0.2s, box-shadow linear 0.2s;
  -o-transition: border linear 0.2s, box-shadow linear 0.2s;
  transition: border linear 0.2s, box-shadow linear 0.2s;
  border: 1px solid #ccc;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  position: relative;
  height: 200px;
  padding: 0;
  overflow-y: auto;
}

.ms-container .ms-list.ms-focus{
  border-color: rgba(82, 168, 236, 0.8);
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  outline: 0;
  outline: thin dotted \9;
}

.ms-container ul{
  margin: 0;
  list-style-type: none;
  padding: 0;
}

.ms-container .ms-optgroup-container{
  width: 100%;
}

.ms-container .ms-optgroup-label{
  margin: 0;
  padding: 5px 0px 0px 5px;
  cursor: pointer;
  color: #999;
}

.ms-container .ms-selectable li.ms-elem-selectable,
.ms-container .ms-selection li.ms-elem-selection{
  border-bottom: 1px #eee solid;
  padding: 2px 10px;
  color: #555;
  font-size: 14px;
}

.ms-container .ms-selectable li.ms-hover,
.ms-container .ms-selection li.ms-hover{
  cursor: pointer;
  color: #fff;
  text-decoration: none;
  background-color: #08c;
}

.ms-container .ms-selectable li.disabled,
.ms-container .ms-selection li.disabled{
  background-color: #eee;
  color: #aaa;
  cursor: text;
}
</style>



<script src="<?php echo base_url(); ?>application/scripts/ruta_login.js"></script>
<script type="text/javascript">
  function pagoOnChange(sel) {
      if (sel.value=="3"){
           divC = document.getElementById("visible");
           divC.style.display = "";

           divT = document.getElementById("oculto");
           divT.style.display = "none";

      }else{

           divC = document.getElementById("visible");
           divC.style.display="none";

           divT = document.getElementById("oculto");
           divT.style.display = "";
      }
}
</script>
<html>

<body style="background-color:#F4F7F9;">
<div id="login">
<div class="container login-container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 login-form-1">
                    <div id="estilo1" align="center"><p><h3>Login Mundo Pituto</h3></p></div>
                    <div align="center">
                    <img class="img-responsive" src='https://localhost/MundoPituto/application/recursos/imagenes/logo.PNG' />
                </div>
                    <form action='login' name="formulario" id="formulario" method="post">
                        <div class="form-group">
                         <label class="control-label col-sm-2">Usuario:</label>
                           <div class="col-sm-10">
                            <input class="form-control" id="usuario" name="usuario" type="text " placeholder="Usuario" onkeyup="javascript:this.value = this.value.toUpperCase()" >
                           </div>
                        </div>
                        <div class="col-sm-12">&nbsp;</div>
                        <div class="form-group">
                         <label class="control-label col-sm-2">Clave:</label>
                           <div class="col-sm-10">
                            <input class="form-control" id="clave" name="clave" type="password" placeholder="Clave" >
                           </div>
                        </div>
                        <div class="col-sm-12">&nbsp;</div>
                        <div class="form-group">
                         <label class="control-label col-sm-2">&nbsp;</label>
                           <div class="col-sm-10">
                            <button type="submit" class="btn bg-navy btn-block ajax"  onclick="testHoldon('sk-circle');"><i class="fa fa-unlock-alt"></i> Login</button></span>
                           </div>
                        </div>
                        <div class="col-sm-12">&nbsp;</div>
                        <div class="form-group">
                         <label class="control-label col-sm-2">&nbsp;</label>
                           <div class="col-sm-10">
                            <button  onclick="myFunction(2)" class="btn bg-navy btn-block ajax"><i class="fa fa-user-plus"></i> Registrar Usuario</button></span>
                           </div>
                        </div>
                         <div class="col-sm-12">&nbsp;</div>
                          <div class="col-sm-12">&nbsp;</div>
                    </form>
                </div>
            </div>
        </div>
</div>


<div id="registrar_usuario" style="display:none;" >
    <div class="container login-container">     
              <div class="row">
                <div class="col-md-12 login-form-1" >	
                    <form id="formulario2" method="post" class="form-horizontal">
                       <div id="estilo2" align="center"><h3>Registro de Usuario</h3></div></br> 
                        <div class="form-group">
                         <label class="control-label col-sm-2">Identificaci&oacute;n:</label>
                           <div class="col-sm-8">
                           <input type="text" v-model="cedula" autocomplete="off" class="form-control text-uppercase form-control-sm" id="cedula" maxlength="20" name="cedula" placeholder="Identificaci&oacute;n">
                           </div>
                        </div>

                        <div class="form-group">
                         <label class="control-label col-sm-2">Nombres/Raz&oacute;n Social:</label>
                           <div class="col-sm-8">
                            <input type="text"  v-model="nombres"  class="form-control text-uppercase" id="nombres" onKeyPress="return soloLetras(event)" name="nombres" placeholder="Nombres/Raz&oacute;n Social" maxlength="20">
                           </div>

                        </div>

                      

                        <div class="form-group">
                         <label class="control-label col-sm-2">Usuario:</label>
                           <div class="col-sm-8">
                            <input type="text"  class="form-control text-uppercase" id="usuario2" onKeyPress="return soloLetras(event)" name="usuario" placeholder="Nombre de Usuario" maxlength="10">
                           </div>
                        </div>

                        <div class="form-group">
                         <label class="control-label col-sm-2">Email:</label>
                           <div class="col-sm-8">
                            <input type="text" class="form-control text-uppercase" id="correo" name="correo"  placeholder="Correo El&eacute;ctronico" maxlength="50">
                           </div>
                        </div>

                        <div class="form-group">
                         <label class="control-label col-sm-2">Prefil:</label>
                           <div class="col-sm-8">
                            <select name="id_perfil" id="id_perfil"  class="form-control" onChange="pagoOnChange(this)"><option value="">Selecione...</option>
                             <?php
                             foreach ($perfiles as $i => $perfil) {
                                 echo '<option value="' . $perfil->id_perfil . '">' . $perfil->descripcion_perfil . '</option>';
                             }
                             ?>                     
                         </select>
                           </div>
                        </div>

                       
                        <div id="visible" style="display:none;">
                        <div class="form-group">
                         <label class="control-label col-sm-2">Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select id='pre-selected-options' multiple='multiple' name="id_categoria[]"><option value="">Selecione...</option>
                             <?php
                             foreach ($categorias as $i => $categoria) {
                                 echo '<option value="' . $categoria->id_categoria . '">' . $categoria->descripcion_categoria . '</option>';
                             }
                             ?>                     
                         </select>



                           </div>
                        </div>
                      <!--   <div class="form-group">
                         <label class="control-label col-sm-2">Sub-Categor&iacute;a:</label>
                           <div class="col-sm-8">
                            <select name="id_sub_categoria" id="id_sub_categoria"  class="form-control" ><option value="">Selecione...</option>               
                         </select>
                           </div>
                        </div> -->
                        </div>

                        <div id="oculto" style="display:none;">
                        <div class="form-group">
                           <div class="col-sm-8">
                            <input type="hidden" name="id_categoria" id="id_categoria" value="0">
                            <input type="hidden" name="id_sub_categoria" id="id_sub_categoria" value="0">
                           </div>
                        </div>
                        </div>



                       

                        <div class="form-group">
                         <label class="control-label col-sm-2" for="correo_modal">Clave:</label>
                           <div class="col-sm-8">
                            <input type="password" name="confirmar_clave" id="confirmar_clave" class="form-control text-uppercase" placeholder="Clave de Acceso" maxlength="20">
                           </div>
                        </div>

                        <div class="form-group">
                         <label class="control-label col-sm-2" for="correo_modal">Confirmar Clave:</label>
                           <div class="col-sm-8">
                             <input type="password" name="clave" id="clave" class="form-control text-uppercase" placeholder="Confirme su Clave de Acceso" maxlength="20">
                           </div>
                        </div>

                        <div class="form-group">
                         <label class="control-label col-sm-2" for="email">&nbsp;</label>
                           <div class="col-sm-8">
                        <button type="submit" class="btn bg-navy" onclick="myFunction(2)"><i class="fa fa-save"></i> Guardar</button>
                        <button type="button" class="btn bg-orange " onclick="myFunction(1)"><i class="fa fa-close">Cancelar</i></button>
                           </div>
                        </div></br>
            </form>
        </div>
    </div>
 </div>
</div>

<div id="recuperar_usuario">
    recuperacion
</div>
</body>
</html>
<script>
   //=================== Script para mostrar las sub-categorias ==================//
$(document).on("change", '#id_categoria', function ()
       {
$("#id_sub_categoria").load("<?php echo base_url() . 'index.php/Administracion/obtener_sub_categoria?id_categoria='; ?>" + $(this).val());
       });

</script>

<script>

    //validacion con boostrap
    $(document).ready(function() {

        $('#loginForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            fields: {
                correo: {
                    validators: {
                        notEmpty: {
                            message: 'La Direcci&oacute;n de Correo es Requerida'
                        },
                        regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: ' '
                        },
                        emailAddress: {
                            message: 'Direcci&oacute;n de Correo Inv&aacute;lida'
                        }
                    }
                }
            }
        });
    });
    $('#formulario').formValidation({
        framework: 'bootstrap',
        fields: {
            usuario: {
                row: '.col-sm-10',
                validators: {
                    notEmpty: {
                        message: 'Nombre de Usuario Requerido'
                    }
                }
            },
            clave: {
                row: '.col-sm-10',
                validators: {
                    notEmpty: {
                        message: 'La Clave es Requerida'
                    }
                }
            }

        }

    });
    //consultamos si el correo existe
    $(document).ready(function() {
        $('#correo').keyup(function() {
            var correo = $(this).val();
            var dataString = 'correo=' + correo;

            $.ajax({
                type: "POST",
                url: "consultar_correo",
                data: dataString,
                success: function(data) {
                    if (data == 1) {

                        $("#botones").show();
                        $("#resultado2").html("<div class='alert alert-success alert-dismissable'>\n\
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>\n\
                <i class='icon fa fa-check'></i>Correo <strong>validado</strong> correctamente</div>");
                    } else {

                        $("#resultado2").html("<div class='alert alert-danger alert-dismissible'>\n\
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>\n\
                <i class='icon fa fa-ban'></i><strong>Alerta! </strong>Cuenta de correo <strong>No Existente</div>");
                        document.getElementById('botones').style.display = 'none';

                    }
                }
            });
        });
    });
    // si existe enviamos el correo 
    $(document).ready(function() {
        $('#botones').click(function() {
            var correo = $('#correo').val();
            var dataString = 'correo=' + correo;
            $('#alerta').html('<label>Enviando correo ...</label>');
            $.ajax({
                data: dataString,
                type: 'POST',
                url: "recuperarClave",
                success: function(salida)
                {
                    $("#alerta").delay(1000).fadeOut(1000);
                    setTimeout(function() {
                        $('#success2').html('<label>Correo enviado con exito</label>');
                    }, 2000);
                }

            });
        });
    });

    //consultamos is el usuario existe
    $(document).on("blur", '#usuario', function()
    {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/administracion/consultar_usuario2'; ?>",
            data: {usuario: $('#usuario').val()},
            dataType: 'html',
            type: 'post',
            success: function(respuesta) {

                console.log(respuesta);
                if (respuesta == 0)
                {
                    $('#usuario').val('');
                     alertify.error("El Usuario NO existe...!!!"); 

                }
            }
        });
    });

</script>


<script type="text/javascript">
    //====================== Validacion del formulario de registro de usuarios ============================
$(document).ready(function() {
    $('#formulario2').formValidation({
        fields: {
            cedula: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            correo: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    },
                    regexp: {
                        regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                        message: 'Direcci&oacute;n de Correo Inv&aacute;lida'
                    }
                }
            },
            usuario: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            rol: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            nombres: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            apellidos: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
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
            id_perfil: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    }
                }
            },
            confirmar_clave: {
                row: '.col-sm-8',
                validators: {
                    notEmpty: {
                        message: 'CAMPO OBLIGATORIO'
                    },
                        /////PASSWORD = Mayuscula, Minuscula, numero, caracter especial
                        regexp: {
                            regexp: '^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[$@!%?&.-_#,/]).{8,12}$',
                            message: 'La contrase&ntilde;a debe contener m&iacute;nimo 8 y m&aacute;ximo 12 caracteres, y por lo menos 1 may&uacute;scula del alfabeto , 1 min&uacute;sculas del alfabeto , 1 N&uacute;mero y el car&aacute;cter especial'
                        }

                    }
                },
                clave: {
                    row: '.col-sm-8',
                    validators: {
                        notEmpty: {
                            message: 'CAMPO OBLIGATORIO'
                        },
                        identical: {
                            field: 'confirmar_clave',
                            message: 'Las contrase&ntilde;a deben ser iguales'
                        }
                    }
                }

            }
//==============  registro de Usuario ======================================================          
}).on('success.form.fv', function(e) {
    e.preventDefault();
    var $form = $(e.target);
    $.ajax({
        url: "<?php echo base_url() . 'index.php/Administracion/registrar_usuario'; ?>",
        method: 'POST',
        data: $form.serialize()
    }).success(function(response) {

        alertify.log("Se ha Registrado un usuario...!!"); 

        $('#formulario2').formValidation('resetForm');
        $('#formulario2')[0].reset();
        myFunction(1);
    });
});
});

</script>


<script>
    // Validar si existe cedula, correo y usuario
    $(document).on("blur", '#cedula', function() {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/consultas/existe_cedula'; ?>",
            data: {cedula: $('#cedula').val()},
            dataType: 'html',
            type: 'post',
            success: function(respuesta) {
                if (respuesta == 1)
                {
                    $('#formulario').formValidation('resetForm');
                    $('#cedula').val('');
                    $("#nombres").val('');
                    $("#apellidos").val('');
                    alertify.error("Identificaci&oacute;n Ya Registrada...!!"); 
                    return false;
                }
            }
        });
    });
    $(document).on("blur", '#correo', function() {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/consultas/existe_correo'; ?>",
            data: {correo: $('#correo').val()},
            dataType: 'html',
            type: 'post',
            success: function(respuesta) {
                if (respuesta == 1)
                {
                    $('#correo').val('');
                    $('#formulario').formValidation('resetForm');
                    alertify.error("Email ya Registrado...!!"); 
                    return false;
                }
            }
        });
    });

    $(document).on("blur", '#usuario2', function() {
        $.ajax({
            url: "<?php echo base_url() . 'index.php/consultas/existe_usuario'; ?>",
            data: {usuario: $('#usuario2').val()},
            dataType: 'html',
            type: 'post',
            success: function(respuesta) {

                if (respuesta == 1)
                {
                    $('#formulario').formValidation('resetForm');
                    $('#usuario2').val('');
                    alertify.error("usuario ya Registrado...!!"); 
                    return false;
                }
            }
        });
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
  
/*
* MultiSelect v0.9.12
* Copyright (c) 2012 Louis Cuny
*
* This program is free software. It comes without any warranty, to
* the extent permitted by applicable law. You can redistribute it
* and/or modify it under the terms of the Do What The Fuck You Want
* To Public License, Version 2, as published by Sam Hocevar. See
* http://sam.zoy.org/wtfpl/COPYING for more details.
*/

!function ($) {

  "use strict";


 /* MULTISELECT CLASS DEFINITION
  * ====================== */

  var MultiSelect = function (element, options) {
    this.options = options;
    this.$element = $(element);
    this.$container = $('<div/>', { 'class': "ms-container" });
    this.$selectableContainer = $('<div/>', { 'class': 'ms-selectable' });
    this.$selectionContainer = $('<div/>', { 'class': 'ms-selection' });
    this.$selectableUl = $('<ul/>', { 'class': "ms-list", 'tabindex' : '-1' });
    this.$selectionUl = $('<ul/>', { 'class': "ms-list", 'tabindex' : '-1' });
    this.scrollTo = 0;
    this.elemsSelector = 'li:visible:not(.ms-optgroup-label,.ms-optgroup-container,.'+options.disabledClass+')';
  };

  MultiSelect.prototype = {
    constructor: MultiSelect,

    init: function(){
      var that = this,
          ms = this.$element;

      if (ms.next('.ms-container').length === 0){
        ms.css({ position: 'absolute', left: '-9999px' });
        ms.attr('id', ms.attr('id') ? ms.attr('id') : Math.ceil(Math.random()*1000)+'multiselect');
        this.$container.attr('id', 'ms-'+ms.attr('id'));
        this.$container.addClass(that.options.cssClass);
        ms.find('option').each(function(){
          that.generateLisFromOption(this);
        });

        this.$selectionUl.find('.ms-optgroup-label').hide();

        if (that.options.selectableHeader){
          that.$selectableContainer.append(that.options.selectableHeader);
        }
        that.$selectableContainer.append(that.$selectableUl);
        if (that.options.selectableFooter){
          that.$selectableContainer.append(that.options.selectableFooter);
        }

        if (that.options.selectionHeader){
          that.$selectionContainer.append(that.options.selectionHeader);
        }
        that.$selectionContainer.append(that.$selectionUl);
        if (that.options.selectionFooter){
          that.$selectionContainer.append(that.options.selectionFooter);
        }

        that.$container.append(that.$selectableContainer);
        that.$container.append(that.$selectionContainer);
        ms.after(that.$container);

        that.activeMouse(that.$selectableUl);
        that.activeKeyboard(that.$selectableUl);

        var action = that.options.dblClick ? 'dblclick' : 'click';

        that.$selectableUl.on(action, '.ms-elem-selectable', function(){
          that.select($(this).data('ms-value'));
        });
        that.$selectionUl.on(action, '.ms-elem-selection', function(){
          that.deselect($(this).data('ms-value'));
        });

        that.activeMouse(that.$selectionUl);
        that.activeKeyboard(that.$selectionUl);

        ms.on('focus', function(){
          that.$selectableUl.focus();
        });
      }

      var selectedValues = ms.find('option:selected').map(function(){ return $(this).val(); }).get();
      that.select(selectedValues, 'init');

      if (typeof that.options.afterInit === 'function') {
        that.options.afterInit.call(this, this.$container);
      }
    },

    'generateLisFromOption' : function(option, index, $container){
      var that = this,
          ms = that.$element,
          attributes = "",
          $option = $(option);

      for (var cpt = 0; cpt < option.attributes.length; cpt++){
        var attr = option.attributes[cpt];

        if(attr.name !== 'value' && attr.name !== 'disabled'){
          attributes += attr.name+'="'+attr.value+'" ';
        }
      }
      var selectableLi = $('<li '+attributes+'><span>'+that.escapeHTML($option.text())+'</span></li>'),
          selectedLi = selectableLi.clone(),
          value = $option.val(),
          elementId = that.sanitize(value);

      selectableLi
        .data('ms-value', value)
        .addClass('ms-elem-selectable')
        .attr('id', elementId+'-selectable');

      selectedLi
        .data('ms-value', value)
        .addClass('ms-elem-selection')
        .attr('id', elementId+'-selection')
        .hide();

      if ($option.attr('disabled') || ms.attr('disabled')){
        selectedLi.addClass(that.options.disabledClass);
        selectableLi.addClass(that.options.disabledClass);
      }

      var $optgroup = $option.parent('optgroup');

      if ($optgroup.length > 0){
        var optgroupLabel = $optgroup.attr('label'),
            optgroupId = that.sanitize(optgroupLabel),
            $selectableOptgroup = that.$selectableUl.find('#optgroup-selectable-'+optgroupId),
            $selectionOptgroup = that.$selectionUl.find('#optgroup-selection-'+optgroupId);

        if ($selectableOptgroup.length === 0){
          var optgroupContainerTpl = '<li class="ms-optgroup-container"></li>',
              optgroupTpl = '<ul class="ms-optgroup"><li class="ms-optgroup-label"><span>'+optgroupLabel+'</span></li></ul>';

          $selectableOptgroup = $(optgroupContainerTpl);
          $selectionOptgroup = $(optgroupContainerTpl);
          $selectableOptgroup.attr('id', 'optgroup-selectable-'+optgroupId);
          $selectionOptgroup.attr('id', 'optgroup-selection-'+optgroupId);
          $selectableOptgroup.append($(optgroupTpl));
          $selectionOptgroup.append($(optgroupTpl));
          if (that.options.selectableOptgroup){
            $selectableOptgroup.find('.ms-optgroup-label').on('click', function(){
              var values = $optgroup.children(':not(:selected, :disabled)').map(function(){ return $(this).val();}).get();
              that.select(values);
            });
            $selectionOptgroup.find('.ms-optgroup-label').on('click', function(){
              var values = $optgroup.children(':selected:not(:disabled)').map(function(){ return $(this).val();}).get();
              that.deselect(values);
            });
          }
          that.$selectableUl.append($selectableOptgroup);
          that.$selectionUl.append($selectionOptgroup);
        }
        index = index === undefined ? $selectableOptgroup.find('ul').children().length : index + 1;
        selectableLi.insertAt(index, $selectableOptgroup.children());
        selectedLi.insertAt(index, $selectionOptgroup.children());
      } else {
        index = index === undefined ? that.$selectableUl.children().length : index;

        selectableLi.insertAt(index, that.$selectableUl);
        selectedLi.insertAt(index, that.$selectionUl);
      }
    },

    'addOption' : function(options){
      var that = this;

      if (options.value !== undefined && options.value !== null){
        options = [options];
      } 
      $.each(options, function(index, option){
        if (option.value !== undefined && option.value !== null &&
            that.$element.find("option[value='"+option.value+"']").length === 0){
          var $option = $('<option value="'+option.value+'">'+option.text+'</option>'),
              $container = option.nested === undefined ? that.$element : $("optgroup[label='"+option.nested+"']"),
              index = parseInt((typeof option.index === 'undefined' ? $container.children().length : option.index));

          if (option.optionClass) {
            $option.addClass(option.optionClass);
          }

          if (option.disabled) {
            $option.prop('disabled', true);
          }

          $option.insertAt(index, $container);
          that.generateLisFromOption($option.get(0), index, option.nested);
        }
      });
    },

    'escapeHTML' : function(text){
      return $("<div>").text(text).html();
    },

    'activeKeyboard' : function($list){
      var that = this;

      $list.on('focus', function(){
        $(this).addClass('ms-focus');
      })
      .on('blur', function(){
        $(this).removeClass('ms-focus');
      })
      .on('keydown', function(e){
        switch (e.which) {
          case 40:
          case 38:
            e.preventDefault();
            e.stopPropagation();
            that.moveHighlight($(this), (e.which === 38) ? -1 : 1);
            return;
          case 37:
          case 39:
            e.preventDefault();
            e.stopPropagation();
            that.switchList($list);
            return;
          case 9:
            if(that.$element.is('[tabindex]')){
              e.preventDefault();
              var tabindex = parseInt(that.$element.attr('tabindex'), 10);
              tabindex = (e.shiftKey) ? tabindex-1 : tabindex+1;
              $('[tabindex="'+(tabindex)+'"]').focus();
              return;
            }else{
              if(e.shiftKey){
                that.$element.trigger('focus');
              }
            }
        }
        if($.inArray(e.which, that.options.keySelect) > -1){
          e.preventDefault();
          e.stopPropagation();
          that.selectHighlighted($list);
          return;
        }
      });
    },

    'moveHighlight': function($list, direction){
      var $elems = $list.find(this.elemsSelector),
          $currElem = $elems.filter('.ms-hover'),
          $nextElem = null,
          elemHeight = $elems.first().outerHeight(),
          containerHeight = $list.height(),
          containerSelector = '#'+this.$container.prop('id');

      $elems.removeClass('ms-hover');
      if (direction === 1){ // DOWN

        $nextElem = $currElem.nextAll(this.elemsSelector).first();
        if ($nextElem.length === 0){
          var $optgroupUl = $currElem.parent();

          if ($optgroupUl.hasClass('ms-optgroup')){
            var $optgroupLi = $optgroupUl.parent(),
                $nextOptgroupLi = $optgroupLi.next(':visible');

            if ($nextOptgroupLi.length > 0){
              $nextElem = $nextOptgroupLi.find(this.elemsSelector).first();
            } else {
              $nextElem = $elems.first();
            }
          } else {
            $nextElem = $elems.first();
          }
        }
      } else if (direction === -1){ // UP

        $nextElem = $currElem.prevAll(this.elemsSelector).first();
        if ($nextElem.length === 0){
          var $optgroupUl = $currElem.parent();

          if ($optgroupUl.hasClass('ms-optgroup')){
            var $optgroupLi = $optgroupUl.parent(),
                $prevOptgroupLi = $optgroupLi.prev(':visible');

            if ($prevOptgroupLi.length > 0){
              $nextElem = $prevOptgroupLi.find(this.elemsSelector).last();
            } else {
              $nextElem = $elems.last();
            }
          } else {
            $nextElem = $elems.last();
          }
        }
      }
      if ($nextElem.length > 0){
        $nextElem.addClass('ms-hover');
        var scrollTo = $list.scrollTop() + $nextElem.position().top - 
                       containerHeight / 2 + elemHeight / 2;

        $list.scrollTop(scrollTo);
      }
    },

    'selectHighlighted' : function($list){
      var $elems = $list.find(this.elemsSelector),
          $highlightedElem = $elems.filter('.ms-hover').first();

      if ($highlightedElem.length > 0){
        if ($list.parent().hasClass('ms-selectable')){
          this.select($highlightedElem.data('ms-value'));
        } else {
          this.deselect($highlightedElem.data('ms-value'));
        }
        $elems.removeClass('ms-hover');
      }
    },

    'switchList' : function($list){
      $list.blur();
      this.$container.find(this.elemsSelector).removeClass('ms-hover');
      if ($list.parent().hasClass('ms-selectable')){
        this.$selectionUl.focus();
      } else {
        this.$selectableUl.focus();
      }
    },

    'activeMouse' : function($list){
      var that = this;

      this.$container.on('mouseenter', that.elemsSelector, function(){
        $(this).parents('.ms-container').find(that.elemsSelector).removeClass('ms-hover');
        $(this).addClass('ms-hover');
      });

      this.$container.on('mouseleave', that.elemsSelector, function () {
        $(this).parents('.ms-container').find(that.elemsSelector).removeClass('ms-hover');
      });
    },

    'refresh' : function() {
      this.destroy();
      this.$element.multiSelect(this.options);
    },

    'destroy' : function(){
      $("#ms-"+this.$element.attr("id")).remove();
      this.$element.off('focus');
      this.$element.css('position', '').css('left', '');
      this.$element.removeData('multiselect');
    },

    'select' : function(value, method){
      if (typeof value === 'string'){ value = [value]; }

      var that = this,
          ms = this.$element,
          msIds = $.map(value, function(val){ return(that.sanitize(val)); }),
          selectables = this.$selectableUl.find('#' + msIds.join('-selectable, #')+'-selectable').filter(':not(.'+that.options.disabledClass+')'),
          selections = this.$selectionUl.find('#' + msIds.join('-selection, #') + '-selection').filter(':not(.'+that.options.disabledClass+')'),
          options = ms.find('option:not(:disabled)').filter(function(){ return($.inArray(this.value, value) > -1); });

      if (method === 'init'){
        selectables = this.$selectableUl.find('#' + msIds.join('-selectable, #')+'-selectable'),
        selections = this.$selectionUl.find('#' + msIds.join('-selection, #') + '-selection');
      }

      if (selectables.length > 0){
        selectables.addClass('ms-selected').hide();
        selections.addClass('ms-selected').show();

        options.attr('selected', 'selected');

        that.$container.find(that.elemsSelector).removeClass('ms-hover');

        var selectableOptgroups = that.$selectableUl.children('.ms-optgroup-container');
        if (selectableOptgroups.length > 0){
          selectableOptgroups.each(function(){
            var selectablesLi = $(this).find('.ms-elem-selectable');
            if (selectablesLi.length === selectablesLi.filter('.ms-selected').length){
              $(this).find('.ms-optgroup-label').hide();
            }
          });

          var selectionOptgroups = that.$selectionUl.children('.ms-optgroup-container');
          selectionOptgroups.each(function(){
            var selectionsLi = $(this).find('.ms-elem-selection');
            if (selectionsLi.filter('.ms-selected').length > 0){
              $(this).find('.ms-optgroup-label').show();
            }
          });
        } else {
          if (that.options.keepOrder && method !== 'init'){
            var selectionLiLast = that.$selectionUl.find('.ms-selected');
            if((selectionLiLast.length > 1) && (selectionLiLast.last().get(0) != selections.get(0))) {
              selections.insertAfter(selectionLiLast.last());
            }
          }
        }
        if (method !== 'init'){
          ms.trigger('change');
          if (typeof that.options.afterSelect === 'function') {
            that.options.afterSelect.call(this, value);
          }
        }
      }
    },

    'deselect' : function(value){
      if (typeof value === 'string'){ value = [value]; }

      var that = this,
          ms = this.$element,
          msIds = $.map(value, function(val){ return(that.sanitize(val)); }),
          selectables = this.$selectableUl.find('#' + msIds.join('-selectable, #')+'-selectable'),
          selections = this.$selectionUl.find('#' + msIds.join('-selection, #')+'-selection').filter('.ms-selected').filter(':not(.'+that.options.disabledClass+')'),
          options = ms.find('option').filter(function(){ return($.inArray(this.value, value) > -1); });

      if (selections.length > 0){
        selectables.removeClass('ms-selected').show();
        selections.removeClass('ms-selected').hide();
        options.removeAttr('selected');

        that.$container.find(that.elemsSelector).removeClass('ms-hover');

        var selectableOptgroups = that.$selectableUl.children('.ms-optgroup-container');
        if (selectableOptgroups.length > 0){
          selectableOptgroups.each(function(){
            var selectablesLi = $(this).find('.ms-elem-selectable');
            if (selectablesLi.filter(':not(.ms-selected)').length > 0){
              $(this).find('.ms-optgroup-label').show();
            }
          });

          var selectionOptgroups = that.$selectionUl.children('.ms-optgroup-container');
          selectionOptgroups.each(function(){
            var selectionsLi = $(this).find('.ms-elem-selection');
            if (selectionsLi.filter('.ms-selected').length === 0){
              $(this).find('.ms-optgroup-label').hide();
            }
          });
        }
        ms.trigger('change');
        if (typeof that.options.afterDeselect === 'function') {
          that.options.afterDeselect.call(this, value);
        }
      }
    },

    'select_all' : function(){
      var ms = this.$element,
          values = ms.val();

      ms.find('option:not(":disabled")').attr('selected', 'selected');
      this.$selectableUl.find('.ms-elem-selectable').filter(':not(.'+this.options.disabledClass+')').addClass('ms-selected').hide();
      this.$selectionUl.find('.ms-optgroup-label').show();
      this.$selectableUl.find('.ms-optgroup-label').hide();
      this.$selectionUl.find('.ms-elem-selection').filter(':not(.'+this.options.disabledClass+')').addClass('ms-selected').show();
      this.$selectionUl.focus();
      ms.trigger('change');
      if (typeof this.options.afterSelect === 'function') {
        var selectedValues = $.grep(ms.val(), function(item){
          return $.inArray(item, values) < 0;
        });
        this.options.afterSelect.call(this, selectedValues);
      }
    },

    'deselect_all' : function(){
      var ms = this.$element,
          values = ms.val();

      ms.find('option').removeAttr('selected');
      this.$selectableUl.find('.ms-elem-selectable').removeClass('ms-selected').show();
      this.$selectionUl.find('.ms-optgroup-label').hide();
      this.$selectableUl.find('.ms-optgroup-label').show();
      this.$selectionUl.find('.ms-elem-selection').removeClass('ms-selected').hide();
      this.$selectableUl.focus();
      ms.trigger('change');
      if (typeof this.options.afterDeselect === 'function') {
        this.options.afterDeselect.call(this, values);
      }
    },

    sanitize: function(value){
      var hash = 0, i, character;
      if (value.length == 0) return hash;
      var ls = 0;
      for (i = 0, ls = value.length; i < ls; i++) {
        character  = value.charCodeAt(i);
        hash  = ((hash<<5)-hash)+character;
        hash |= 0; // Convert to 32bit integer
      }
      return hash;
    }
  };

  /* MULTISELECT PLUGIN DEFINITION
   * ======================= */

  $.fn.multiSelect = function () {
    var option = arguments[0],
        args = arguments;

    return this.each(function () {
      var $this = $(this),
          data = $this.data('multiselect'),
          options = $.extend({}, $.fn.multiSelect.defaults, $this.data(), typeof option === 'object' && option);

      if (!data){ $this.data('multiselect', (data = new MultiSelect(this, options))); }

      if (typeof option === 'string'){
        data[option](args[1]);
      } else {
        data.init();
      }
    });
  };

  $.fn.multiSelect.defaults = {
    keySelect: [32],
    selectableOptgroup: false,
    disabledClass : 'disabled',
    dblClick : false,
    keepOrder: false,
    cssClass: ''
  };

  $.fn.multiSelect.Constructor = MultiSelect;

  $.fn.insertAt = function(index, $parent) {
    return this.each(function() {
      if (index === 0) {
        $parent.prepend(this);
      } else {
        $parent.children().eq(index - 1).after(this);
      }
    });
};

}(window.jQuery);


</script>



  <script type="text/javascript">
  // run pre selected options
  $('#pre-selected-options').multiSelect();
  </script>