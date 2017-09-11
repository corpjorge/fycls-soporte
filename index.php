<?php

session_start();

require_once 'controller/InicioController.php';
require_once 'controller/DatosController.php';
require_once 'model/Inicio.php';

if (isset($_SESSION["validar"])) {

  $inicio = new InicioController();
  $inicio->plantilla();

}else{

$inicio = new InicioController();
$inicio->plantillaLogin();

}



 