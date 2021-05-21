<?php
	
	include("connect.php");
	
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$dni=$_POST['dni'];
	$email=$_POST['correo'];
	$telefono=$_POST['movil'];
	$grupo=$_POST['group'];
	$sesiones=$_POST['sesiones'];
	

	
	$req = (strlen($dni)*strlen($nombre)*strlen($apellidos)*strlen($email)*strlen($telefono)*strlen($grupo)) or die("No se han llenado todos los campos");
	
	if($req){
		$sql = "INSERT INTO clientesConBonos (id, name, second, dni, mail, phone, sesionesrestantes, sesionestotales, bono)
			VALUES ( '', '" . $nombre . "', '" . $apellidos . "', '" . $dni . "', '" . $email . "', '" . $telefono . "', '" . $sesiones . "', '" . $sesiones . "', '" . $grupo . "')";
	}else{
		echo "Error, faltan campos por completar.";
	}
	$consulta = mysql_query($sql);
	
	$to = $email;
	$subject = "Confirmación de compra Pet Friendly";
	$txt = "Estimad@ " .$nombre ." le confirmamos que su compra ha sido registrada.";
	$headers = "From: direccion@arikelk9.com";

	
	if ($consulta == 1) {
		mail(utf8_encode($to),utf8_encode($subject),utf8_encode($txt),utf8_encode($headers));
	} else {
		echo "Error: " . $sql;
	}
	
?>