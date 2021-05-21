<?php
include("../conexion.php");
include("../funciones/traer00.php");

$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
if ($per>=3){}else{exit();}

$id=$_POST["id"];
$word= $_POST["eword"];
if ($word!=$option0a){exit();}

$consulta=mysql_query("DELETE FROM OBLIGACION WHERE IDCLIENTE = $id");
$consulta=mysql_query("DELETE FROM CLIENTE WHERE ID = $id");

?>