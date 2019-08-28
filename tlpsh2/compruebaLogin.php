 <?php include_once "encabezado.php" ?>
	<?php

       /*try{
       	  $base=new PDO("mysql:host=localhost; dbname=MATRICULAS","root","root123");
	      $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	       $base->exec("SET CHARACTER SET utf8");*/
          include_once "base_de_datos.php";
	     // $sql="select *from admi where usuario=:login and contraseña=:password";
           $sql="select *from login where usuario=:login and password=:password";

	      $resultado=$base_de_datos->prepare($sql);
	      $login= $_POST["login"];
	      $password= $_POST["password"];

	      $resultado->bindValue(":login",$login);
	      $resultado->bindValue(":password",$password);

	       $resultado->execute();
	       $num=$resultado->rowCount();
	       echo "<br><br><br><br><br><br>".$num;
	       if($num!=0)
	       {
	       	 header("location:index.php");
	       }else{
	       	
	       	 header("location:login.php");
	       }
        
       /*}catch(Exception $e){
           die("Error:".$e->getMessage());
       }*/
	?>
 