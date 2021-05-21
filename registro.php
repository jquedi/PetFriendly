<?php
	
	include("connect.php");
	
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$dni=$_POST['dni'];
	$email=$_POST['correo'];
	$telefono=$_POST['movil'];
	$nombreP=$_POST['nombreP'];
	$date=$_POST['date'];
	$grupo=$_POST['group'];
	

	
	$req = (strlen($dni)*strlen($nombre)*strlen($apellidos)*strlen($email)*strlen($telefono)*strlen($nombreP)*strlen($date)*strlen($grupo)) or die("No se han llenado todos los campos");
	
	if($req){
		$sql = "INSERT INTO ejemplo (id, dni, name, secondName, mail, phone, dog, date, grupo)
			VALUES ( '', '" . $dni . "', '" . $nombre . "', '" . $apellidos . "', '" . $email . "', '" . $telefono . "', '" . $nombreP . "', '" . $date . "', '" . $grupo . "')";
	}else{
		echo "Error, faltan campos por completar.";
	}
	$consulta = mysql_query($sql);
	
	$horaInicio = 0;
	
	$sql2 = "SELECT horaInicio FROM `Grupos2` WHERE `id`= " . $grupo;
	
	$consulta2 = mysql_query($sql2);
	
	while($registro2 = mysql_fetch_array($consulta2)){
		$horaInicio=$registro2["horaInicio"];
	}
	
	$to = $email;
	$subject = "Confirmación de reserva Pet Friendly";
	$txt = "Estimad@ " .$nombre ." le confirmamos que su reserva ha sido registrada. \nLe esperamos en nuestras instalaciones el dia " .$date ." a las " .$horaInicio .".";
	$headers = "From: direccion@arikelk9.com";

	
	if ($consulta == 1) {
		mail(utf8_encode($to),utf8_encode($subject),utf8_encode($txt),utf8_encode($headers));
	} else {
		echo "Error: " . $sql;
	}
	
?>