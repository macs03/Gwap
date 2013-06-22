<? 
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myGWAP</title>
</head>
<link rel="stylesheet" type="text/css" href="estilos.css" />

<body>
	<div class="cabecera"></div>
	<div class="login">
    
    <h1>BIENVENIDO ADMINISTRADOR <? echo $_SESSION['usuario']; ?> Seleccione su nueva Imagen</h1>			
    </div>
<div class="contenedor">
    <div class="login">
    <form method="post" action="subir.php" enctype="multipart/form-data">
    <input name="im" type="file"/><br /><br />
    <input name="enviar" type="submit" value="Subir Imagen" />
    <input name="limpiar" type="reset" value="Limpiar" />
    <a href="cerrar_sesion.php" > cerrar sesion</a>
    </form>
  </div>
    <h2> Tu ultima imagen cargada </h2>
    <? echo $_SESSION['imagen'];?>
    <? $im="imagenes/".$_SESSION['imagen'];?>
<div class="imagen">
	
  <img src="<? echo $im; ?>.jpg" width="500" height="500" /></div>
  </div>
</body>
</html>