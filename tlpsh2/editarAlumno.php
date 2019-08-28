 

 <?php include_once "encabezado.php";?>
<?php include_once "base_de_datos.php" ?>
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("select *from alumnos WHERE id_alumno =
	?;");
 $sentencia->execute([$id]);
 
$Alumnos = $sentencia->fetch(PDO::FETCH_OBJ);
if($Alumnos === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

 
?>




	<h1>Editar Alumno</h1>
	<form method="post" action="guardarEdicionAlumno.php">
		<input type="hidden" name="id" value="<?php echo $Alumnos->id_alumno; ?>">
		 
		<label for="codigo">Codigo:</label>
		<input value="<?php echo $Alumnos->cod_alumno; ?>"
		class="form-control" name="codigo" required type="text"
		id="codigo" placeholder="Codigos">

		<label for="apellido">Apellidos:</label>
		<input value="<?php echo $Alumnos->apellidos_alumno; ?>"
		class="form-control" name="apellidos" required type="text"
		id="apellido" placeholder="Apellidos">

		<label for="nombres">Nombres:</label>
		<input value="<?php echo $Alumnos->nombres_alumno; ?>"
		class="form-control" name="nombres" required type="text"
		id="nombre" placeholder="Nombres">

		<label for="celular">Celular:</label>
		<input value="<?php echo $Alumnos->celular_alumno; ?>"
		class="form-control" name="celular" required type="number"
		id="celular" placeholder="Celular">

		<label for="email">Email:</label>
		<input value="<?php echo $Alumnos->email_alumno ;?>"
		class="form-control" name="email" required type="text"
		id="existencia" placeholder="Email">

		<br><br><input class="btn btn-info" type="submit"
		value="Guardar ">

		 
	</form>
	
</div>
<?php include_once "pie.php" ?>