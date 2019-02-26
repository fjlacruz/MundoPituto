<!-- <select id="tipoUsuario" name="tipoUsuario" class="form-control" onchange="cargarTipoUsuario()">
    <option value="0">Selecciona un Paquete</option>
    <option value="1">Paquete 1</option>
    <option value="2">Paquete 2</option>
    <option value="3">Paquete 3</option>
</select>
</p>

<div id="usWeb" style="display:none;">usWeb</div>
<div id="UsTerr" style="display:none;">UsTerr</div>
<div id="UsWebTerr" style="display:none;">UsWebTerr</div>

<script type="text/javascript">
    function cargarTipoUsuario() {
        var tipoUsuario = document.getElementById("tipoUsuario").value;
        if (tipoUsuario == 1) {
            document.getElementById('usWeb').style.display = 'block';
            document.getElementById('UsTerr').style.display = 'none';
            document.getElementById('UsWebTerr').style.display = 'none';
        } else if (tipoUsuario == 2) {
            document.getElementById('usWeb').style.display = 'none';
            document.getElementById('UsTerr').style.display = 'block';
            document.getElementById('UsWebTerr').style.display = 'none';
        } else {
            document.getElementById('usWeb').style.display = 'none';
            document.getElementById('UsTerr').style.display = 'none';
            document.getElementById('UsWebTerr').style.display = 'block';
        } 

    }
</script>  -->











<div class="container" style="width: 95%">
<div class="row">
 <form action="#" method="post">
