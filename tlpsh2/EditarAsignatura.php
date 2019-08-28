<?php  include_once "encabezado.php"?>

<?php include_once "base_de_datos.php" ?>
<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
 

 $sentencia=$base_de_datos->prepare("select *from asignaturas WHERE id_asignatura =
	?;");
 $sentencia->execute([$id]);
 
$Asignatura = $sentencia->fetch(PDO::FETCH_OBJ);
if($Asignatura === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

 
?>

<h1>Editar Asignatura</h1>
<form method="post" action="guardarEdicionAsignatura.php">
	<input type="hidden" name="id" value="<?php echo $Asignatura->id_asignatura; ?>">

    <label for="codigo">codigo:</label>
		<input value ="<?php echo $Asignatura->cod_asignatura; ?>" class="form-control" name="codigo" required type="text" id="codigo" placeholder="escribe codigo" >

	
       

		<label for="precioVenta">Nombres:</label>
		<input value ="<?php echo $Asignatura->nombre_asignatura; ?>" class="form-control" name="nombres" required type="text" id="nombres" placeholder="nombres">

		<label for="precioCompra">creditos:</label>
		<input value ="<?php echo $Asignatura->nro_creditos; ?>"  class="form-control" name="creditos" required type="number" id="creditos" placeholder="creditos">
		
		<input type="submit" name="Guardar">
</form>