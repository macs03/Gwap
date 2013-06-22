<?php 
function conectar(){

  $link=mysql_connect("localhost","root","");

	if($link){
   		$l=mysql_select_db("gwap",$link);
		
		if(!$l)
		   echo "Error no existe la BD";
	}
	else
	   echo "Error al conectar con el host";

    return $link;
}
?>