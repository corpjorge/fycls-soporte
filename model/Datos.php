<?php

include 'config/conexion.php';

class Datos extends Conexion
{

	public function ingresoDatos($datos, $tabla)
	{	 		  

		$dbh = Conexion::conectar();
		$ingresar = $dbh->prepare(
		"INSERT INTO $tabla 
			(`id`, `codigo`, `nombre`, `descripcion`, `precio`, `moneda`) 
		 VALUES (NULL, :codigo, :nombre, :descripcion, :precio, :moneda)"
		);	

		 
 
		$ingresar->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
 		$ingresar->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
 		$ingresar->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR); 		
 		$ingresar->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
 		$ingresar->bindParam(":moneda", $datos["moneda"], PDO::PARAM_STR); 	
 
 		
 		if ($ingresar->execute()) {
 			$id = $dbh->lastInsertId(); 
 			include 'model/js/variacion.php'; 	
 			include 'model/js/producto.php'; 	
 			//header("location: index.php?ok=1");	 
 			
 		}
 		else{
 			return "error";
 		} 	

 		//$ingresar->close();  
		 
	}

	public function login($datos, $tabla)
	{

		$selecionar = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE correo = :correo");
		$selecionar->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$selecionar->execute();
		return $selecionar->fetch();

		$selecionar->close();
		 
	}

	public function productos($tabla)
	{
		$selecionar = Conexion::conectar()->prepare("SELECT * FROM $tabla");	
		$selecionar->execute();
		return $selecionar->fetchAll();	
		$selecionar->close();	 
	}
	
	 
}