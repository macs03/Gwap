<? 
	session_start();
	$puntos=0;
		
	$_SESSION['pala']=$_GET["pal"];
	echo $_SESSION['pala'];
	include ("conexion.php");
	$link=conectar();
	$sql="INSERT INTO descripcion VALUES ('".$_GET['pal']."','".$_SESSION['id_im']."','".$_SESSION['id']."','NULL');";
		$con=mysql_query($sql);
		$sql="SELECT * FROM descripcion WHERE id_usu != '".$_SESSION['id']."';";
		$res=mysql_query($sql);
		while($campos=mysql_fetch_array($res)){
			if($campos[0]==$_SESSION['pala']){
				$sql3="SELECT * FROM descripcion ;";
				$res3=mysql_query($sql3);
				$campos3=mysql_fetch_array($res3);
				$puntos=$puntos+100;
				$sql2="INSERT INTO puntos VALUES ('".$puntos."','".$campos[2]."','NULL');";
				$con2=mysql_query($sql2);	
			}
		}
		
	
		
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? echo $campos[0]; ?>
<h2>PUNTOS = <? echo $puntos;?></h2>
</body>
</html>