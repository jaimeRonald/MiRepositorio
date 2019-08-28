<?php include_once "encabezado.php" ?>

<?php 
if(!isset($_POST["codigo"]) || !isset($_POST["nombre"]))
 exit();

#Si todo va bien, se ejecuta esta parte del código...
	include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$nombre = $_POST["nombre"];
 
//$sentencia = $base_de_datos->prepare("insert into aulas(cod_aula,nombre) values (?,?);");
$sentencia = $base_de_datos->prepare("insert into aulas(cod_aula,nombre_aula) values (?,?);");

$resultado = $sentencia->execute([$codigo, $nombre]);
if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>