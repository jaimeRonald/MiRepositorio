<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
/*$sentencia = $base_de_datos->query("select grupos.id, docente.nombres,asignatura.nombre from grupos,docente,asignatura where 
asignatura.id=grupos.ASIGNATURA_id and
grupos.id=docente.id;");*/
$sentencia = $base_de_datos->query("select grupos.id_grupo, docentes.nombres_docente,asignaturas.nombre_asignatura from grupos,docentes,asignaturas where 
asignaturas.id_asignatura=grupos.id_asignatura and
grupos.id_docente=docentes.id_docente;");
$Grupo = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="col-xs-12">
	<h1>Asignatura</h1>
	<div>
		<a class="btn btn-success"
		href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
	</div>
	<br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				
				<th>Docente</th>
				<th>Asignatura</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($Grupo as $Grupos){  // recorremos la tabla resultado de la consulta de qeu hicimos  ?>
				<tr>
					<td><?php echo $Grupos->id_grupo?></td>
					<td><?php echo $Grupos->nombres_docente
					?></td>
					<td><?php echo $Grupos->nombre_asignatura
					?></td>
					 
					 
					<td><a class="btn btn-warning" href="<?php echo "asignatura.php?id=" .$Grupos->id_grupo?>">Ver<i class="fa faedit"></i></a></td>
					<td><a class="btn btn-danger"
						href="<?php echo "eliminar.php?id=" . $Grupos->id_grupo?>">Eliminar<i class="fa fatrash"></i></a></td>

						<td><a class="btn btn-warning" href="<?php echo "horarios.php?id=" .$Grupos->id_grupo?>">Seleccionar<i class="fa faedit"></i></a></td>
					<?php } ?>
					</tr>

					
			</tbody>
		</table>
	</div>