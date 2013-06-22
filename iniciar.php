<? 
session_start();    include('conexion.php');
 if(isset($_SESSION["usuario"])){
  session_destroy();
 }
if(isset($_POST['enviar'])){
	 $link=conectar();
   $sql="SELECT * FROM usuarios WHERE usu='".$_POST["usuario"]."' and contra = '".$_POST["clave"]."';";
	 if($res=mysql_query($sql)){
		  if($con=mysql_fetch_array($res)){
			$_SESSION['id']=$con[5];
			 $_SESSION['usuario']=$con[0];
			 $_SESSION['nick']=$con[1];
			 if($_SESSION['nick']=="admin" && $con[2]=="admin"){
				 	?>
			 			<script>
							document.location='administrador.php';
						 </script>
			 		<?
				 }
			 ?>
			 <script>
				document.location='bienvenida.php';
			 </script>
			 <?
		  }else{
		    ?>
			 <script>
				alert("usuario invalido");
				document.location='index.php';
			 </script>
			 <?
	      }  
  	  }

}
?>