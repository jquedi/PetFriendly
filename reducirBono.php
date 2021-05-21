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
	
	
	$sql4 = "SELECT id FROM `clientesConBonos` WHERE bono = " .$bono ." AND dni = '" .$dni ."'" ;

	$consulta4 = mysql_query($sql4);

	$id = 0;
	
	while($registro4 = mysql_fetch_array($consulta4)){
		$id=$registro4["id"];
		
	}
	
	
	
	
	
	$sql = "SELECT sesionesrestantes FROM `clientesConBonos` WHERE id = '" .$id ."'";

	$consulta = mysql_query($sql);

	$count = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$count=$registro["sesionesrestantes"] - 1;
		
	}
	
	
	
	$sql3 = "UPDATE clientesConBonos SET sesionesrestantes = '".$count ."' WHERE id = '" .$id ."'";
	
	$consulta3 = mysql_query($sql3);
	
	
	if($count <= 0){
		$sql4 = "DELETE FROM `clientesConBonos` WHERE id = '" .$id ."'";
	
		$consulta4 = mysql_query($sql4);
	}
	
?>