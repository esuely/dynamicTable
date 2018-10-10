
<?php 
	require_once "conection.php";
	$conection=conection();
	$id=$_POST['id'];

	$sql="DELETE from t_images where id='$id'";
	echo $result=mysqli_query($conection,$sql);
 ?>