
<?php 
if(    !isset($_POST["codigo"]) 
	|| !isset($_POST["nombres"]) 
	|| !isset($_POST["creditos"]) 
	|| !isset($_POST["id"]))
 exit();

include_once "base_de_datos.php";
 $sentencia=$base_de_datos->prepare("update asignaturas set cod_asignatura=?,nombre_asignatura=?,nro_creditos=? where id_asignatura=?;");

$codigo=$_POST["codigo"];
$nombre=$_POST["nombres"];
$credito=$_POST["creditos"];
$id=$_POST["id"];

$resultado=$sentencia->execute([$codigo,$nombre,$credito,$id]);
echo "ola".$resultado;
if($resultado===TRUE)
{
	header("Location: ./index.php");
	exit;
}else
{
   echo "Algo salió mal. Por favor verifica que la tabla exista, así como
	el ID de la asignatura";
}

?>
