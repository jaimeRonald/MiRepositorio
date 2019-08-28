<?php
#Salir si alguno de los datos no está presente
if(
	!isset($_POST["codigo"]) ||
	!isset($_POST["apellidos"]) ||
	!isset($_POST["nombres"]) ||
	!isset($_POST["celular"]) ||
	!isset($_POST["email"]) ||
	!isset($_POST["id"]) 
	 
) exit();

#Si todo va bien, se ejecuta esta parte del código...
	include_once "base_de_datos.php";
	
	$codigo = $_POST["codigo"];
	$apellidos = $_POST["apellidos"];
	$nombres =$_POST["nombres"];
	$celular=$_POST["celular"];
	$email=$_POST["email"];
	$id = $_POST["id"];
	/*$sentencia = $base_de_datos->prepare("update alumno set  codigo =? , apellido=?, nombres=? ,celular=?  ,email=? where id=?;");*/
	$sentencia = $base_de_datos->prepare("update alumnos set  cod_alumno =? , apellidos_alumno=?, nombres_alumno=? ,celular_alumno=?  ,email_alumno=? where id_alumno=?;");
	$resultado = $sentencia->execute([$codigo, $apellidos, $nombres,
		$celular, $email, $id]);
	if($resultado === TRUE){
		header("Location: ./index.php");
		exit;
	}
	else echo "Algo salió mal. Por favor verifica que la tabla exista, así como
	el ID del producto";
	?>
