<?php 
  session_start();

  unset($_SESSION['consulta']);

 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Lista de imágenes</title>
	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="libraries/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="libraries/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="libraries/select2/css/select2.css">
</head>
<body>

	<div class="container">
		<div id="table"></div>
	</div>

	<!-- Modal for new items -->


<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add new image</h4>
      </div>
      <div class="modal-body">
        <form enctype="multipart/form-data" class="formulario">
          <label>Description</label>
          <input type="text" name="description" id="description" class="form-control input-sm">
          <label>File image</label>
          <input type="file" name="url" id="url" class="form-control input-sm">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="addnewbutton">
          Add
        </button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for update item -->

<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Update item</h4>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="idimage" name="">
        	<label>Description</label>
        	<input type="text" name="" id="descriptionu" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="updatedatabutton" data-dismiss="modal">Update</button>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
<script src="js/functions.js"></script>
<script src="libraries/bootstrap/js/bootstrap.js"></script>
<script src="libraries/alertifyjs/alertify.js"></script>
<script src="libraries/select2/js/select2.js"></script>

<script>
	$(document).ready(function(){    

		$('#table').load('components/table.php');

    var fileExtension = "";
    var urlValue = "";
    //function to get the file information
    $(':file').change(function()
    {
      var file = $("#url")[0].files[0];
      var fileName = file.name;
      urlValue = fileName;

    });

    $('#addnewbutton').click(function(){

      description=$('#description').val();
      addData(description,urlValue);

      var formData = new FormData($(".formulario")[0]);
      $.ajax({
          url: 'upload.php',  
          type: 'POST',
          data: formData,
          cache: false,
          contentType: false,
          processData: false
      });
    });
    
    $('#updatedatabutton').click(function(){
      updateData();
    });
	});
</script>