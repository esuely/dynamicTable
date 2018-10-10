<?php 
	session_start();

	$idimg=$_POST['valor'];

	$_SESSION['consulta']=$idimg;

	echo $idimg;

 ?>