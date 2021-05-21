<!DOCTYPE html>
<html lang="es-ES">
<head>
<meta charset="UTF-8">
<meta name="author" content="Rafael Quereda Montoya">
<meta name="description" content="Asesoría DYM">
<meta name="keywords" content="Asesoría, Administración de Fincas">
<link rel="stylesheet" href="..\estilo.css">
<link rel="stylesheet" href="..\estilo_nav.css">
<script src="..\jquery-3.3.1.min.js"></script>
<link rel="icon" href="..\pngicono.png" type="image/png" sizes="16x16">
<script src="../funciones/function_menu.js" type="text/javascript"></script>

<script> $(function(){
      $("#includedContent1").load("../funciones/menufacturacion1.html");
      $("#includedContent2").load("../funciones/menucontabilidad2.html");
      $("#includedContent3").load("../funciones/menucontabilidad3.html");
      $("#includedContent4").load("../funciones/menucontabilidad4.html");
      $("#includedContent5").load("../funciones/menucontabilidad5.html");
      $("#includedContent6").load("../funciones/menucontabilidad6.html");
	  })
    </script> 

<?php include("../conexion.php");
include("../conexion_empresa.php");
$per=0;
$consulta24=mysql_query("SELECT * FROM PERMISOS WHERE USUARIO='".$_COOKIE[user]."' AND APLICACION='EMPRESA'");
while ($registro24 = mysql_fetch_array($consulta24)){$per=$registro24["PERMISO"];}
include("../funciones/traer00.php");
include("../funciones/traer51.php");
include("../funciones/traer52.php");
include("../funciones/traer53.php");
?>

<script>  // PERMITIR EL ACCESO
var valor=<?php echo "'".$per."'";?>;
if (valor>=1){}else{window.top.location.href = 'http://dymasesores.es';exit();}
</script>

<script languaje="javascript">  // FUNCIONES DE WINDOWS
window.onclick = function(e) {
	if (!e.target.matches('.dropbtn')) {myDropcontabilidad();}
}
</script>

