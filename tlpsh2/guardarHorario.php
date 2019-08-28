<?php include_once "encabezado.php";?>
 <?php
if(!isset($_POST["dia"]) || !isset($_POST["hora"]) || !isset($_POST["des"]) ||!isset($_POST["id"])
|| !isset($_POST["aulas"]) ) exit();
 
$dia= $_POST["dia"];
$hora= $_POST["hora"];
$aula=$_POST["aulas"];
$des=$_POST["des"];
$id=$_POST["id"];


echo "ola jaiime ".$id2;
include_once "base_de_datos.php";
//$sentencia = $base_de_datos->prepare("insert into grupo_aula(dia,hora,AULAS_id,GRUPOS_id) values(?,?,?,?);");
$sentencia = $base_de_datos->prepare("insert into grupo_aula(dia,hora,descripcion,id_grupo,id_aula) values(?,?,?,?,?);");

//$resultado = $sentencia->execute([$dia, $hora , $aula,$id]);
$resultado = $sentencia->execute([$dia, $hora ,$des ,$id,$aula]);

 
 
 if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
 
?>

<?php include_once "pie.php" ?>