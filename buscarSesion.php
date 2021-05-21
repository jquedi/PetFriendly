<?php

	include("connect.php");

	$tipo=$_POST['tipo'];
	$diaSemana=$_POST['diaSemana'];
	

	$sql = "SELECT numeroSesion FROM `Grupos2` WHERE diaSemana='" .$diaSemana ."' AND tipo =" .$tipo;

	$consulta = mysql_query($sql);

		
	$numeroSesion = "";

	
	while($registro = mysql_fetch_array($consulta)){
		$numeroSesion= $numeroSesion .$registro["numeroSesion"];
		
	}

	echo $numeroSesion;
?>