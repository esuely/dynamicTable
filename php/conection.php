

<?php 
		function conection(){
			$server="localhost";
			$user="root";
			$pwd="";
			$bd="test";

			$conection=mysqli_connect($server,$user,$pwd,$bd);

			return $conection;
		}

 ?>