<? 
	session_start();
	include ("conexion.php");
	$link=conectar();
	$sql="INSERT INTO imagenes VALUES ('".$_SESSION['imagen']."','NULL');";
		$con=mysql_query($sql);
		$sql="SELECT * FROM imagenes WHERE usu='".$_POST["usuario"]."' and contra = '".$_POST["clave"]."';";
		$res=mysql_query($sql);
		?>
        	<script>
				alert("imagen cargada en la base de datos");
			</script>
        <?
		//$con=mysql_fetch_array($res);
			/* $_SESSION['id']=$con[5];
			 $_SESSION['usuario']=$con[0];
			 $_SESSION['nick']=$con[1];*/
	 				?> 
					 <script>
						document.location="administrador.php";
					</script>
					 <?
?>