<script>  $(document).ready(function(){

	function obtener_datos(){
    $.post("mostrar_datos.php",$("#formbusca").serialize(),function(res){$("#result").html(res);});		
	}

	function ocultar_boton(){
   	$('#pprint1').slideUp('slow');$('#pprint2').slideUp('slow');$('#botonimprimir').slideDown('slow');
	}
	
    $("#botonbuscar").click( function() {
    $("#buscador").slideUp("slow"); 
	obtener_datos(); 
	});    

	$(document).on("click", "#eliminar", function(){
		if (prompt("INTRODUZCA LA PALABRA DE SEGURIDAD", "CONTRASEÑA")==<?php echo "'".$seguridadmaxima."'";?>){
		$("#formulario").slideUp("slow"); 
		$("#buscador").slideUp("slow");
		var id = $(this).data("id");
		var eword=<?php echo "'".$option0a."'";?>;
	$.ajax({
		url: "eliminar.php",
		method: "POST",
		data: {id:id,eword:eword},
		success: function (data){obtener_datos();}
		})
		};
	})

    $("#botonenviar").click( function() { 
        $.post("editar.php",$("#formdata").serialize(),function(res){
	document.getElementById("id").value=res.trim();
	$.post("editar_factura.php",$("#formdata").serialize(),function(res){
	$('#botonobligacion').slideDown('slow');			
	alert ("REGISTRO GUARDADO");
	});
    });
    });    

    $("#bus").click( function() {
	$('#formulario').slideUp('slow',function(){$('#buscador').slideDown('slow',function(){document.getElementById("bcliente").focus();});});		
	ocultar_boton();	
	})

    $("#add").click( function() {
	$('#buscador').slideUp('slow',function(){$('#formulario').slideDown('slow',function(){document.getElementById("nif").focus();});});
	document.getElementById("id").value= '';
	document.getElementById("formdata").reset();	
	$('#botonobligacion').slideUp('slow');	
	$('#obligaciones').slideUp('slow');	
    })
	
	$(document).on("click", "#editar", function(){
	$("#buscador").slideUp("slow",function(){$("#formulario").slideDown("slow");});	
	$('#botonobligacion').slideDown('slow');	
	$('#obligaciones').slideUp('slow');	
	document.getElementById("cliente").focus();
	var id = $(this).data("id");
	document.getElementById("id").value= id;
	$.ajax({
		url: "traer.php",
		method: "POST",
		data: {id: id},
		success: function (data){
		if (data==''){exit;}
			$rg=data;
			$r1=$rg.indexOf('#');
			$r2=$rg.indexOf('#',$r1+1);
			$r3=$rg.indexOf('#',$r2+1);
			$r4=$rg.indexOf('#',$r3+1);
			$r5=$rg.indexOf('#',$r4+1);
			$r6=$rg.indexOf('#',$r5+1);
			$r7=$rg.indexOf('#',$r6+1);
			$r8=$rg.indexOf('#',$r7+1);
			$r9=$rg.indexOf('#',$r8+1);
			$r10=$rg.indexOf('#',$r9+1);
			$r11=$rg.indexOf('#',$r10+1);
			$r12=$rg.indexOf('#',$r11+1);
			$r13=$rg.indexOf('#',$r12+1);
			$r14=$rg.indexOf('#',$r13+1);
			$r15=$rg.indexOf('#',$r14+1);
			$r16=$rg.indexOf('#',$r15+1);
			$r17=$rg.indexOf('#',$r16+1);
			$r18=$rg.indexOf('#',$r17+1);
			$r19=$rg.indexOf('#',$r18+1);
			$r20=$rg.indexOf('#',$r19+1);
			$r21=$rg.indexOf('#',$r20+1);
			$r22=$rg.indexOf('#',$r21+1);
			document.getElementById("cliente").value=$rg.substring(0,$r1 - 1);
			document.getElementById("nif").value=$rg.substring($r1 + 2,$r2-1);
			document.getElementById("estado").value=$rg.substring($r2 + 2,$r3-1);
			document.getElementById("pertenece").value=$rg.substring($r3 + 2,$r4-1);
			document.getElementById("telefono").value=$rg.substring($r4 + 2,$r5-1);
			document.getElementById("email").value=$rg.substring($r5 + 2,$r6-1);
			document.getElementById("cuenta").value=$rg.substring($r6 + 2,$r7-1);
			document.getElementById("forma").value=$rg.substring($r7 + 2,$r8-1);
			document.getElementById("observaciones").value=$rg.substring($r8 + 2,$r9-1);
			document.getElementById("actividades").value=$rg.substring($r9 + 2,$r10-1);
			document.getElementById("cnae").value=$rg.substring($r10 + 2,$r11-1);
			document.getElementById("iae").value=$rg.substring($r11 + 2,$r12-1);
			document.getElementById("art_80").value=$rg.substring($r12 + 2,$r13-1);
			document.getElementById("hipoteca").value=$rg.substring($r13 + 2,$r14-1);
			document.getElementById("domicilio").value=$rg.substring($r14 + 2,$r15-1);
			document.getElementById("postal").value=$rg.substring($r15 + 2,$r16-1);
			document.getElementById("poblacion").value=$rg.substring($r16 + 2,$r17-1);
			document.getElementById("tipo").value=$rg.substring($r17 + 2,$r18-1);
			document.getElementById("citas").value=$rg.substring($r18 + 2,$r19-1);
			document.getElementById("contabilidad").value=$rg.substring($r19 + 2,$r20-1);
			document.getElementById("facturas").value=$rg.substring($r20 + 2,$r21-1);
			document.getElementById("expedientes").value=$rg.substring($r21 + 2,$r22-1);
			document.getElementById("nomina").value=$rg.substring($r22 + 2,$rg.length);
			botonobligacion.click();
		}
		})
    	})

    $("#botonobligacion").click( function() {
	$('#obligaciones').slideToggle('slow');
	document.getElementById("m130").focus();
	var id = (document.getElementById("id").value).trim();
	$.ajax({
		url: "traer1.php",
		method: "POST",
		data: {id: id},
		success: function (data){
			$rg=data;
			$r1=$rg.indexOf('#');
			if($r1<=0){$r1=0;$r2=0;$r3=0;$r4=0;$r5=0;$r6=0;$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r2=$rg.indexOf('#',$r1+1);}
			if($r2<=$r1){$r2=0;$r3=0;$r4=0;$r5=0;$r6=0;$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r3=$rg.indexOf('#',$r2+1);}
			if($r3<=$r2){$r3=0;$r4=0;$r5=0;$r6=0;$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r4=$rg.indexOf('#',$r3+1);}
			if($r4<=$r3){$r4=0;$r5=0;$r6=0;$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r5=$rg.indexOf('#',$r4+1);}
			if($r5<=$r4){$r5=0;$r6=0;$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r6=$rg.indexOf('#',$r5+1);}
			if($r6<=$r5){$r6=0;$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r7=$rg.indexOf('#',$r6+1);}
			if($r7<=$r6){$r7=0;$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r8=$rg.indexOf('#',$r7+1);}
			if($r8<=$r7){$r8=0;$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r9=$rg.indexOf('#',$r8+1);}
			if($r9<=$r8){$r9=0;$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r10=$rg.indexOf('#',$r9+1);}
			if($r10<=$r9){$r10=0;$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r11=$rg.indexOf('#',$r10+1);}
			if($r11<=$r10){$r11=0;$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r12=$rg.indexOf('#',$r11+1);}
			if($r12<=$r11){$r12=0;$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r13=$rg.indexOf('#',$r12+1);}
			if($r13<=$r12){$r13=0;$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r14=$rg.indexOf('#',$r13+1);}
			if($r14<=$r13){$r14=0;$r15=0;$16r=0;$r17=0;$r18=0}else{$r15=$rg.indexOf('#',$r14+1);}
			if($r15<=$r14){$r15=0;$16r=0;$r17=0;$r18=0}else{$r16=$rg.indexOf('#',$r15+1);}
			if($r16<=$r15){$16r=0;$r17=0;$r18=0}else{$r17=$rg.indexOf('#',$r16+1);}
			if($r17<=$r16){$r17=0;$r18=0}else{$r18=$rg.indexOf('#',$r17+1);}
			if($r18<=$r17){$r18=0}else{$r19=$rg.indexOf('#',$r18+1);}
			document.getElementById("m130").value=$rg.substring($r1 + 2,$r2-1);
			document.getElementById("m303").value=$rg.substring($r2 + 2,$r3-1);
			document.getElementById("m115").value=$rg.substring($r3 + 2,$r4-1);
			document.getElementById("m111").value=$rg.substring($r4 + 2,$r5-1);
			document.getElementById("m123").value=$rg.substring($r5 + 2,$r6-1);
			document.getElementById("m309").value=$rg.substring($r6 + 2,$r7-1);
			document.getElementById("m349").value=$rg.substring($r7 + 2,$r8-1);
			document.getElementById("m202").value=$rg.substring($r8 + 2,$r9-1);
			document.getElementById("m100").value=$rg.substring($r9 + 2,$r10-1);
			document.getElementById("m200").value=$rg.substring($r10 + 2,$r11-1);
			document.getElementById("m180").value=$rg.substring($r11 + 2,$r12-1);
			document.getElementById("m190").value=$rg.substring($r12 + 2,$r13-1);
			document.getElementById("m390").value=$rg.substring($r13 + 2,$r14-1);
			document.getElementById("m193").value=$rg.substring($r14 + 2,$r15-1);
			document.getElementById("m347").value=$rg.substring($r15 + 2,$r16-1);
			document.getElementById("m184").value=$rg.substring($r16 + 2,$r17-1);
			document.getElementById("m131").value=$rg.substring($r17 + 2,$rg.length);
		}
		})
    	})		
	
    $("#botonimprimir").click( function() { 
	ocultar_boton();	
	$("#botonimprimir").slideUp("slow");$("#pprint1").slideDown("slow");$("#pprint2").slideDown("slow");	
    }); 		
				
});


