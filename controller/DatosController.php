<?php

include 'model/Datos.php';
 
class DatosController
{

	public function ingreso()
	{
		if (isset($_POST["codigo"])) {			
		 
			 $datos = array('codigo' => $_POST["codigo"],
			 				'nombre' => $_POST["nombre"],
			 				'descripcion' => $_POST["descripcion"],			 			
			 				'precio' => $_POST["precio"],
			 				'moneda' => $_POST["moneda"]);

			$respuesta = Datos::ingresoDatos($datos, "productos");
			

			echo $respuesta; 

		 }
	}


	public function loginAccion()
	{
		if (isset($_POST["correo"])) {			
		 
			 $datos = array('correo' => $_POST["correo"],
			 				'password' => $_POST["password"]
			 			    );

			 $respuesta = Datos::login($datos, "usuarios");

			 $password = crypt($_POST["password"],'$2a$07$usesomesillystringforsalt$');

			 if($respuesta["correo"] == $_POST["correo"] && $respuesta["password"] == $password){

			 	session_start();
			 	
			 	$_SESSION["validar"] = true;

			 	header("location:index.php");
			 }else
			 {
			 	echo "Error";
			 }

		 }
	}

	public function productosAccion()
	{
		 $respuestas = Datos::productos("productos");
		 return $respuestas;		
	}







	
	 
}