<?php

	include("connect.php");

	$group=$_POST['group'];
	$tipo=$_POST['tipo'];
	$diaSemana=$_POST['diaSemana'];
	

	$sql = "SELECT horaInicio FROM `Grupos2` WHERE `id`= " . $group;
	$sql2 = "SELECT horaFin FROM `Grupos2` WHERE `id`= " . $group;
	$sql3 = "SELECT COUNT(id) AS count FROM `Grupos2` WHERE tipo='" . $tipo ."' AND diaSemana='" .$diaSemana ."'";

	$consulta = mysql_query($sql);
	$consulta2 = mysql_query($sql2);
	$consulta3 = mysql_query($sql3);
		
	$horaInicio = 0;
	$horaFin = 0;
	$count = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$horaInicio=$registro["horaInicio"];
		
	}
	while($registro2 = mysql_fetch_array($consulta2)){
		$horaFin=$registro2["horaFin"];
		
	}
	while($registro3 = mysql_fetch_array($consulta3)){
		$count=$registro3["count"];
		
	}
	echo $horaInicio ."-" .$horaFin .$count;
?>