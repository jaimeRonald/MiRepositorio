<?php include_once "encabezado.php" ?>

<?php 
if(!isset($_POST["codigo"]) || !isset($_POST["nombres"]) ||!isset($_POST["creditos"]) )
	 
exit();

#Si todo va bien, se ejecuta esta parte del código...
	include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$nombre = $_POST["nombres"];
$celular = $_POST["creditos"];
 
//$sentencia = $base_de_datos->prepare("insert into asignatura(cod_asignatura,nombre,creditos) values (?,?,?);");
$sentencia = $base_de_datos->prepare("insert into asignaturas(cod_asignatura,nombre_asignatura,nro_creditos) values (?,?,?);");

$resultado = $sentencia->execute([$codigo, $nombre ,
	$celular]);
if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>