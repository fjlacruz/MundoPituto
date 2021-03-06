

<div class="col-sm-12"  id='resultado_msj'></div>
<div class='filterable'>
    <div class='panel-heading'>
        <div class='pull-right'>
             <span tooltip="Filtrar">
            <button class='btn bg-navy btn-xs btn-filter btn-circle'><span class='fa fa-filter'></span></button>
        </span>
        </div>
    </div>

    <table id="nueva" class="display" cellspacing="0" width="100%" >

        <thead align='center' >
            <tr class="filters" >
                <th style="display:none">id_usuario</th>
                <th onkeypress="return soloLetras(event)" align='center'>Perfil</th>
                <th onkeypress="return soloNumeros(event)" align='center'>Identificaci&oacute;n</th>
                <th onkeypress="return soloLetras(event)" align='center'>Nombre</th>
                <th onkeypress="return soloLetras(event)" align='center'>Usuario</th>
                <th onkeypress="return soloLetras(event)" align='center'>Estatus</th>
                <th onkeypress="return soloLetras(event)" align='center'>Editar</th>
                
            </tr>
        </thead>

        <?php
        if ($resultados != "") {
           $contenido = "";
           foreach ($resultados as $resultado) {
            $contenido.="<tr>      
            <td style='display:none'>" . "$resultado->id_usuario" . "</td>
            <td align='center'>" .  "$resultado->descripcion_perfil" . "</td>
            <td align='center'>" .  "$resultado->cedula" . "</td>
            <td align='center' class='text-uppercase'>" .  "$resultado->nombres" . " </td>
            <td align='center' class='text-uppercase'>" .  "$resultado->usuario" . "</td>
            <td align='center'>" .  "$resultado->estatus" . "</td>
            <td align='center'> <span tooltip='Editar' flow='left'><button type='button' data-id='$resultado->id_usuario' class='btn bg-navy btn-circle editButton' onclick='myFunction(3)'>
            <span class='fa  fa-pencil-square-o'></span>
            </button></span>
            <span tooltip='Eliminar' flow='left'><button type='button' data-id='$resultado->id_usuario' class='btn bg-navy btn-circle deleteButton'>
             <span class='fa  fa-close'></span>
             </button></span></td>
            </tr>";
        }
    } else {
      $contenido = '
      </div>
      <div class="alert alert-danger">
      <strong>No se Encontraron datos para esta busquedad!</strong>
      <a class="alert-link" href="#">Volver a consultar.</a>
      </div>';
  }
  ?>

  <tbody>                  
    <?php echo $contenido;?>    
</tbody>
</table>

</div>


<script>
    // Validar si existe correo y usuario en la modal

    $(document).on("blur", '#correo_modal', function() {
        var dataUser = {
            "cedula": $("#cedula_modal").val(),
            "correo": $("#correo_modal").val()

        };
        $.ajax({
            url: "<?php echo base_url() . 'index.php/consultas/existe_correo_cedula'; ?>",
            data: dataUser,
            dataType: 'html',
            type: 'post',
            success: function(respuesta) {
                if (respuesta == 1)
                {
                    $('#userForm').formValidation('resetForm');
                    $('#correo_modal').val('');
                    $("#resultado_modal").html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert'>&times;</button><i class='icon fa fa-ban'></i> Correo ya registrado</div>");
                }
            }
        });
    });

    $(document).on("blur", '#usuario_modal', function() {
        var dataUser = {
            "cedula": $("#cedula_modal").val(),
            "usuario": $("#usuario_modal").val()
        };
        $.ajax({
            url: "<?php echo base_url() . 'index.php/consultas/existe_usuario_cedula'; ?>",
            data: dataUser,
            dataType: 'html',
            type: 'post',
            success: function(respuesta) {
                if (respuesta == 1)
                {
                    $('#userForm').formValidation('resetForm');
                    $('#usuario_modal').val('');
                    $("#resultado_modal").html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><i class='icon fa fa-ban'></i> Nombre de Usuario No Disponible</div>");
                }
            }
        });
    });
</script>

