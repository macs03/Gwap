<? 
	session_start();
	$nameimagen = $_FILES['im']['name'];
	$tmimagen = $_FILES['im']['tmp_name'];
	$extimagen = pathinfo($nameimagen);
	$urlnueva ="imagenes/".$nameimagen;
	$ext = array("png","gif","jpg");
	if(is_uploaded_file($tmimagen)){
			if(array_search($extimagen['extension'],$ext)){
					copy($tmimagen,$urlnueva);
					echo "se ha guardado correctamente";
					$name=explode('.',$nameimagen);
					//$_SESSION['imagen']=$nameimagen;
					$_SESSION['imagen']=$name[0];
					 ?> 
					 <script>
						alert("tu nueva imagen ha sido subida");
						document.location="c_imagenes.php";
					</script>
					 <?
				}else{
						echo "solo imagenes con formato (jpg.png,gif)";
						 ?> 
					 <script>
						alert("solo imagenes gif, jpg o png");
						
						document.location="administrador.php";
											</script>
					 <?
					}
				
		}else{
			
				?> 
					 <script>
						alert("elija una imagene");
						
						document.location="administrador.php";
											</script>
					 <?
			}
	
?>
    
</body>
</html>