<?php 
include_once "encabezado.php";?>
<?php include_once "base_de_datos.php" ?>
	<div class="col-xs-12">

	<h1>Nuevo Asignatura</h1>
	 
	   

	<form method="post" action="nuevo_asignatura.php">
		<label for="codigo">codigo:</label>
		<input class="form-control" name="codigo" required
		type="text" id="codigo" placeholder="escribe codigo">

	
       

		<label for="precioVenta">Nombres:</label>
		<input class="form-control" name="nombres" required
		type="text" id="nombres" placeholder="nombres">

		<label for="precioCompra">creditos:</label>
		<input class="form-control" name="creditos" required
		type="number" id="creditos" placeholder="creditos">

		 
		<br><br><input class="btn btn-info" type="submit"
		value="Guardar ">

		 
	</form>
</div>
<?php include_once "pie.php" ?>