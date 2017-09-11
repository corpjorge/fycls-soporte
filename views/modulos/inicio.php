<h1>Inicio</h1>

<?php if (isset($_GET['ok'])) { ?>
  <div class="alert alert-success">
    <strong>Correcto!</strong> Datos ingresados correctamente.
  </div>
<?php } ?>


<?php

$registros = new DatosController();
$productos = $registros->productosAccion();
 
?>
         
  </section>
  <h2>Section title</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Precio</th>
          <th>Ruta</th>         
        </tr>
      </thead>
      <?php foreach ($productos as $valor) { ?>
        <tr>
          <td><?php echo $valor['id']; ?></td>          
          <td><?php echo $valor['codigo']; ?></td>          
          <td><?php echo $valor['nombre']; ?></td>          
          <td><?php echo $valor['moneda']; ?> <?php echo $valor['precio']; ?></td>          
          <td><a href="http://ariadna.corpjorge.com/drupal/web/product/<?php echo $valor['id']; ?>" target="_blank">Ver en drupal</a> </td>         
        </tr>               
      <?php } ?>

      <tbody>
      
      </tbody>
    </table>
  </div>
