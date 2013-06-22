<? 
	session_start();
	function usuarios_activos(){
			global $REMOTE_ADDR;
			$ip= $REMOTE_ADDR;
			$ahora=time();
			$conn=mysql_connect("localhost","root","");
			mysql_select_db("gwap",$conn);
			$limite=$ahora-3*60;
			$ssql="delete from control_ip where fecha <".$limite;
			mysql_query($ssql);
			$ssql="select ip, fecha from control_ip where ip =".$ip;
			$result=mysql_query($ssql);
			if(mysql_num_rows($result)!=0)
					$ssql="update control_ip set fecha =".$ahora."where ip=".$ip;
			else
				//$ssql="insert into control_ip (ip,fecha) values ('$ip',$ahora)";
				$ssql="INSERT INTO control_ip VALUES ('".$ip."','".$_SESSION['par']."','".$ahora."');";
			mysql_query($ssql);
			//$ssql="select ip from control_ip ";
			$ssql="SELECT ip FROM control_ip WHERE sala='".$_SESSION['par']."' ;";
			$result=mysql_query($ssql);
			$usuarios=mysql_num_rows($result);
			mysql_free_result($result);
			//echo $usuarios;
			$_SESSION["usu"]=$usuarios;
			return $usuarios;
		}
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? $active_users=usuarios_activos();?>
USUARIOS CONECTADOS= <? echo $_SESSION["usu"];?>
</body>
</html>