<div class="col-md-12" align="center"><strong><h3> Ingreso de Usuarios </h3></strong></div>
    <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-12" align="center">Datos Comunes</div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Usuario de Red</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputuserRed" name="inputuserRed" placeholder="Usuario de Red" maxlength="35" >
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Nombres</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputnombre" name="inputnombre" placeholder="Nombres"  maxlength="35" >
                </div>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Apellidos</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputApellido" name="inputApellido" placeholder="Apellidos"  maxlength="35" >
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Email</label>
                <div class="col-sm-9">
                    <input type="Email" class="form-control" id="inputemail" name="inputemail" placeholder="Email" maxlength="60">
                </div>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Estado</label>
                <div class="col-sm-9">
                    <select class="form-control" id="selectEstado" name="selectEstado">
                    <option value="0">Seleccione un Estado</option>
                    <option value="Activo">Activo</option>
                    <option value="Suspendido">Suspendido</option>
                </select>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-12" align="center">Estructura Organizativa Gerenciales</div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Empresa</label>
                <div class="col-sm-9">
                    <select class="form-control" id="selectempresa" name="selectempresa">
                    <option value="0">Seleccione una opción</option>
                    <?php foreach ($data["empresas"] as $var) {
                        ?>
                        <option value=<?php echo $var['idemp']; ?>><?php echo $var['Empresa']; ?></option>
                        <?php
                    }
                    ?>
                </select>
                </div>
            </div>
        </div>  
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Dirección</label>
                <div class="col-sm-9">
                    <select class="form-control" id="selecDireccion" name="selecDireccion">
                    <option value="0">Seleccione una Direccion</option>
                    <?php foreach ($data["direccion"] as $row) {
                        ?>
                        <option value="<?php echo $row['Direccion_cd']; ?>">
                            <?php echo $row['Direccion']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                </div>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="left">Gerencia</label>
                <div class="col-sm-9">
                    <select class="form-control" id="selecGerencia" name="selecGerencia">
                    <option value="">Seleccione una Gerencia</option>
                    <?php foreach ($data["gerencia"] as $row) {
                        ?>
                        <option data-parent="<?php echo $row['parent']; ?>" value="<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Jefatura</label>
                <div class="col-sm-9">
                    <select class="form-control" id="selecJefatura" name="selecJefatura">
                    <option value="">Seleccione una Jefatura</option>
                    <?php foreach ($data["jefatura"] as $row) {
                        ?>
                        <option data-parent="<?php echo $row['parent']; ?>" value="<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                </div>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Célula</label>
                <div class="col-sm-9">
                    <select class="form-control" id="selecCelula" name="selecCelula">
                    <option value="">Seleccione una Celula</option>
                    <?php foreach ($data["celula"] as $row) {
                        ?>
                        <option data-parent="<?php echo $row['parent']; ?>" value="<?php echo $row['id']; ?>">
                            <?php echo $row['name']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">IMEI</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputimei" placeholder="IMEI" maxlength="15">
                </div>
            </div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Tipo de Usuario</label>
                <div class="col-sm-9">
                     <select id="tipoUsuario" name="tipoUsuario" class="form-control" onchange="cargarTipoUsuario()">
                    <option value="0">Seleccione</option>
                    <option value="1">Usuario Web</option>
                    <option value="2">Usuario Terreno</option>
                    <option value="3">Usuario Web/Terreno</option>
                </select>
                </div>
            </div>
        </div>
<!--==========================================================================================================================================-->  
 <!--============================================Div de datos del usuario web =================================================================--> 
 <!--==========================================================================================================================================-->      
        <div id="usWeb" style="display:none;">
         <div class="col-md-12" align="center">&nbsp;</div>
         <div class="col-md-12" align="center">Datos Para Usuario Web</div>
         <div class="col-md-12" align="center">&nbsp;</div>
         <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Perfil</label>
                <div class="col-sm-9">
                     <select class="form-control" id="selectperfil">
                        <option value="NOK">Seleccione una opción</option>
                        <?php foreach ($data["perfil"] as $var3) {
                            ?>
                            <option value=<?php echo $var3['idperfil'];?>><?php echo $var3['dnperfil']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Quiebres</label>
                <div class="col-sm-9">
                     <?php if ($data['dynamicForm'] != "NOK"){ ?>
                        <form id="formid" action="" method="post">
                            <?php foreach ($data['dynamicForm'] as $value) { ?>
                                <div class="col-sm-4"><label >
                                        <input type="checkbox" value="<? echo $value[0] ?>">
                                        <?php echo $value[1] ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </form>
                    <?php } else { ?>
                        <div> No hay datos, contacte a soporte...</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">&nbsp;</label>
                <div class="col-sm-9">
                    <label class="switch">
                            <input id="usrConf" class="sw config-values" id="notification-trigger" type="checkbox" disabled="">
                            <div class="slider"></div>
                        </label>
                        <label class="switch" style="width: 50%">
                        Técnico Autonomo
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-3" align="center">&nbsp;</div>
                <div class="col-sm-3">
                    <a class="btn btn-danger btn-block" id="btnCancelar" href="<?=site_url("usuario_service")?>">
                            <i class="fa fa-chevron-left"></i>
                            Volver
                        </a>
                </div>    
                <div class="col-sm-3" align="left">
                    <button type="submit"  class="btn btn-warning btn-block" id="IngresaUsuWeb">
                            <i class="fa fa-user-plus"></i>
                            Crear
                        </button>
                </div>
            </div>
        </div>
    </div>
 <!--==========================================================================================================================================-->  
 <!--============================================Div de datos del usuario terreno =============================================================--> 
 <!--==========================================================================================================================================-->  
    <div id="UsTerr" style="display:none;">
         <div class="col-md-12" align="center">&nbsp;</div>
         <div class="col-md-12" align="center">Datos Para Usuario Terreno</div>
         <div class="col-md-12" align="center">&nbsp;</div>
         <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Resource ID</label>
                <div class="col-sm-9">
                     <input type="text" class="form-control"  id="resourceTOA" placeholder="Resource ID" maxlength="15">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Quiebres</label>
                <div class="col-sm-9">
                     <?php if ($data['dynamicForm'] != "NOK"){ ?>
                        <form id="formid" action="" method="post">
                            <?php foreach ($data['dynamicForm'] as $value) { ?>
                                <div class="col-sm-4"><label >
                                        <input type="checkbox" value="<? echo $value[0] ?>">
                                        <?php echo $value[1] ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </form>
                    <?php } else { ?>
                        <div> No hay datos, contacte a soporte...</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">&nbsp;</label>
                <div class="col-sm-9">
                    <label class="switch">
                            <input id="usrConf" class="sw config-values" id="notification-trigger" type="checkbox" checked>
                            <div class="slider"></div>
                        </label>
                        <label class="switch" style="width: 50%">
                        Técnico Autonomo
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-3" align="center">&nbsp;</div>
                <div class="col-sm-3">
                    <a class="btn btn-danger btn-block" id="btnCancelar" href="<?=site_url("usuario_service")?>">
                            <i class="fa fa-chevron-left"></i>
                            Volver
                        </a>
                </div>    
                <div class="col-sm-3" align="left">
                    <button type="submit"  class="btn btn-warning btn-block" id="IngresaUsuWebsss">
                            <i class="fa fa-user-plus"></i>
                            Crear 
                        </button>

                </div>
            </div>
        </div>
    </div>
<!--==========================================================================================================================================-->  
 <!--============================================Div de datos del usuario terreno y web =============================================================--> 
 <!--==========================================================================================================================================-->
  <div id="UsWebTerr" style="display:none;">
         <div class="col-md-12" align="center">&nbsp;</div>
         <div class="col-md-12" align="center">Datos para Usuario Web/Terreno</div>
         <div class="col-md-12" align="center">&nbsp;</div>
         <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Perfil</label>
                <div class="col-sm-9">
                     <select class="form-control" id="selectperfil">
                <option value="NOK">Seleccione</option>
                <?php foreach ($data["perfil"] as $var3) {
                    ?>
                    <option value=<?php echo $var3['idperfil'];?>><?php echo $var3['dnperfil']; ?></option>
                    <?php
                }
                ?>
            </select>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Resource ID</label>
                <div class="col-sm-9">
                     <input type="text" class="form-control"  id="resourceTOA" placeholder="Resource ID" maxlength="15">
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">Quiebres</label>
                <div class="col-sm-9">
                     <?php if ($data['dynamicForm'] != "NOK"){ ?>
                        <form id="formid" action="" method="post">
                            <?php foreach ($data['dynamicForm'] as $value) { ?>
                                <div class="col-sm-4"><label >
                                        <input type="checkbox" value="<? echo $value[0] ?>">
                                        <?php echo $value[1] ?>
                                    </label>
                                </div>
                            <?php } ?>
                        </form>
                    <?php } else { ?>
                        <div> No hay datos, contacte a soporte...</div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-sm-3 control-label" align="right">&nbsp;</label>
                <div class="col-sm-9">
                    <label class="switch">
                            <input id="usrConf" class="sw config-values" id="notification-trigger" type="checkbox" checked>
                            <div class="slider"></div>
                        </label>
                        <label class="switch" style="width: 50%">
                        Técnico Autonomo
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-12" align="center">&nbsp;</div>
        <div class="col-md-12">
            <div class="form-group">
                <div class="col-md-3" align="center">&nbsp;</div>
                <div class="col-sm-3">
                    <a class="btn btn-danger btn-block" id="btnCancelar" href="<?=site_url("usuario_service")?>">
                            <i class="fa fa-chevron-left"></i>
                            Volver
                        </a>
                </div>    
                <div class="col-sm-3" align="left">
                    <button type="submit"  class="btn btn-warning btn-block" id="IngresaUsuWebss">
                            <i class="fa fa-user-plus"></i>
                            Crear
                        </button>
                </div>
            </div>
        </div>
    </div>
 </div>
 
</div>


<div class="container" style="width: 95%">
<div class="row">
    <div class="col-md-12" align="center">&nbsp;</div>
        <div class="form-group" id="botones">
            <div class="col-md-3" align="center">&nbsp;</div>
                <div class="col-sm-3">
                    <a class="btn btn-danger btn-block" id="btnCancelar" href="<?=site_url("usuario_service")?>">
                       <i class="fa fa-chevron-left"></i>
                        Volver
                     </a>
                 </div>    
            <div class="col-sm-3" align="left">
                <button type="submit"  class="btn btn-warning btn-block" id="IngresaUsuWeb" disabled="">
                    <i class="fa fa-user-plus"></i>
                         Crear general
                </button>
            </div>
        </div>
 </div> 
</div> 
</form>
 

<form id="userForm" name="userForm">
    <input type="text" name="nombre" id="nombre">
    <button type="submit" class="btn bg-navy"><i class="fa fa-check"></i> Finalizar</button>


</form>





<script type="text/javascript">
 $(document).ready(function() {
   $('#userForm').formValidation({
         
   }).on('success.form.fv', function(e) {
   e.preventDefault();
   var $form = $(e.target);
   $.ajax({
       url: "<?php echo base_url() . 'Solicitudes/finalizar_solicitud'; ?>",
       method: 'POST',
       data: $form.serialize()
   }).success(function(response) {
       alertify.log("Solicitud finalizada...!!"); 
       $('#formularios').formValidation('resetForm');
       $('#formularios')[0].reset();
       setInterval(function() {
          window.location.href = $("#redireccion_mensaje").val();
          }, 2000);
       });
     });
   }); 
</script>





<script type="text/javascript">
    function cargarTipoUsuario() {
        var tipoUsuario = document.getElementById("tipoUsuario").value;
        if (tipoUsuario == 1) {
            document.getElementById('usWeb').style.display = 'block';
            document.getElementById('UsTerr').style.display = 'none';
            document.getElementById('UsWebTerr').style.display = 'none';
            document.getElementById('botones').style.display = 'none';
        } else if (tipoUsuario == 2) {
            document.getElementById('usWeb').style.display = 'none';
            document.getElementById('UsTerr').style.display = 'block';
            document.getElementById('UsWebTerr').style.display = 'none';
            document.getElementById('botones').style.display = 'none';
        } else if (tipoUsuario == 3) {
            document.getElementById('usWeb').style.display = 'none';
            document.getElementById('UsTerr').style.display = 'none';
            document.getElementById('UsWebTerr').style.display = 'block';
            document.getElementById('botones').style.display = 'none';
        }else{
            document.getElementById('usWeb').style.display = 'none';
            document.getElementById('UsTerr').style.display = 'none';
            document.getElementById('UsWebTerr').style.display = 'none';
            document.getElementById('botones').style.display = 'block';
        }

    }
</script>


<script type="text/javascript">
     $(document).ready(function() {
        $("#IngresaUsuWeb").click(function(e) {
            e.preventDefault();
            var userRed = $("#inputuserRed").val();
            var email = $("#email").val();
            var msg = $("#msg").val();
            if (!(name == '' || email == '' || msg == ''))
            {
                alert("Envio datos.");
            }
            else
            {
                $("#submitdata").empty();
                $("#submitdata").append("Name: " + name + "<br/>Email: " + email + "<br/>Message: " + msg);
            }

        });
    });
</script>

