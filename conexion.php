
<?php 
$conexion = mysql_connect("rdbms.strato.de", "U3295673", "pedorro4267");
if (!$conexion) {exit();}
$seleccionar_bd=mysql_select_db("DB3295673");
if (!$seleccionar_bd) {exit();}
mysql_set_charset('utf8');

$anoactual= date("Y");
$mesactual=date("m");
$diaactual=date("d");
$fechaactual=$anoactual."-".$mesactual."-".$diaactual;
$anoactual= date("Y");
?>