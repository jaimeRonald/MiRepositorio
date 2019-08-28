<?php include_once "encabezado.php";?>
<?php include_once "base_de_datos.php" ?>
	<div class="col-xs-12">

	<h1>Nuevo Grupo</h1>
	 <a class="btn btn-info"  href="./listar_profesores.php">LISTA  DE PROFESORES</a><br><br>
	  


	 <?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
/*$sentencia = $base_de_datos->prepare("select *from docente WHERE id =
	?;");*/
$sentencia = $base_de_datos->prepare("select *from docentes WHERE id =
	?;");	

 $sentencia->execute([$id]);
 
$Profesores= $sentencia->fetch(PDO::FETCH_OBJ);
if($Profesores === FALSE){
	echo "¡No existe algún Docente con ese ID!";
	exit();
}

$sentencia2 = $base_de_datos->query("select *from asignatura;");
$asignatura2 = $sentencia2->fetchAll(PDO::FETCH_OBJ);
 
?>

<div class="col-xs-12">
	<h1>Editar Docente con el ID <?php echo $Profesores->id;
	?></h1>
	<form method="post" action="guardarGrupo.php">
		<input type="hidden" name="id" value="<?php echo $Profesores->id_docentes; ?>">

        <label for="codigoM">Codigo de Grupo:</label>
		<input class="form-control" name="codigoM" required type="text" id="codigo"
		placeholder="Escribe el codigo de matricula">

		<label for="codigo">Codigo:</label>
		<input value="<?php echo $Profesores->cod_docente; ?>"
		class="form-control" name="codigo" required type="text" id="codigo"
		placeholder="Escribe el código">

	    <label for="apellido">Apellidos:</label>
		<input value="<?php echo $Profesores->apellidos_docente; ?>"
		class="form-control" name="apellidos" required type="text"
		id="apellido" placeholder="Apellidos">

		<label for="nombres">Nombres:</label>
		<input value="<?php echo $Profesores->nombres_docente; ?>"
		class="form-control" name="nombres" required type="text"
		id="nombre" placeholder="Nombres">

		<label for="celular">Celular:</label>
		<input value="<?php echo $Profesores->celular_docente; ?>"
		class="form-control" name="celular" required type="number"
		id="celular" placeholder="Celular">

		<label for="email">Email:</label>
		<input value="<?php echo $Profesores->email_docente;?>"
		class="form-control" name="email" required type="text"
		id="existencia" placeholder="Email">

	   <select name="curso">
         <?php $con=0; foreach($asignatura2 as $Asignaturas){ ?>
				  
				 <option value="<?php echo  $con;?>"><?php echo $Asignaturas->nombre_asignatura?></option> 
					 
		 <?php $con++; } ?>

	    </select>

			  
		
		<br><br><br><br><input class="btn btn-info" type="submit"value="Guardar">

        

		<a class="btn btn-warning" href="./index.php.php">Cancelar</a>
	</form>
</div>

<?php include_once "pie.php" ?>