<?php
include("../conexion.php");
$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
if ($per>=1){}else{exit();}

$id=$_POST["id"];
$consulta=mysql_query("SELECT * FROM OBLIGACION WHERE IDCLIENTE=".$id);

while ($registro = mysql_fetch_array($consulta)){
$aid=$registro["ID"];
$acliente=$registro["IDCLIENTE"];
$am130=$registro["M130"];
$am303=$registro["M303"];
$am115=$registro["M115"];
$am111=$registro["M111"];
$am123=$registro["M123"];
$am309=$registro["M309"];
$am349=$registro["M349"];
$am202=$registro["M202"];
$am100=$registro["M100"];
$am200=$registro["M200"];
$am180=$registro["M180"];
$am190=$registro["M190"];
$am390=$registro["M390"];
$am193=$registro["M193"];
$am347=$registro["M347"];
$am184=$registro["M184"];
$am131=$registro["M131"];
}

echo $acliente." # ".$am130." # ".$am303." # ".$am115." # ".$am111." # ".$am123." # ".$am309." # ".$am349." # ".$am202." # ".$am100." # ".$am200." # ".$am180." # ".$am190." # ".$am390." # ".$am193." # ".$am347." # ".$am184." # ".$am131;

?>