<script>
            function alerta(){
                //un alert
                alertify.alert("<b>Blog Reaccion Estudio</b> probando Alertify", function () {
                    //aqui introducimos lo que haremos tras cerrar la alerta.
                    //por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
                });
            }
            
            function confirmar(){
                //un confirm
                alertify.confirm("<p>Aquí confirmamos algo.<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
                    if (e) {
                        alertify.success("Has pulsado '" + alertify.labels.ok + "'");
                    } else { alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
                    }
                }); 
                return false
            }
            
            function datos(){
                //un prompt
                alertify.prompt("Esto es un <b>prompt</b>, introduce un valor:", function (e, str) { 
                    if (e){
                        alertify.success("Has pulsado '" + alertify.labels.ok + "'' e introducido: " + str);
                    }else{
                        alertify.error("Has pulsado '" + alertify.labels.cancel + "'");
                    }
                });
                return false;
            }
            
            function notificacion(){
                alertify.log("Esto es una notificación cualquiera."); 
                return false;
            }
            
            function ok(){
                alertify.success("Visita nuestro <a href=\"http://blog.reaccionestudio.com/\" style=\"color:white;\" target=\"_blank\"><b>BLOG.</b></a>"); 
                return false;
            }
            
            function error(){
                alertify.error("Usuario o constraseña incorrecto/a."); 
                return false; 
            }
        </script>


<script type="text/javascript">

    $(document).ready(function() {
        $('#userForm').formValidation({
           
        }).on('success.form.fv', function(e) {
            e.preventDefault();
            var $form = $(e.target);
            $.ajax({
                url: "<?php echo base_url() . 'index.php/administracion/actualizar_usuario'; ?>",
                method: 'POST',
                data: $form.serialize()
            }).success(function(response) {
//======== Script para notfificaciones push =============================//
            Push.create("Notificacion Push",{
            body: "Este es el cuerpo de la notificacion",
            icon: "<?php echo base_url(); ?>application/recursos/imagenes/icon_64.png",
            //timeout: 12000,
            requireInteraction: true,// para dejar la notificacion fija hasta que el usuario la cierre manualmente
            onClick: function () {
                window.location="https://nickersoft.github.io/push.js/";
                this.close();
            }
        });
             alertify.log("Usuario Actualizado...!!!"); 
                return false;
             $('#formulario')[0].reset();
                myFunction(1)
                reload_table();
            });
        });
    });
    $('.editButton').on('click', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: "<?php echo base_url() . 'index.php/consultas/consultar_usuario_id/'; ?>" + id,
            method: 'GET'

        }).success(function(data) {

             var obj1 = JSON.parse(data);//parceamos los datos
             var obj = eval("(" + JSON.stringify(obj1) + ")");// limpiamos el json
             
            $('#userForm')
            $('[name="id"]').val(obj.id_usuario);
            $('[name="cedula_modal"]').val(obj.cedula);
            $('[name="nombres_modal"]').val(obj.nombres);
            $('[name="usuario_modal"]').val(obj.usuario);
            $('[name="correo_modal"]').val(obj.correo);
            $('[name="rol_modal"]').val(obj.rol);
            $('[name="estatus_modal"]').val(obj.estatus);
            $('[name="id_comunidad_modal"]').val(obj.id_comunidad);
            
        });
    });

</script>

<script type="text/javascript">
   $(document).ready(function() {
   $('.deleteButton').on('click', function() {
       var id = $(this).attr('data-id');
       $.ajax({
           url: "<?php echo base_url() . 'index.php/administracion/eliminar_usuario/'; ?>" + id,
           method: 'POST'
   
       }).success(function(response) {
            alertify.log("Usuario Eliminado...!!!"); 
            $('#formulario')[0].reset();
               myFunction(1)
               reload_table();
           });
       });
   });
</script>

<script>

    $('#nueva thead th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control text-center"  placeholder="' + title + '" disabled  />');
    });
    // DataTable
    var table = $('#nueva').DataTable({
        "scrollY": "500px",
        "scrollCollapse": true,
        "paging": true,
        "order": [[ 0, 'desc' ], [ 2, 'desc' ]],
        retrieve: true
    });
    //Apply the search
    table.columns().every(function() {
        var that = this;
        $('input', this.header()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }
        });
    });

    $(document).ready(function() {
        $('.filterable .btn-filter').click(function() {
            var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });
        $('.filterable .filters input').keyup(function(e) {

            var code = e.keyCode || e.which;
            if (code == '9')
                return;
            var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');
            var $filteredRows = $rows.filter(function() {
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            $table.find('tbody .no-result').remove();
            $rows.show();
            $filteredRows.hide();
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No se encontraron Registros con ese Parametro</td></tr>'));
            }
        });
    });
</script>


