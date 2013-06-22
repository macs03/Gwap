<? 
	session_start();
	include ("conexion.php");
	$link=conectar();
	$sql="INSERT INTO partidas VALUES ('".$_POST['partida']."','NULL');";
		$con=mysql_query($sql);
		$sql="SELECT * FROM partidas WHERE usu='".$_POST["usuario"]."' and contra = '".$_POST["clave"]."';";
		$res=mysql_query($sql);
		?>
        	<script>
				alert("partida cargada en la base de datos");
			</script>
        <?
	 				?> 
					 <script>
						document.location="bienvenida.php";
					</script>
					 <?
?>