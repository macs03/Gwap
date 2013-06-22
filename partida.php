<? 
	session_start();
	$_SESSION['par']=$_GET['part'];
	/*$num=rand(1,10);
	include ("conexion.php");
	$link=conectar();
	$query="select * from imagenes WHERE numero='".$num."'";

	$equery=mysql_query($query);
	$campos=mysql_fetch_array($equery);
	$im= "imagenes/". $campos[0];*/
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
<link rel="shortcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>myGWAP</title>
<script>
	var CronoID = null;
	var CronoEjecuntandose = false;
	//var CronoID2 = null;
	//var CronoEjecuntandose2 = false;
	var decimas, segundos, minutos;
	//var decimas2, segundos2, minutos2;
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
	ajax.open( "GET", "mostrar_imagen.php", true ); 
	ajax.send( "" );
}

	
	function DetenerCrono(){
			if(CronoEjecutandose)
				 clearTimeout(CronoID);
			CronoEjecutandose = false;
		}
	function InicializarCrono(){
			decimas=0;
			segundos=0;
			minutos=0;
			
			document.crono.display.value = '00:00:0';
		}
		/*function InicializarCrono2(){
			decimas2=0;
			segundos2=0;
			minutos2=0;
		}*/
	function MostrarCrono(){
			decimas++;
			if(decimas>9){
					decimas=0;
					segundos++;
					if(segundos>59){
							segundos=0;
							minutos++;
							if(minutos==1 || minutos==2){
									//document.location='partida.php';
									llamada_programa();
								}
							if(minutos==3){
									alert("fin de la partida")
									DetenerCrono();
									document.location = "dicha.php";
									return true;
								}
						}
				}
			var ValorCrono = "";
			ValorCrono = (minutos<10) ? "0" + minutos : minutos;
			ValorCrono += (segundos<10) ? ":0" + segundos : ":"+ segundos;
			ValorCrono += ":" + decimas;
	
			document.crono.display.value = ValorCrono;
			CronoID = setTimeout("MostrarCrono()",100);
			CronoEjecutandose = true;
			return true;
		}
		function IniciarCrono(){
				//DetenerCrono();
				InicializarCrono();
				MostrarCrono();
			}
	/*	function MostrarCrono2(){
			decimas2++;
			if(decimas2>9){
					decimas2=0;
					segundos2++;
					if(segundos2>59){
							segundos2=0;
							minutos2++;
							if(minutos2==1 || minutos2==2){
									//document.location='partida.php';
									contador();
								}
							if(minutos2==99){
									alert("supero tiempo de espera");
									DetenerCrono();
									document.location = "bienvenida.php";
									return true;
								}
						}
				}
			/*var ValorCrono = "";
			ValorCrono = (minutos2<10) ? "0" + minutos2 : minutos2;
			ValorCrono += (segundos2<10) ? ":0" + segundos2 : ":"+ segundos2;
			ValorCrono += ":" + decimas2;*/
	
			//document.crono.display.value = ValorCrono;
		/*	CronoID2 = setTimeout("MostrarCrono()",100);
			CronoEjecutandose2 = true;
			return true;
		}
		function IniciarCrono2(){
				//DetenerCrono();
				InicializarCrono2();
				MostrarCrono2();
			}*/
function funcionCallback_2()
{
	// Comprobamos si la peticion se ha completado (estado 4)
	if( ajax.readyState == 4 )
	{
		// Comprobamos si la respuesta ha sido correcta (resultado HTTP 200)
		if( ajax.status == 200 )
		{
			// Escribimos el resultado en la pagina HTML mediante DHTML
			document.all.salida2.innerHTML = "<b>"+ajax.responseText+"</b>";	
		}
	}
}
function palabra()
	{
		/*var palabra = document.getElementById('dato').value;
		document.getElementById('dato2').value=palabra;*/
		// Creamos el control XMLHttpRequest segun el navegador en el que estemos 
	
    if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest(); // No Internet Explorer
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Internet Explorer

	// Almacenamos en el control al funcion que se invocara cuando la peticion
	// cambie de estado	
	ajax.onreadystatechange = funcionCallback_2;

	// Enviamos la peticion
	ajax.open( "GET", "palabra.php?pal="+document.all.dato.value, true );       
	//ajax.open( "GET", "mostrar_imagen.php", true ); 
	ajax.send( "" );
	}
/*function funcionCallback_3()
{
	// Comprobamos si la peticion se ha completado (estado 4)
	if( ajax.readyState == 4 )
	{
		// Comprobamos si la respuesta ha sido correcta (resultado HTTP 200)
		if( ajax.status == 200 )
		{
			// Escribimos el resultado en la pagina HTML mediante DHTML
			document.all.salida3.innerHTML = "<b>"+ajax.responseText+"</b>";	
		}
	}
}
function contador()
	{
		/*var palabra = document.getElementById('dato').value;
		document.getElementById('dato2').value=palabra;*/
		// Creamos el control XMLHttpRequest segun el navegador en el que estemos 
	
   /* if( window.XMLHttpRequest )
		ajax = new XMLHttpRequest(); // No Internet Explorer
	else
		ajax = new ActiveXObject("Microsoft.XMLHTTP"); // Internet Explorer

	// Almacenamos en el control al funcion que se invocara cuando la peticion
	// cambie de estado	
	ajax.onreadystatechange = funcionCallback_3;

	// Enviamos la peticion
	//ajax.open( "GET", "palabra.php?pal="+document.all.dato.value, true );       
	ajax.open( "GET", "cont_usu.php", true ); 
	ajax.send( "" );
	}	*/	
</script>
</head>
<link rel="stylesheet" type="text/css" href="estilos.css" />

<body>
<? $active_users=usuarios_activos();?>
<div class="cabecera"></div>
<div class="login">
<h1>Partida: <? echo $_SESSION['par'];?> Usuario: <? echo $_SESSION['usuario'];?></h1>
</div>
<div class="contenedor">
	<form name="crono">
		<input type="text" size="8" name="display" value="00:00:0" readonly="readonly"/>
    </form>
    
USUARIOS CONECTADOS= <? echo $_SESSION["usu"];?>
    <script>
		//IniciarCrono2();
	</script>
    <? 
		$cont =2;	
		if( $_SESSION["usu"]==5){?>
			<script> 
			IniciarCrono();
			llamada_programa();
            </script><?
		}
		if( $_SESSION["usu"]>5){?>
			<script> 
				alert("sala llena");
				document.location="bienvenida.php";
            </script><?
		}
	?>
    <a href="bienvenida.php">VOLVER A MI PAGINA</a>
    <div class="imagen">
		
    <span id="salida"></span>
    </div>
    <form name="pal">
    	<input  type="text" name="dato" id="dato" size="70px" onkeypress="" />
        <input type="button" name="subir" id="subir" value="SUBIR" onclick="palabra()"/>
    </form>
    <span id="salida2"></span>
    <script>
	
	</script>
</div>
</body>
</html>