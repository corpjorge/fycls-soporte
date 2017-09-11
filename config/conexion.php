<?php


/**
* Conexion 
*/
class Conexion
{	

	public function conectar()
	{
		 $bd = new PDO("mysql:host=localhost;dbname=php","root","");
		 return $bd;		 
	}
}
