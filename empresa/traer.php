<?php
include("../conexion.php");
$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
if ($per>=1){}else{exit();}



$id=$_POST["id"];
$consulta=mysql_query("SELECT * FROM CLIENTE WHERE ID=".$id);

while ($registro = mysql_fetch_array($consulta)){
$aid=$registro["ID"];
$acliente=$registro["CLIENTE"];
$anif=$registro["NIF"];
$aestado=$registro["ESTADO"];
$apertenece=$registro["PERTENECE"];
$atelefono=$registro["TELEFONO"];
$aemail=$registro["EMAIL"];
$acuenta=$registro["CUENTA"];
$aforma=$registro["FORMA"];
$aobservaciones=$registro["OBSERVACIONES"];
$aactividades=$registro["ACTIVIDADES"];
$acnae=$registro["CNAE"];
$aiae=$registro["IAE"];
$aart_80=$registro["ART_80"];
$ahipoteca=$registro["HIPOTECA"];
$adomicilio=$registro["DOMICILIO"];
$apostal=$registro["POSTAL"];
$apoblacion=$registro["POBLACION"];
$atipo=$registro["TIPO"];
$acitas=$registro["CITAS"];
$acontabilidad=$registro["CONTABILIDAD"];
$afacturas=$registro["FACTURAS"];
$aexpedientes=$registro["EXPEDIENTES"];
$anomina=$registro["NOMINA"];
}

echo $acliente." # ".$anif." # ".$aestado." # ".$apertenece." # ".$atelefono." # ".$aemail." # ".$acuenta." # ".$aforma." # ".$aobservaciones." # ".$aactividades." # ".$acnae." # ".$aiae." # ".$aart_80." # ".$ahipoteca." # ".$adomicilio." # ".$apostal." # ".$apoblacion." # ".$atipo." # ".$acitas." # ".$acontabilidad." # ".$afacturas." # ".$aexpedientes." # ".$anomina;
?>