<?php include_once "encabezado2.php" ?>
<?php
include_once "base_de_datos.php";

function datos($hora, $dia, $alumno){
    $consulta = "select  nombre_asignatura, descripcion, nombre_aula from MATRICULAS
	inner join ALUMNOS on MATRICULAS.id_alumno = ALUMNOS.id_alumno
	inner join ASIGNATURAS on MATRICULAS.id_asignatura = ASIGNATURAS.id_asignatura
    inner join GRUPOS on GRUPOS.id_asignatura = ASIGNATURAS.id_asignatura
    inner join GRUPO_AULA on GRUPO_AULA.id_grupo = GRUPOS.id_grupo
	inner join AULAS on GRUPO_AULA.id_aula = AULAS.id_aula
	where hora = '$hora' and dia = '$dia' and nombres_alumno = '$alumno';";
    return $consulta;
}

$horas =  $base_de_datos->query("select hora from HORAS;");

?>
	<div class="col-xs-12">
		<h1>Horarios</h1>
		<br>
		<form method="post" action="alumnos2.php">
			<label for="codigo">Nombre y Apellidos:</label>
			<input autocomplete="on" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		</form>
		<br><br>
		<?php
			if(isset($_POST["codigo"])){?>
				<?php $codigo = $_POST["codigo"];?>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Horas</th>
							<th>Lunes</th>
							<th>Martes</th>
							<th>Miercoles</th>
							<th>Jueves</th>
							<th>Viernes</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row = $horas->fetch(PDO::FETCH_ASSOC)){ ?>

							<?php  $lunes =  $base_de_datos->query(datos($row['hora'], 'Lunes', $codigo));
								$lu = $lunes->fetch(PDO::FETCH_ASSOC);

								$martes =  $base_de_datos->query(datos($row['hora'], 'Martes', $codigo));
								$ma = $martes->fetch(PDO::FETCH_ASSOC);

								$miercoles =  $base_de_datos->query(datos($row['hora'], 'Miercoles', $codigo));
								$mi = $miercoles->fetch(PDO::FETCH_ASSOC);

								$jueves=  $base_de_datos->query(datos($row['hora'], 'Jueves', $codigo));
								$ju = $jueves->fetch(PDO::FETCH_ASSOC);

								$viernes =  $base_de_datos->query(datos($row['hora'], 'Viernes', $codigo));
								$vi = $viernes->fetch(PDO::FETCH_ASSOC);
							?>
						<tr>
							<td><?php echo $row['hora']?></td>
							<td><?php echo $lu['nombre_asignatura']."<br>".$lu['descripcion']."<br>".$lu['nombre_aula']?></td>
							<td><?php echo $ma['nombre_asignatura']."<br>".$ma['descripcion']."<br>".$ma['nombre_aula']?></td>
							<td><?php echo $mi['nombre_asignatura']."<br>".$mi['descripcion']."<br>".$mi['nombre_aula']?></td>
							<td><?php echo $ju['nombre_asignatura']."<br>".$ju['descripcion']."<br>".$ju['nombre_aula']?></td>
							<td><?php echo $vi['nombre_asignatura']."<br>".$vi['descripcion']."<br>".$vi['nombre_aula']?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }
		?>
	</div>
<?php include_once "pie.php" ?>