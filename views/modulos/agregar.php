<h1>Ingresar producto</h1>
         
  </section>
<form method="post">
  <div class="form-group">
    <label >código:</label>
    <input type="number" class="form-control" name="codigo" min=1 required>
  </div>
  <div class="form-group">
    <label >Nombre:</label>
    <input type="text" class="form-control" name="nombre" required>
  </div>
  <div class="form-group">
    <label >Descripción:</label>
    <input type="text" class="form-control" name="descripcion" required>
  </div>  
  <div class="form-group">
    <label >Precio:</label>
    <input type="number" class="form-control" name="precio" min=1 required>
  </div>
  <div class="form-group">
    <label >Moneda:</label>
    <select class="form-control" name="moneda" required>
      <option value="">Seleccionar</option>
      <option value="COP">COP</option>
      <option value="USD">USD</option> 
    </select>   
  </div> 
  <button type="submit" class="btn btn-default">Ingresar</button>

</form>

<?php

$registro = new DatosController();
$registro->ingreso();
 
?>


