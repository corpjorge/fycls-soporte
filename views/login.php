<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     

    <title>PHP</title>

    <!-- Bootstrap core CSS -->
    <link href="web/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="web/  css/login.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Iniciar sesión</h2>
        <label  class="sr-only">Correo</label>
        <input type="email"  class="form-control" placeholder="Correo" name="correo" required autofocus>
        <label class="sr-only">Contraseña</label>
        <input type="password"  class="form-control" placeholder="Contraseña" name= "password" required>
        <div class="checkbox">
         
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
      </form>

    </div>     
  </body>
</html>

<?php

$ingreso = new DatosController();
$ingreso->loginAccion();
 
?>
