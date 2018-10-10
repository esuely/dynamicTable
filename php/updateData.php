<?php 
	require_once "conection.php";
	$conection=conection();
	$id=$_POST['id'];
	$d=$_POST['description'];

	$sql="UPDATE t_images set description='$d'
				where id='$id'";
	echo $result=mysqli_query($conection,$sql);

 ?>