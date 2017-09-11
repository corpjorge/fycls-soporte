<?php

 

/**
* Controlador de inicio
*/
class InicioController
{
	
	public function Plantilla()
	{
		include "views/plantilla.php";
	}

	public function paginaAccion()
	{
		if (isset($_GET["pag"])) {		 
		
			$url = $_GET["pag"];

		}
		else{
			$url ="inicio";
		}
		$pagina = Inicio::paginas($url);
		include $pagina;		 
	}

	public function plantillaLogin()
	{
		include "views/login.php";
	}
	
}