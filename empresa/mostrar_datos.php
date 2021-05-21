<?php
include("../conexion.php");
include("../funciones/traer00.php");

$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
if ($per>=1){}else{exit();}

$cliente= $_POST["bcliente"];
$forma= $_POST["bforma"];
$tipo= $_POST["btipo"];
$estado= $_POST["bestado"];
$word= $_POST["bword"];

if ($word!=$option0a){exit();}

$sql="SELECT * FROM CLIENTE WHERE ID>=0 ";
if($cliente!=""){$sql=$sql." AND  CLIENTE LIKE '%".$cliente."%' ";}
if($forma!=""){$sql=$sql." AND  FORMA = '".$forma."' ";}
if($estado!=""){$sql=$sql." AND  ESTADO = '".$estado."' ";}
if($tipo!=""){$sql=$sql." AND  TIPO = '".$tipo."' ";}
$sql=$sql." ORDER BY CLIENTE"; 

$consulta=mysql_query($sql);
$TOTAL=0;

echo "
	<table style='width:100%'>
		<tr>

			<th hidden>ID</th>
			<th>NIF</th>
			<th>CLIENTE</th>
			<th>ESTADO</th>
			<th>TELEFONO</th>
			<th>EMAIL</th>
			<th>FORMA</th>
			<th>ACTIVIDADES</th>
			<th>CUENTA</th>
			<th>ACCION</th>
		</tr>
";

while ($registro = mysql_fetch_array($consulta)){
$TOTAL=$TOTAL+1;

if ($per>=1){$ja="<td width='50'><button id='editar' class='button1' title='Modificar' data-id='".$registro["ID"]."'><img src='http://dymasesores.es/dmfiles/pngeditar.png' alt='?'></button></td>";}
if ($per>=3){$ja="<td width='100'><button id='eliminar' class='button1' title='Eliminar' data-id='".$registro["ID"]."'><img src='http://dymasesores.es/dmfiles/pngborrar.png' alt='?'></button>&nbsp;&nbsp;&nbsp;<button id='editar' class='button1' title='Modificar' data-id='".$registro["ID"]."'><img src='http://dymasesores.es/dmfiles/pngeditar.png' alt='?'></button></td>";}

	echo"
		<tr>
		<td hidden>".$registro["ID"]."</td>
		<td id='nif_cliente' data-id_nif='".$registro["ID"]."' >".$registro["NIF"]."</td>
		<td id='cliente_cliente' data-id_cliente='".$registro["ID"]."' >".$registro["CLIENTE"]."</td>
		<td id='estado_cliente' data-id_estado='".$registro["ID"]."' >".$registro["ESTADO"]."</td>
		<td id='telefono_cliente' data-id_telefono='".$registro["ID"]."' >".$registro["TELEFONO"]."</td>
		<td id='email_cliente' data-id_email='".$registro["ID"]."' >".$registro["EMAIL"]."</td>
		<td id='forma_cliente' data-id_forma='".$registro["ID"]."' >".$registro["FORMA"]."</td>
		<td id='actividades_cliente' data-id_actividades='".$registro["ID"]."' >".$registro["ACTIVIDADES"]."</td>
		<td id='cuenta_cliente' data-id_cuenta='".$registro["ID"]."' >".$registro["CUENTA"]."</td>".$ja."</tr>";			
}


	echo"
		<tr>	
		<td hidden></td>
		<td></td>
		<td>TOTAL LINEAS:</td>
		<td>$TOTAL</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>

		</tr>	
";


echo "</table>";


?>