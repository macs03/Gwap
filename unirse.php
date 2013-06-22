<? 
	session_start();
	include ("conexion.php");
	$link=conectar();
	$query="select * from partidas";

	$equery=mysql_query($query);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
	<table width="207" border="4">
  <tr>
    <td width="191">NOMBRE DE LA PARTIDA</td>
  </tr>
  <? while($campos=mysql_fetch_array($equery)){?>
   <tr>
    <td><a href="partida.php?part=<? echo $campos[0]?>"><? echo $campos[0];?></a></td>
    
  </tr>
  <? } ?>
</table>

</body>
</html>
