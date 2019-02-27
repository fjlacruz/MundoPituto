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
  



<style type="text/css">
a {
  display: block;
  margin-bottom: 1em;
  color: black;
}
a:visited { 
  color: grey;
}
</style>


<div class="container">
  <div class="element">
    <a href="#.dfdsdsdfd">Link that doesn't go anywhere.</a>
    <a href="#fdfdssdsfid.s.">Internal Link.</a>
    
  </div>
</div>