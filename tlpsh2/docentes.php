<?php 
include_once "encabezado.php";
?>
	<?php 
include_once "encabezado.php";?>
<?php include_once "base_de_datos.php" ?>
	<div class="col-xs-12">

	<h1>Nuevo Docente</h1>
	<form method="post" action="nuevo_docente.php">
		<label for="codigo">codigo:</label>
		<input class="form-control" name="codigo" required
		type="text" id="codigo" placeholder="escribe codigo">

		<label for="precioVenta">Apellidos:</label>
		<input class="form-control" name="apellidos" required
		type="text" id="apellidos" placeholder="apellidos">

		<label for="precioVenta">Nombres:</label>
		<input class="form-control" name="nombres" required
		type="text" id="nombres" placeholder="nombres">

		<label for="precioCompra">celular:</label>
		<input class="form-control" name="celular" required
		type="number" id="celular" placeholder="celular">

		<label for="existencia">email:</label>
		<input class="form-control" name="email" required
		type="text" id="email" placeholder="email">

		<br><br><input class="btn btn-info" type="submit"
		value="Guardar ">
	</form>
</div>
 
<?php include_once "pie.php" ?>