</script>

<title>Mantenimiento de Empresas</title>

</head>
<body onload="
var btn_11 = document.getElementById('add');
var btn_12 = document.getElementById('botonenviar');
if (<?php echo "'".$per."'";?><=1){btn_11.style.display='none';btn_12.style.display='none';}
">
	<br/>
	<br/>
	<br/>
  <h1>EMPRESAS</h1>

<div id="container">
	<div id="result" class="div0"></div>
</div>

<div id="formulario" class="div1">
            <form method="post" id="formdata">
  <h1>FICHA DE LA EMPRESA</h1>		
<br/>  
<p><label style="width: 80px; text-align:right;">NIF:</label><input type="text" class="number1" id="nif" name="nif" style="width: 140px;" maxlength="50">
<label style="width: 60px; text-align:right;">ESTADO:</label><select class="number1" id="estado" style="width: 125px;" name="estado"><?php echo $option53;?></select>
<label style="width: 80px; text-align:right;">NOMINA:</label><input type="text" class="number1" id="nomina" name="nomina" style="width: 40px;"></p>
<p><label style="width: 80px; text-align:right;">CLIENTE:</label><input type="text" class="number1" id="cliente" name="cliente" style="width: 435px;" maxlength="255"></p>
<p><label style="width: 80px; text-align:right;">PERTENECE:</label><input type="text" class="number1" id="pertenece" name="pertenece" style="width: 435px;" maxlength="250" ></p>
<p><label style="width: 80px; text-align:right;">TELEFONO:</label><input type="text" class="number1" id="telefono" name="telefono" style="width: 160px;" maxlength="255">
<label style="width: 60px; text-align:right;">EMAIL:</label><input type="text" class="number1" id="email" name="email" style="width: 208px;" maxlength="255"></p>
<p><label style="width: 80px; text-align:right;">DOMICILIO:</label><input type="text" class="number1" id="domicilio" name="domicilio" style="width: 220px;" maxlength="250">
<label style="width: 60px; text-align:right;">POBLACION:</label><input type="text" class="number1" id="poblacion" name="poblacion" style="width: 143px;" maxlength="150"></p>
<p><label style="width: 80px; text-align:right;" >POSTAL:</label><input type="text" class="number1" id="postal" name="postal" style="width: 80px;" maxlength="100">
<label style="width: 60px; text-align:right;" >CUENTA:</label><input type="text" class="number1" id="cuenta" name="cuenta" style="width: 290px;" maxlength="100"></p>
<p><label style="width: 80px; text-align:right;">NOTAS:</label><input type="text" class="number1" id="observaciones" name="observaciones" style="width: 435px;" maxlength="250"></p>
<p><label style="width: 80px; text-align:right;;" >ACTIVIDAD:</label><input type="text" class="number1" id="actividades" name="actividades" style="width: 185px;" maxlength="250">
<label style="width: 40px; text-align:right;">IAE:</label><input type="text" class="number1" id="iae" name="iae" style="width: 80px;" maxlength="25">
<label style="width: 40px; text-align:right;">CNAE:</label><input type="text" class="number1" id="cnae" name="cnae" style="width: 80px" maxlength="25"></p>
<p><label style="width: 80px; text-align:right;" >FORMA:</label><select class="number1" id="forma" style="width: 80px;" name="forma"><?php echo $option52;?></select>
<label style="width: 30px; text-align:right;">TIPO:</label><select class="number1" id="tipo" style="width: 160px;" name="tipo"><?php echo $option51;?></select>
<label style="width: 50px; text-align:right;">ART100:</label><input type="number" class="number1" id="art_80" name="art_80" value="0" style="width: 40px;">
<label style="width: 20px; text-align:right;">HP:</label><select name="hipoteca" id="hipoteca" class="number1" style="width: 40px;"><option>NO</option><option>SI</option></select></p>
<p><label style="width: 80px; text-align:right;">FACTURAS:</label><select name="facturas" id="facturas" class="number1" style="width: 40px;"><option>NO</option><option>SI</option></select>
<label style="width: 40px; text-align:right;" >CITAS:</label><select name="citas" id="citas" class="number1" style="width: 40px;"><option>NO</option><option>SI</option></select>
<label style="width: 80px; text-align:right;" >EXPEDIENTES:</label><select name="expedientes" id="expedientes" class="number1" style="width: 84px;"><option>NO</option><option>SI</option></select>
<label style="width: 80px; text-align:right;" >CONTABILIDAD:</label><select name="contabilidad" id="contabilidad" class="number1" style="width: 100px;"><option>AUTONOMO</option><option>SOCIEDAD</option><option>NO</option></select></p>
<br/>
<h6><button type="button" class="button1" id="botonenviar" title="Registrar (Alt+R)" accesskey="r"><img src="http://dymasesores.es/dmfiles/pngguardar.png" alt="?"></button>&nbsp;&nbsp;&nbsp;
<button type="button" class="button1" id="botonobligacion" title="Obligaciones"><img src="http://dymasesores.es/dmfiles/pngobligaciones.png" alt="?"></button>&nbsp;&nbsp;&nbsp;
<button type="button" class="button1"  title="Cancelar (Alt+C)"  accesskey="c" onclick="$('#formulario').slideUp('slow');"><img src="http://dymasesores.es/dmfiles/pngvolver.png" alt="?"></button></h6>
<input type="hidden" class="number1" id="word" name="word" value=<?php echo "'".$option0a."'";?>>
<input type="hidden" class="number1" id="id" name="id">
<center>
<div id="obligaciones" style="width: auto; display:none; border-radius: 16px; border: #333333 1px solid; background-color: #FAFAFA; color: #000000;">
<br>
<h2>DATOS DE OBLIGACIONES</h2>
<center>
<label style="width: 40px; height: 16px; text-align:center;" >130</label>
<label style="width: 40px; height: 16px; text-align:center;" >131</label>
<label style="width: 40px; height: 16px; text-align:center;" >303</label>
<label style="width: 40px; height: 16px; text-align:center;" >115</label>
<label style="width: 40px; height: 16px; text-align:center;" >111</label>
<label style="width: 40px; height: 16px; text-align:center;" >123</label>
<label style="width: 40px; height: 16px; text-align:center;" >309</label>
<label style="width: 40px; height: 16px; text-align:center;" >349</label>
<label style="width: 40px; height: 16px; text-align:center;" >202</label>
</center>
<center><select class="number1" id="m130" name="m130" style="width: 40px;">
     <option value="SI">SI</option>
     <option value="NO">NO</option>
