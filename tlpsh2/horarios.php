<?php 
include_once "encabezado.php";
?>
	

	<div class="col-xs-12">

	<h1>Nueva Horario</h1>
	<a class="btn btn-info"  href="./lista_Grupos.php">LISTA de Grupos </a><br><br>
	


<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("select grupos.id_grupo, docentes.nombres_docente,asignaturas.nombre_asignatura from grupos,docentes,asignaturas where 
asignaturas.id_asignatura=grupos.id_asignatura and
grupos.id_docente=docentes.id_docente and
grupos.id_grupo=?;");
 $sentencia->execute([$id]);
 
$Horarios = $sentencia->fetch(PDO::FETCH_OBJ);

if($Horarios === FALSE){
	echo "¡No existe algún Grupo con ese ID!";
	exit();
}

$sentencia2 = $base_de_datos->query("select *from aulas;");
$aulas = $sentencia2->fetchAll(PDO::FETCH_OBJ);
 
?>

<div class="col-xs-12">

	<h1>Editar Horario con el grupo con ID <?php echo $Horarios->id_grupo;
	?></h1>
	<form method="post" action="guardarHorario.php">
		<input type="hidden" name="id" value="<?php echo $Horarios->id_grupo; ?>">

        <label for="codigoM">Día:</label>
		<input class="form-control" name="dia" required type="text" id="codigo"
		placeholder="Escribe el codigo de matricula">

		<label for="codigoM">Hora:</label>
		<input class="form-control" name="hora" required type="time" id="codigo"
		placeholder="Escribe el codigo de matricula">

		<label for="descripcion">Descripcion:</label>
		<select name="des">
			<option value="Teoria">teoria</option>
			<option value="Practica">practica</option>
			<option value="Laboratorio">laboratotio</option>
		</select>

		<label for="codigo">Docente:</label>
		<input value="<?php echo $Horarios->nombres_docente;  ?>"
		class="form-control" name="codigo" required type="text" id="codigo"
		placeholder="Escribe el código">

	    <label for="apellido">Asignatura:</label>	
	    <input value="<?php echo $Horarios->nombre_asignatura; ?>"
		class="form-control" name="apellidos" required type="text"
		id="apellido" placeholder="Apellidos">
 

	   <select name="aulas">
         <?php $con=1; foreach($aulas as $Aulas){ ?>
				  
				 <option value="<?php echo  $con;?>"   ><?php echo $Aulas->nombre_aula?></option> 
					 
		 <?php $con++; } ?>

	    </select>

			  
		
		<br><br><br><br><input class="btn btn-info" type="submit"value="Guardar">

        

		<a class="btn btn-warning" href="./index.php.php">Cancelar</a>
	</form>
</div>


<?php include_once "pie.php" ?>