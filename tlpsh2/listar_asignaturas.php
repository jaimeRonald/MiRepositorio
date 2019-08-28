<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
//$sentencia = $base_de_datos->query("select *from asignatura;");
$sentencia = $base_de_datos->query("select *from asignaturas;");
$asignatura = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="col-xs-12">
	<h1>Asignatura</h1>
	<div>
		<a class="btn btn-success"
		href="./asignatura.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>nombre  de asignatura</th>
				<th>creditos</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($asignatura as $Asignaturas){ ?>
				<tr>
					<td><?php echo $Asignaturas->id_asignatura?></td>
					<td><?php echo $Asignaturas->cod_asignatura
					?></td>
					<td><?php echo $Asignaturas->nombre_asignatura
					?></td>
					<td><?php echo $Asignaturas->nro_creditos
					?></td>
					 
					<td><a class="btn btn-warning" href="<?php echo "EditarAsignatura.php?id=" .$Asignaturas->id_asignatura?>">Editar<i class="fa faedit"></i></a></td>
					<td><a class="btn btn-danger"
						href="<?php echo "eliminar.php?id=" . $producto->id?>">Eliminar<i class="fa fatrash"></i></a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>