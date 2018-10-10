
<?php 
	session_start();
	require_once "../php/conection.php";
	$conection=conection();

 ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Images List</h2>
		<table class="table table-hover table-condensed table-bordered" id="tableData">
		<caption>
			<button id="additembutton" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Add new item 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<thead>
				<tr>
					<td>Description</td>
					<td>Image</td>
					<td>Edit</td>
					<td>Delete</td>
				</tr>
			</thead>
			<tbody>

			<?php 

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idimg=$_SESSION['consulta'];
						$sql="SELECT id,description,url 
						from t_images where id='$idimg'";
					}else{
						$sql="SELECT id,description,url 
						from t_images";
					}
				}else{
					$sql="SELECT id,description,url 
						from t_images";
				}

				$result=mysqli_query($conection,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$data=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2];
			 ?>

				<tr>
					<td><?php echo $ver[1] ?></td>
					<td><img src="files/<?php echo $ver[2] ?>" width="60px" height="60px"/></td>
					<td>
						<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion" onclick="addForm('<?php echo $data ?>')">
							
						</button>
					</td>
					<td>
						<button class="btn btn-danger glyphicon glyphicon-remove" 
						onclick="yesOrNot('<?php echo $ver[0] ?>')">
							
						</button>
					</td>
				</tr>
			
			<?php 
		}
			 ?>
			</tbody>
		</table>
	</div>
	<div>Total items: <span class="totalItems"></span></div>
</div>

<script>

	var totalItems = $("#tableData > tbody").children().length;
	$('.totalItems').html(totalItems);
	
	$('table tbody').sortable({
	    helper: fixWidthHelper
	}).disableSelection();
	function fixWidthHelper(e, ui) {
	    ui.children().each(function() {
	        $(this).width($(this).width());
	    });
	    return ui;
	}

	$('#additembutton').click(function(){
	    $('#description').val('');
	    $('#url').val('');
	});


</script>