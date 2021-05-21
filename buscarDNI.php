<?php

	include("connect.php");

	$group=$_POST['group'];
	$dni=$_POST['dni'];
	$date=$_POST['date'];
	

	$sql = "SELECT COUNT(dni) AS count FROM `ejemplo` WHERE grupo = " .$group ." AND dni = '" .$dni ."' AND date = '" .$date ."'" ;

	$consulta = mysql_query($sql);

	$count = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$count=$registro["count"];
		
	}
	echo $count;
?>