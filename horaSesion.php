<?php

	include("connect.php");

	$group=$_POST['group'];
	

	$sql = "SELECT horaInicio FROM `Grupos2` WHERE `id`= " . $group;
	$sql2 = "SELECT horaFin FROM `Grupos2` WHERE `id`= " . $group;

	$consulta = mysql_query($sql);
	$consulta2 = mysql_query($sql2);
		
	$horaInicio = 0;
	$horaFin = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$horaInicio=$registro["horaInicio"];
		
	}
	while($registro2 = mysql_fetch_array($consulta2)){
		$horaFin=$registro2["horaFin"];
		
	}

	echo $horaInicio ."-" .$horaFin
?>