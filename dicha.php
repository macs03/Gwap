<? 
	session_start();
	include ("conexion.php");
	$link=conectar();
		$sql="SELECT * FROM descripcion ;";
		$res=mysql_query($sql);
		//$campos=mysql_fetch_array($res);
		
	
		/*$sql2="INSERT INTO imagenes_descripcion VALUES ('NULL','".$_SESSION['id_im']."','".$campos[1]."');";
		$con2=mysql_query($sql2);	*/
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="shortcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myGWAP</title>
</head>

<link rel="stylesheet" type="text/css" href="estilos.css" />
<body>
<div class="cabecera"></div>
<div class="login">
<h1>Partida: <? echo $_SESSION['par'];?> Usuario: <? echo $_SESSION['usuario'];?></h1>
</div>
<div class="contenedor">
<div align="center"></div>
<table width="280" border="0">
  <tr>
    <td width="264"><div align="center"><em><strong>Palabras Introducidas</strong></em></div></td>
  </tr>
  <? while($campos=mysql_fetch_array($res)){?>
   <tr>
    <td><div align="center"><? echo $campos[0];?></div></td>
    
  </tr>
  <? } ?>
</table>
<div align="center">
	<a href="bienvenida.php">VOLVER</a>
</div>
</div>
</body>
</html>
