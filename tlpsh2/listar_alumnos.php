<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
//$sentencia = $base_de_datos->query("select  * from alumno;");
$sentencia = $base_de_datos->query("select  *from alumnos;");
$alumno = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="col-xs-12">
	<h1>Alumnos</h1>
	<div>
		<a class="btn btn-success" href="./alumnos.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>apellidos</th>
				<th>nombres</th>
				<th>celular</th>
				<th>email</th>
				<?php if(isset($_POST["r1"])){ //solo para permitira modificar
			    ?>
				<th>Editar</th>
				<th>Eliminar</th>
				<?php }?>

				 <?php if(!isset($_POST["r1"])){?>// solo para reportes permitira modificar 
				<th>Opcion</th>
			    <?php }?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($alumno as $Alumnos){ ?>
				<tr>
					<td><?php echo $Alumnos->id_alumno?></td>
					<td><?php echo $Alumnos->cod_alumno
					?></td>
					<td><?php echo $Alumnos->apellidos_alumno
					?></td>
					<td><?php echo $Alumnos->nombres_alumno
					?></td>
					<td><?php echo $Alumnos->celular_alumno
					?></td>
					<td><?php echo $Alumnos->email_alumno
					?></td>
                      <?php if(isset($_POST["r1"])){?>
					 
						<td><a class="btn btn-warning" href="<?php echo "editarAlumno.php?id=" .$Alumnos->id_alumno ?>">Ver<i class="fa faedit"></i></a></td>
						<td><a class="btn btn-danger"
							href="<?php echo "eliminarAlumno.php?id=" . $Alumnos->id_alumno?>">Eliminar<i class="fa fatrash"></i></a></td>

					  <?php }?>
                     
                     <?php if(!isset($_POST["r1"])){ /* solo para reportes permitira modificar*/ ?>

					
					<td><a class="btn btn-warning" href="<?php echo "matricula.php?id=" .$Alumnos->id_alumno ?>">Seleccionar<i class="fa faedit"></i></a></td>
					<?php }?>
					</tr>

					
				<?php } ?>
			</tbody>
		</table>
	</div>