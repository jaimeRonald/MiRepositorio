<?php 
include_once "encabezado.php";
?>
	

	<h1>Nuevo Aulas</h1>
	
	<form method="post" action="nuevo_aula.php">
		<label for="codigo">codigo:</label>
		<input class="form-control" name="codigo" required
		type="text" id="codigo" placeholder="escribe codigo">

		<label for="descripcion">Nombre del Aula:</label>
		<input class="form-control" name="nombre" required
		type="text" id="nombre" placeholder="nombre del aula">

	 

		<br><br><input class="btn btn-info" type="submit"
		value="Guardar ">
	</form>
</div>
<?php include_once "pie.php" ?>