<?php include_once "encabezado.php";?>
 <?php
if(!isset($_POST["id"]) || !isset($_POST["curso"]) || !isset($_POST["codigoM"])) exit();
echo "llegamos aqui";
$id = $_POST["id"];
$id2 = $_POST["curso"];
$codigo=$_POST["codigoM"];

echo "ola jaiime ".$id2;
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("insert into matriculas(cod_matriclua,id_alumno,id_asignatura) values(?,?,?);");

$resultado = $sentencia->execute([$codigo, $id , $id2]);

 
 
 if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
 
?>

<?php include_once "pie.php" ?>