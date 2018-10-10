<?php 

	require_once "conection.php";
	$conection=conection();
	$d=$_POST['description'];
	$u=$_POST['url'];

	$sql="INSERT into t_images (description,url)
								values ('$d','$u')";
	echo $result=mysqli_query($conection,$sql);

 ?>