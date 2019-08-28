<?php include_once "encabezado2.php" ?>
<?php
include_once "base_de_datos.php";

function datos($hora, $dia, $docente){
    $consulta = "select    nombres_docente, nombre_aula ,nombre_asignatura from GRUPOS
    inner join ASIGNATURAS on GRUPOS.id_asignatura =ASIGNATURAS.id_asignatura
    inner join DOCENTES on GRUPOS.id_docente =DOCENTES.id_docente
	inner join GRUPO_AULA on GRUPOS.id_grupo = GRUPO_AULA.id_grupo
    inner join AULAS on GRUPO_AULA.id_aula = AULAS.id_aula
    where    hora = '$hora' and dia = '$dia' and nombres_docente = '$docente';";
    return $consulta;
}

$horas =  $base_de_datos->query("select hora from HORAS;");

?>
	<div class="col-xs-12">
		<h1>Horarios</h1>
		<br>
		<form method="post" action="horarioDocente.php">
			<label for="codigo">Código de Matricula:</label>
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

							<?php 
							   $lunes =  $base_de_datos->query(datos($row['hora'], 'Lunes', $codigo));
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
							<td><?php echo $lu['nombres_docente']."<br>".$lu['nombre_aula']."<br>".$lu["nombre_asignatura"]."<br>"

							?></td>
							<td><?php echo $ma['nombres_docente']."<br>".$ma['nombre_aula']."<br>".$ma["nombre_asignatura"]."<br>"?></td>

							<td><?php echo $mi['nombres_docente']."<br>".$mi['nombre_aula']."<br>".$mi["nombre_asignatura"]."<br>"?></td>

							<td><?php echo $ju['nombres_docente']."<br>".$ju['nombre_aula']."<br>".$ju["nombre_asignatura"]."<br>"?></td>

							<td><?php echo $vi['nombres_docente']."<br>".$vi['nombre_aula']."<br>".$vi["nombre_asignatura"]."<br>"?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			<?php }
		?>
	</div>
<?php include_once "pie.php" ?>