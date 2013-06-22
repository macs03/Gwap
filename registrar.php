<? 
	session_start();
	include ("conexion.php");
	$link=conectar();
	if($_POST['clave']==$_POST['clave1']){
		$sql="INSERT INTO usuarios VALUES ('".$_POST['nombre']."', '".$_POST['usuario']."', '".$_POST['clave']."', '".$_POST['sexo']."','".$_POST['nace']."','NULL');";
		$con=mysql_query($sql);
		$sql="SELECT * FROM usuarios WHERE usu='".$_POST["usuario"]."' and contra = '".$_POST["clave"]."';";
		$res=mysql_query($sql);
		?>
        	<script>
				alert("usuario resgistrado");
			</script>
        <?
		$con=mysql_fetch_array($res);
			 $_SESSION['id']=$con[5];
			 $_SESSION['usuario']=$con[0];
			 $_SESSION['nick']=$con[1];
		 ?>
			 <script>
				document.location='index.php';
			 </script>
			 <?
	}else{
		?>
        	<script>
				alert("las contraseñas deben coincidir");
				document.location="index.php";
			</script>
        <?
		}
?>