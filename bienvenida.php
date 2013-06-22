<? 
	session_start(); 
?>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico"/>
<title>myGWAP</title></head>
<link rel="stylesheet" type="text/css" href="estilos.css" />
<body onUnload="">
<div class="cabecera"></div>
<div class="login">
<h1>BIENVENIDO <? echo $_SESSION['usuario'];?></h1>
</div>
<p>
  <script>
var ajax;

function funcionCallback()
{
	// Comprobamos si la peticion se ha completado (estado 4)
	if( ajax.readyState == 4 )
	{
		// Comprobamos si la respuesta ha sido correcta (resultado HTTP 200)
		if( ajax.status == 200 )
		{
			// Escribimos el resultado en la pagina HTML mediante DHTML
			document.all.salida.innerHTML = "<b>"+ajax.responseText+"</b>";	
		}
	}
}

function llamada_programa()
{
	// Creamos el control XMLHttpRequest segun el navegador en el que estemos 
	
    if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest(); // No Internet Explorer
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Internet Explorer

	// Almacenamos en el control al funcion que se invocara cuando la peticion
	// cambie de estado	
	ajax.onreadystatechange = funcionCallback;

	// Enviamos la peticion
	//ajax.open( "GET", "pagina2.php?cedula="+document.all.entrada.value, true );       
	ajax.open( "GET", "crear_partida.php", true ); 
	ajax.send( "" );
}

function consulta()
{
	// Creamos el control XMLHttpRequest segun el navegador en el que estemos 
	
    if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest(); // No Internet Explorer
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Internet Explorer

	// Almacenamos en el control al funcion que se invocara cuando la peticion
	// cambie de estado	
	ajax.onreadystatechange = funcionCallback;

	// Enviamos la peticion
	ajax.open( "GET", "unirse.php", true );       
	//ajax.open( "GET", "prueba.php", true ); 
	ajax.send( "" );
}
function estadistica()
{
	// Creamos el control XMLHttpRequest segun el navegador en el que estemos 
	
    if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest(); // No Internet Explorer
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Internet Explorer

	// Almacenamos en el control al funcion que se invocara cuando la peticion
	// cambie de estado	
	ajax.onreadystatechange = funcionCallback;

	// Enviamos la peticion
	ajax.open( "GET", "estadisticas.php", true );       
	//ajax.open( "GET", "prueba.php", true ); 
	ajax.send( "" );
}
</script>
 <div class="contenedor"> <br/>
  <br/>
  
  <input type="button" value="NUEVA PARTIDA" onClick="llamada_programa()"/>
  <input type="button" value="UNIRSE A PARTIDA" onClick="consulta()"/>
  <input type="button" value="ESTADISTICAS" onClick="estadistica()"/>
  <a href="cerrar_sesion.php"> CERRAR SESION </a>
</p>
<p><br/>
  <br/>
   <span id="salida"></span>  </p>
<p>&nbsp;</p>
<p><br/>
  <br/>
  <br/>
  <br/>
</p>
</div>
</body>
</html>
