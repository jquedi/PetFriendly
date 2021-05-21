<?php
include("../conexion.php");
include("../funciones/traer00.php");

$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
if ($per>=2){}else{exit();}

$word= $_POST["word"];
if ($word!=$option0a){exit();}

$a=$_POST['id'];
$b=$_POST['cliente'];
$c=$_POST['nif'];
$d=$_POST['estado'];
$e=$_POST['pertenece'];
$f=$_POST['telefono'];
$g=$_POST['domicilio'];
$h=$_POST['poblacion'];
$i=$_POST['postal'];
$j=$_POST['email'];
$k=$_POST['cuenta'];
$l=$_POST['observaciones'];
$m=$_POST['actividades'];
$n=$_POST['cnae'];
$o=$_POST['iae'];
$p=$_POST['forma'];
$q=$_POST['art_80'];
$r=$_POST['hipoteca'];
$s=$_POST['tipo'];
$t=$_POST['citas'];
$u=$_POST['contabilidad'];
$v=$_POST['facturas'];
$w=$_POST['expedientes'];
$nomina=$_POST['nomina'];

$a1=$_POST['id'];
$c1=$_POST['m130'];
$d1=$_POST['m303'];
$e1=$_POST['m115'];
$f1=$_POST['m111'];
$g1=$_POST['m123'];
$h1=$_POST['m309'];
$i1=$_POST['m349'];
$j1=$_POST['m202'];
$k1=$_POST['m100'];
$l1=$_POST['m200'];
$m1=$_POST['m180'];
$n1=$_POST['m190'];
$o1=$_POST['m390'];
$p1=$_POST['m193'];
$q1=$_POST['m347'];
$r1=$_POST['m184'];
$s1=$_POST['m131'];

      $b = preg_replace('([^A-Za-z0-9ñÑáÁéÉíÍóÓúÚ.,_ºª\s])', '', $b);	     					

if ($a!="")
{
$consulta=mysql_query("UPDATE CLIENTE SET NOMINA=".$nomina.", CLIENTE ='".$b."', NIF ='".$c."', ESTADO ='".$d."', PERTENECE ='".$e."', TELEFONO ='".$f."', DOMICILIO ='".$g."', POBLACION ='".$h."', POSTAL ='".$i."', EMAIL ='".$j."', CUENTA ='".$k."', OBSERVACIONES ='".$l."', ACTIVIDADES ='".$m."', CNAE ='".$n."', IAE ='".$o."', FORMA ='".$p."', ART_80 ='".$q."', HIPOTECA ='".$r."', TIPO ='".$s. "', CITAS='".$t."', CONTABILIDAD='".$u."', FACTURAS='".$v."', EXPEDIENTES='".$w."' where ID =".$a);
$consulta=mysql_query("UPDATE OBLIGACION SET M130 ='".$c1."', M303 ='".$d1."', M115 ='".$e1."', M111 ='".$f1."', M123 ='".$g1."', M309 ='".$h1."', M349 ='".$i1."', M202 ='".$j1."', M100 ='".$k1."', M200 ='".$l1."', M180 ='".$m1."', M190 ='".$n1."', M390 ='".$o1."', M193 ='".$p1."', M347 ='".$q1."', M184 ='".$r1."', M131 ='".$s1. "' where ID = ".$a);
echo $a;
}
else
{
$consulta=mysql_query("INSERT INTO CLIENTE (NOMINA, CLIENTE, NIF, ESTADO, PERTENECE, TELEFONO, DOMICILIO, POBLACION, POSTAL, EMAIL, CUENTA, OBSERVACIONES, ACTIVIDADES, CNAE, IAE, FORMA, ART_80, HIPOTECA, TIPO, CITAS, CONTABILIDAD, FACTURAS, EXPEDIENTES) VALUES ('$nomina','$b','$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$m', '$n', '$o', '$p', '$q', '$r', '$s', '$t', '$u', '$v', '$w')");
$sql = mysql_query("SELECT * FROM CLIENTE ORDER BY ID DESC LIMIT 1");
while ($row=mysql_fetch_array($sql)) {$b=$row['ID'];}
$consulta=mysql_query("INSERT INTO OBLIGACION (IDCLIENTE, M130, M303, M115, M111, M123, M309, M349, M202, M100, M200, M180, M190, M390, M193, M347, M184, M131) VALUES (".$b.",'SI', 'SI', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'SI', 'NO', 'NO', 'NO', 'SI', 'NO', 'SI', 'NO', 'NO')");     
echo $b;
}


?>