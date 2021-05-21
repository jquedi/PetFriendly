<?php

	include("connect.php");
	
	$date=$_POST['date'];
	$group=$_POST['group'];
	

	$sql = "SELECT COUNT(id) AS Pepe FROM `ejemplo` WHERE date='" . $date ."' AND grupo=" .$group;
	$sql2 = "SELECT max FROM `Grupos2` WHERE `id`= " . $group;

	$consulta = mysql_query($sql);
	$consulta2 = mysql_query($sql2);
		
	$Pepe = 0;
	$max = 0;
	
	while($registro = mysql_fetch_array($consulta)){
		$Pepe=$registro["Pepe"];
		
	}
	while($registro2 = mysql_fetch_array($consulta2)){
		$max=$registro2["max"];
		
	}
	
	
	

	echo $Pepe ."#" .$max;
?>