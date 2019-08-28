<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("select *from docentes;");
$profesor = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="col-xs-12">
	<h1>Docentes</h1>
	<div>
		<a class="btn btn-success"
		href="./docentes.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>celular</th>
				<th>email</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($profesor as $Profesores){ ?>
				<tr>
					<td><?php echo $Profesores->id_docente?>
				    </td>
					<td><?php echo $Profesores->cod_docente;
					?></td>
					<td><?php echo $Profesores->apellidos_docente;
					?></td>
					<td><?php echo $Profesores->nombres_docente;
					?></td>
					<td><?php echo $Profesores->celular_docente;
					?></td>
					<td><?php echo $Profesores->email_docente;
					?></td>
					 
					 <?php if(isset($_POST["r2"])){?>
					 
						<td><a class="btn btn-warning" href="<?php echo "editarDocente.php?id=" .$Profesores->id_docente?>">Ver<i class="fa faedit"></i></a></td>
						<td><a class="btn btn-danger"
							href="<?php echo "eliminarDocente.php?id=" . $Profesores->id_docente?>">Eliminar<i class="fa fatrash"></i></a></td>

					  <?php }?>
                     
                     <?php if(!isset($_POST["r2"])){ /* solo para reportes permitira modificar*/ ?>

					
					<td><a class="btn btn-warning" href="<?php echo "grupo.php?id=" .$Profesores->id_docente?>">Seleccionar<i class="fa faedit"></i></a></td>
					<?php }?>

					<?php } ?>
			</tbody>
		</table>
	</div>
	<?php include_once "pie.php" ?>