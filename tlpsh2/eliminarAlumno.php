<?php

if(!isset($_GET["id"])) exit();
$id=$_GET["id"];
include 'base_de_datos.php';
//$sentecia=$base_de_datos->prepare("delete from alumno where id=?;");
$sentecia= $base_de_datos->prepare("delete from alumnos where id_alumno=?;");
$resultado=$sentecia->execute([$id]);
if($resultado===TRUE){
	header("Location: ./listar_alumnos.php");
	exit;
}
else{
	echo "Algo salio mal";
}


?>