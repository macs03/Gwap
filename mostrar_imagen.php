<? 
	session_start();
	$_SESSION['par']=$_GET['part'];
	$num=rand(1,12);
	include ("conexion.php");
	$link=conectar();
	$query="select * from imagenes WHERE numero='".$num."'";

	$equery=mysql_query($query);
	$campos=mysql_fetch_array($equery);
	$im= "imagenes/". $campos[0];
	$_SESSION['im']=$im;
	$_SESSION['id_im']=$num;
	//echo $_SESSION['im'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<img src="<? echo $_SESSION['im']; ?>.jpg" width="500" height="500" />
</body>
</html>