<?php

	include("connect.php");
	
	$group=$_POST['group'];
	

	$sql = "SELECT sesiones FROM `bonos` WHERE `id`= " . $group;
	$sql2 = "SELECT precio FROM `bonos` WHERE `id`= " . $group;

	$consulta = mysql_query($sql);
	$consulta2 = mysql_query($sql2);
		
	$sesiones = 0;
	$precio = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$sesiones=$registro["sesiones"];
		
	}
	while($registro2 = mysql_fetch_array($consulta2)){
		$precio=$registro2["precio"];
		
	}
	
	
	

	echo $sesiones ."#" .$precio;
?>