</select>
<select class="number1" id="m131" name="m131" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m303" name="m303" style="width: 40px;">
     <option value="SI">SI</option>
     <option value="NO">NO</option>
</select>
<select class="number1" id="m115" name="m115" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m111" name="m111" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m123" name="m123" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m309" name="m309" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m349" name="m349" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m202" name="m202" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
</center>
<center><label style="width: 40px; height: 16px; text-align:center;" >180</label>
<label style="width: 40px; height: 16px; text-align:center;" >190</label>
<label style="width: 40px; height: 16px; text-align:center;" >390</label>
<label style="width: 40px; height: 16px; text-align:center;" >193</label>
<label style="width: 40px; height: 16px; text-align:center;" >347</label>
<label style="width: 40px; height: 16px; text-align:center;" >184</label>
<label style="width: 40px; height: 16px; text-align:center;" >100</label>
<label style="width: 40px; height: 16px; text-align:center;" >200</label>
</center>
<center><select class="number1" id="m180" name="m180" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m190" name="m190" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m390" name="m390" style="width: 40px;">
     <option value="SI">SI</option>
     <option value="NO">NO</option>
</select>
<select class="number1" id="m193" name="m193" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m347" name="m347" style="width: 40px;">
     <option value="SI">SI</option>
     <option value="NO">NO</option>
