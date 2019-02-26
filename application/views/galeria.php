


<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8>


<style type="text/css">
* {
  font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif
}
.main {
  margin:auto;

  width:70%;
  text-align:left;
  padding:30px;
  background:#fff
}
input[type=submit] {
  background:#6ca16e;
  width:100%;
  padding:5px 15px;
  background:#ccc;
  cursor:pointer;
  font-size:16px;
}
input[type=text] {
  width:40%;
  padding:5px 15px;
  height:25px;
  font-size:16px;
}
.form-control {
  padding: 0px 0px;
}
</style>
</head>
<body>
<br>
<div class="main">
  
  <div class="panel panel-primary">
    <div class="panel-body">
      <form name="formulario" id="formulario" method="post" action="cargar_galeria" enctype="multipart/form-data">
        <h4 class="text-center"><strong>Crear Galer&iacute;a para la Categor&iacute;a: <?php echo $categ; ?>  
         <strong></h4></br>
        <div class="form-group">
          <div class="col-sm-2">&nbsp;</div>   
          <div class="col-sm-8">
            <input type="file" class="form-control" id="foto[]" name="foto[]" multiple=""
            onchange="return fileValidation()">
            <input type="hidden" class="form-control" id="categoria" name="categoria" value="<?php echo $categoria; ?>">
          </div>
          <button type="submit" class="btn bg-navy">Cargar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>





<script>
   $(document).ready(function () {
       $('#formulario').formValidation({
           framework: 'bootstrap',
           excluded: ':disabled',
           fields: {
               'foto[]': {
                   row: '.col-sm-8',
                   validators: {
                       notEmpty: {
                           message: 'CAMPO OBLIGATORIO'
                       }
                   }
               }
           }
       });
   });

   function fileValidation(){
       var fileInput = document.getElementById('foto[]');
       var filePath = fileInput.value;
       var allowedExtensions = /(.jpg|.jpeg|.png|.gif|.gif)$/i;
       if(!allowedExtensions.exec(filePath)){
           
           alertify.error("Formato Incorrecto  (Seleccione un archivo jpg,jpeg,png,gif)...!!");
           fileInput.value = '';
           return false;
       }else{
           //Image preview
           if (fileInput.files && fileInput.files[0]) {
               var reader = new FileReader();
               reader.onload = function(e) {
                   document.getElementById('imagePreview').innerHTML = '<img width="100" height="100" src="'+e.target.result+'"/>';
               };
               reader.readAsDataURL(fileInput.files[0]);
           }
       }
   }
</script>