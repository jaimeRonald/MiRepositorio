<?php 
include_once "encabezado.php";?>
<?php include_once "base_de_datos.php" ?>

<div class="col-xs-12">
	<form method="post" action="listar_alumnos.php">
		<h1>Reporte de Alumnos</h1>
		<input class="btn btn-info"  type="submit" name="r1" value="LISTA ALUMNOS">
	</form>

    <form method="post" action="listar_profesores.php">
	<h1>Reporte de Profesores</h1>
	<input class="btn btn-info"  type="submit" name="r2" value="LISTA DOCENTES"><br><br>
    </form>

    <form method="post" action="listar_asignaturas.php">
    	<h1>Reporte de Asignaturas</h1>
    	<input class="btn btn-info" type="submit" name="r3" value ="LISTA DE ASIGNATURAS "><br><br>
    </form>

	 

	
</div>
<?php include_once "pie.php" ?>