</select>
<select class="number1" id="m184" name="m184" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
<select class="number1" id="m100" name="m100" style="width: 40px;">
     <option value="SI">SI</option>
     <option value="NO">NO</option>
</select>
<select class="number1" id="m200" name="m200" style="width: 40px;">
     <option value="NO">NO</option>
     <option value="SI">SI</option>
</select>
</center>
<br/>
</div>
</center>
            </form>		
</div>

<div id="buscador" class="div2">
    <form method="post" action="#"  target="_blank" id="formbusca">
<h1>BUSCAR EMPRESAS</h1
<br/> 
<p><label style="width: 100px; text-align:right;">EMPRESA:</label><input type="text" class="number1" id="bcliente" name="bcliente" style="width: 400px;" autofocus></p>
<p><label style="width: 100px; text-align:right;">ESTADO:</label><select name="bestado" id="bestado" class="number1" style="width: 200px;"><?php echo $option53;?><option></option></select></p>
<p><label style="width: 100px; text-align:right;">FORMA:</label><select name="bforma" id="bforma" class="number1" style="width: 200px;"><option></option><?php echo $option52;?></select></p>
<p><label style="width: 100px; text-align:right;">TIPO:</label><select name="btipo" id="btipo" class="number1" style="width: 200px;"><option></option><?php echo $option51;?></select></p>
<br/>
<h6><button type="button" class="button1" id="botonbuscar" title="Buscar"><img src="http://dymasesores.es/dmfiles/pngbuscar.png" alt="?"></button>&nbsp;&nbsp;&nbsp;
<button type="button" class="button1"  title="Limpiar" onclick="document.getElementById('bcliente').focus();document.getElementById('formbusca').reset();"><img src="http://dymasesores.es/dmfiles/pnglimpiar.png" alt="?"></button>&nbsp;&nbsp;&nbsp;
<button type="button" class="button1" id="botonimprimir" title="Imprimir"><img src="http://dymasesores.es/dmfiles/pngimprimir.png" alt="?"></button>
	<button type="submit" class="button1"  style="display:none;" title='Imprimir Listado' id="pprint1" formaction="http://dymasesores.es/dmfiles/paginas/fpdf/fpdf181/listados/empresaslista.php"><img src="http://dymasesores.es/dmfiles/pngimprimirlistado.png" alt="?"></button>
	<button type="submit" class="button1"  style="display:none;" title='Imprimir Listado Reducido' id="pprint2" formaction="http://dymasesores.es/dmfiles/paginas/fpdf/fpdf181/listados/empresaslistareducido.php"><img src="http://dymasesores.es/dmfiles/pngimprimirlistadoreducido.png" alt="?"></button>
