<?php

class Inicio
{
	
	 public function paginas($url)
	 {
	 	if ($url == "agregar" || $url == "inicio" ) {
	 		
	 		$paginaRespuesta = "views/modulos/".$url.".php";
	 	}
	 	elseif ($url == "") {
	 		
	 		$paginaRespuesta = "views/modulos/inicio.php";
	 	}
	 	elseif ($url == "ok" ) {
	 		
	 		$paginaRespuesta = "views/modulos/inicio?ok=1.php";
	 	}
	 	elseif ($url == "cerrar" ) {	 		
	 		session_destroy();	 		
	 		header("location:index.php");
	 	}	 	
	 	else{
	 		$paginaRespuesta = "views/modulos/erro404.php";
	 	}
	 	return $paginaRespuesta;
	 }
}