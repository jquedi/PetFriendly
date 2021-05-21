<?php
	$servername = "rdbms.strato.de";
	$username = "U4193327";
	$password = "Contrasena";
	$dbname = "DB4193327";

	
	$conexion = mysql_connect($servername, $username, $password);
	if (!$conexion) {exit();}
	$seleccionar_bd=mysql_select_db($dbname);
	if (!$seleccionar_bd) {exit();}
	mysql_set_charset('utf8');
?> 
