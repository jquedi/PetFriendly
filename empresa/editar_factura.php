<?php
include("../conexion.php");
include("../funciones/traer00.php");

$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
if ($per>=1){}else{exit();}

$word= $_POST["word"];
if ($word!=$option0a){exit();}

$id=$_POST['id'];
$cliente=$_POST['cliente'];
$nif=$_POST['nif'];
$telefonos=$_POST['telefono'];
$domicilio=$_POST['domicilio'];
$poblacion=$_POST['poblacion'];
$postal=$_POST['postal'];
$email=$_POST['email'];
$cuenta=$_POST['cuenta'];

      $cliente = preg_replace('([^A-Za-z0-9ñÑáÁéÉíÍóÓúÚ.,_ºª\s])', '', $cliente);	     					

$sql44="INSERT INTO FACCLIENTE (NIF, EMPRESA, CLIENTE, DOMICILIO, POBLACION, POSTAL, CUENTA, TIPO_GASTO, TIPO, EMAIL, TELEFONOS) VALUES ('".$nif."',53,'".$cliente."','".$domicilio."','".$poblacion."','".$postal."','".$cuenta."','PRESTACION SERVICIOS',1,'".$email."','".$telefonos."')";
$consulta44=mysql_query($sql44);

$sql44="UPDATE FACCLIENTE SET CLIENTE='".$cliente."', DOMICILIO='".$domicilio."', POBLACION='".$poblacion."', POSTAL='".$postal."', CUENTA='".$cuenta."', TIPO_GASTO='PRESTACION SERVICIOS', EMAIL='".$email."', TELEFONOS='".$telefonos."' WHERE NIF='".$nif."' AND EMPRESA=53 AND TIPO=1";
$consulta44=mysql_query($sql44);

$sql44="UPDATE FACPROGRAMADA SET CLIENTE='".$cliente."', DOMICILIO='".$domicilio."', POBLACION='".$poblacion."', POSTAL='".$postal."', EMAIL='".$email."' WHERE NIF='".$nif."' AND EMPRESA=53";
$consulta44=mysql_query($sql44);


?>