&nbsp;&nbsp;&nbsp;
<button type="button" class="button1"  title="Cancelar" onclick="$('#buscador').slideUp('slow');"><img src="http://dymasesores.es/dmfiles/pngvolver.png" alt="?"></button></h6>
<input type="hidden" class="number1" id="bword" name="bword" value=<?php echo "'".$option0a."'";?>>
</form>
        </div>
			
<div class="navbar" style="clear:both;">
<div id="includedContent1"></div>
<div id="includedContent2"></div>
<div id="includedContent3"></div>
<div id="includedContent4"></div>
<div id="includedContent5"></div>
<div id="includedContent6"></div>
&nbsp;&nbsp;&nbsp;
<button type="button" class="button1"  title="Buscar (Alt+B)"  accesskey="b" id="bus"><img src="http://dymasesores.es/dmfiles/pngbuscar.png" alt="?"></button>&nbsp;&nbsp;&nbsp;
<button type="button" class="button1"  title='Nuevo (Alt+N)' accesskey='n' id="add"><img src="http://dymasesores.es/dmfiles/pngagregar.png" alt="?"></button>&nbsp;&nbsp;&nbsp;
<button type="button" class="button1"  title="Cerrar Sesión" id="plish"><img src="http://dymasesores.es/dmfiles/pngcerrarsesion.png" alt="?" onclick="if (confirm('Confirme que va a salir de la aplicación.')==true){window.top.location.href= 'https://wp.me/P9ysdg-v';}"></button>
  </div> 		
		
		
		
</body>
</html>
