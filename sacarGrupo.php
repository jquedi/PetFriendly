<?php

	include("connect.php");

	$numeroSesion=$_POST['numeroSesion'];
	$tipo=$_POST['tipo'];
	$diaSemana=$_POST['diaSemana'];
	

	$sql = "SELECT id FROM `Grupos2` WHERE `numeroSesion`= " . $numeroSesion ." AND diaSemana='" .$diaSemana ."' AND tipo =" .$tipo;

	$consulta = mysql_query($sql);

		
	$id = 0;

	
	while($registro = mysql_fetch_array($consulta)){
		$id=$registro["id"];
		
	}

	echo $id;
?>