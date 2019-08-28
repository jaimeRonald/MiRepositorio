<?php include_once "encabezado.php";?>
<?php include_once "base_de_datos.php" ?>
	 

	<h1>Nueva Matricula</h1>
	 <a class="btn btn-info"  href="./listar_alumnos.php">LISTA de Alumnos</a><br><br>
	 <a  class="btn btn-info" href="./listar_asignaturas.php">LISTA  de Asignaturas</a>


	 <?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
/*$sentencia = $base_de_datos->prepare("select *from alumno WHERE id =
	?;");*/

$sentencia = $base_de_datos->prepare("select *from alumnos WHERE id_alumno =
	?;");
 $sentencia->execute([$id]);
 
$Alumnos = $sentencia->fetch(PDO::FETCH_OBJ);
if($Alumnos === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

$sentencia2 = $base_de_datos->query("select *from asignaturas;");
$asignatura2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
 
?>

<div class="col-xs-12">
	<h1>Editar Alumno con el ID <?php echo $Alumnos->id_alumno;
	?></h1>
	<form method="post" action="guardarMatricula.php">
		<input type="hidden" name="id" value="<?php echo $Alumnos->id_alumno; ?>">

        <label for="codigoM">Codigo de matricula:</label>
		<input class="form-control" name="codigoM" required type="text" id="cod_matricula"
		placeholder="Escribe el codigo de matricula">

		<label for="codigo">Codigo:</label>
		<input value="<?php echo $Alumnos->cod_alumno; ?>"
		class="form-control" name="codigo" required type="text" id="codigo"
		placeholder="Escribe el código">

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
		<input value="<?php echo $Alumnos->email_alumno;?>"
		class="form-control" name="email" required type="text"
		id="existencia" placeholder="Email">

	   <select name="curso">
         <?php $con=0; foreach($asignatura2 as $Asignaturas){ ?>
				  
				 <option value="<?php echo  $con;?>"   ><?php echo $Asignaturas->nombre_asignatura?></option> 
					 
		 <?php $con++; } ?>

	    </select>

			  
		
		<br><br><br><br><input class="btn btn-info" type="submit"value="Guardar">

        

		<a class="btn btn-warning" href="./index.php.php">Cancelar</a>
	</form>
</div>

<?php include_once "pie.php" ?>