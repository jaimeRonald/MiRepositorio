<!DOCTYPE html>
<head>
	<title>Log In</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
 <?php 
include_once "encabezado2.php";?>
<?php include_once "base_de_datos.php" ?>
	<div class="loginBox">
 		<img src="user.png" class="user" alt="user">
		 <form action="compruebaLogin.php" method="post">
 			<p>Email</p>
			<input type="text" name="login" placeholder="Ingrese Email">
			<p>Password</p>
			<input type="password" name="password" placeholder="••••••">
			<input type="submit" name="enviar" value="Entrar">
			<a href="#">¿Has olvidado tu contraseña?</a>
		 </form>
	</div>

	<?php


	?>
<?php include_once "pie.php"?>
 