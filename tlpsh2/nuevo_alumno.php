<?php include_once "encabezado.php" ?>

<?php 
if(!isset($_POST["codigo"]) || !isset($_POST["apellidos"]) ||
	!isset($_POST["nombres"]) || !isset($_POST["celular"]) ||
	!isset($_POST["email"]))
 exit();

#Si todo va bien, se ejecuta esta parte del código...
	include_once "base_de_datos.php";
$codigo = $_POST["codigo"];
$apellido = $_POST["apellidos"];
$nombre = $_POST["nombres"];
$celular = $_POST["celular"];
$email = $_POST["email"];
$sentencia = $base_de_datos->prepare("insert into alumnos(cod_alumno,apellidos_alumno,nombres_alumno,celular_alumno,email_alumno) values (?,?,?,?,?);");

$resultado = $sentencia->execute([$codigo, $apellido , $nombre ,
	$celular, $email]);

if($resultado === TRUE){
	header("Location: ./index.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
?>