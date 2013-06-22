<? 
	session_start();
//	echo $_POST['busqueda'];
	include ("conexion.php");
	$link=conectar();
	$query="select * from descripcion WHERE descripcion='".$_POST['busqueda']."'";
	$res=mysql_query($query);
	$campos=mysql_fetch_array($res);
	//echo $campos[1]; 
	
	$query2="select * from imagenes WHERE numero='".$campos[1]."'";
	
	if($equery=mysql_query($query2)){
			if($campos2=mysql_fetch_array($equery)){
			//	echo $campos2[0];
				$im= "imagenes/". $campos2[0];
				$_SESSION['im']=$im;
			}else{
			?>
            	<script>
					alert("sin resultados");
					document.location= "index.php";
				</script> 
			<?
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BUSQUEDA</title>
<link rel="stylesheet" type="text/css" href="estilos.css" />
</head>
	
<body>
<div class="cabecera"></div>
<div class="contenedor">
	<label><a href="index.php">NUEVA BUSQUEDA</a></label>
	<img src="<? echo $_SESSION['im']; ?>.jpg" width="500" height="500" />
</div>
</body>
</html>