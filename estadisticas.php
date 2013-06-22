<? 
	session_start();
	include ("conexion.php");
	$link=conectar();
	$sql="SELECT * FROM puntos WHERE id_usu= '".$_SESSION['id']."' ;";
	$res=mysql_query($sql);
		$campos=mysql_fetch_array($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
	<h2>ESTADISTICAS DE <? echo $_SESSION['usuario'];?></h2>
    <h3>MAYOR PUNTAJE = <? echo $campos[0];?></h3>
</body>
</html>
