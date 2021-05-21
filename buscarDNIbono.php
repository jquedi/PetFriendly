<?php

	include("connect.php");

	$dni=$_POST['dni'];
	$tipo=$_POST['tipo'];

	
	$sql2 = "SELECT id FROM bonos WHERE tipo = " .$tipo;
	
	$bono = 0;
	
	$consulta2 = mysql_query($sql2);
	
	while($registro2 = mysql_fetch_array($consulta2)){
		$bono=$registro2["id"];
		
	}
	
	$sql = "SELECT COUNT(dni) AS count FROM `clientesConBonos` WHERE bono = " .$bono ." AND dni = '" .$dni ."'" ;

	$consulta = mysql_query($sql);

	$count = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$count=$registro["count"];
		
	}
	echo $count;
?>