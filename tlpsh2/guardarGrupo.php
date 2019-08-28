<?php include_once "encabezado.php";?>
 <?php
if(!isset($_POST["id"]) || !isset($_POST["curso"]) || !isset($_POST["codigoM"])) exit();
 
$id = $_POST["id"];
$id2 = $_POST["curso"];
$codigo=$_POST["codigoM"];
 
include_once "base_de_datos.php";
/*$sentencia = $base_de_datos->prepare("insert into grupos(cod_grupo,DOCENTE_id,ASIGNATURA_id) values(?,?,?);");*/
$sentencia = $base_de_datos->prepare("insert into grupos(cod_grupo,id_docente,id_asignatura) values(?,?,?);");

$resultado = $sentencia->execute([$codigo, $id , $id2]);

 
 
 if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
 
?>

<?php include_once "pie.php" ?>