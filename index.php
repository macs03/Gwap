<? 
	session_start();
	include("conexion.php");
	conectar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="favicon.ico"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GWAP</title></head>
<link rel="stylesheet" type="text/css" href="estilos.css" />
<body>
	<div class="cabecera"></div>
<div class="contenedor">
	<form action="iniciar.php" method="post" name="inicio_sesion" id="inicio_sesion" >
   <h2><em><strong>INICIAR SESSION</strong></em></h2>
    <div class="login">
    	
<label>Usuario:</label><input type="text" name="usuario" id="usuario"  />
        <label>Contraseña:</label><input type="password" name="clave" id="clave"  />
        <input  type="submit" name="enviar" id="enviar" value="Iniciar Sesion"/>
      </div>
    </form>
   
        <div class="registrarse">
        <h2>Si quieres jugar y no tienes cuenta. REGISTRATE</h2>
        <form action="registrar.php" method="post" name="registrar" id="registrar" >
    	<label>Nombre:</label><input type="text" name="nombre" id="nombre"  /><br />
        <label>Usuario:</label><input type="text" name="usuario" id="usuario"  /><br />
        <label>Contraseña:</label><input type="password" name="clave" id="clave"  /><br />
        <label>Repetir contraseña:</label><input type="password" name="clave1" id="clave1"  /><br />
        <label>Sexo:</label><input type="text"   name="sexo" id="sexo"  /><br />
        <label>Fecha de nacimiento:</label><input type="text" name="nace" id="nace"  /><br />
        <input  type="submit" name="enviar" id="enviar" value="Registrarse"/>
        <input type="reset" name="limpiar" id="limpiar" value="limpiar"/>
    	</form>
        
  </div>
    <div class="instrucciones">
    		<h2><strong><em>INSTRUCCIONES</em></strong></h2>
            <p>
          		GWAP es un juego experimental que ayuda a los sistemas informaticos a mejorar sus resultados en una busqueda.
                para poder colaborar en esta mision usted podra jugar y asi ayudar a que los sistemas sean mas inteligentes.
                <br /><br />
                1. Consta de un minimo de 5 jugadores por partida.<br /><br />
                2. Una vez iniciada la sesion usted podra acceder alguna sala de juego en la que haya cupo maximo 5.<br /><br />
                3. Al usted ingresar se le mostrara una imagen escogida aleatoriamente.<br /><br />
                4. La duracion de cada juego es de 3 minutos y 3 imagenes, es decir, 1 minuto por cada imagen.<br /><br />
                5. Cada coincidencia valdra 100 puntos, es decir, si ud escribe la palabra "perro" y al transcurrir del juego alguien 
                mas introduce esa palabra ud obtendra 100 puntos y asi sucesivamente.<br /><br />
                6. El juego culmina cuando se agota el tiempo de juego.<br /><br />
                7. el ganador sera aquel que obtenga mas puntos durante la partida.<br /><br />
                  	
            </p>
  </div>
        	<h2><strong><em>Mejores Puntajes</em></strong></h2>
         <div class="estadisticas">
           
            	<? 
	$sql="SELECT * FROM puntos ORDER BY punto;";
	$res=mysql_query($sql);
		//$campos=mysql_fetch_array($res);
		
?>   	
<table width="280" border="0">
  <tr>
    <td width="264"><div align="center"><em><strong>NOMBRES</strong></em></div></td>
    <td width="264"><div align="center"><em><strong>Puntos</strong></em></div></td>
  </tr>
  <? while($campos=mysql_fetch_array($res)){
  	
	$sql2="SELECT * FROM usuarios WHERE id='".$campos[1]."';";
	$resu=mysql_query($sql2);
	$campo=mysql_fetch_array($resu);
  ?>
   <tr>
    <td><div align="center"><? echo $campo[0];?></div></td>
    
    <td><div align="center"><? echo $campos[0];?></div></td>
   </tr>
  <? } ?>
</table>
            
  </div>
        	<h2><strong><em>BUSCADOR</em></strong></h2>
         <div class="buscador">
           
            	<form action="resultados_bus.php" name="buscador" id="buscador" method="post"  >
				  <input type="text" name="busqueda" id="busqueda" size="100px"  />
                    <input type="submit" name="buscar" id="buscar" value="BUSCAR">
                </form> 	
            
</div>
    </div>
</body>
</html>