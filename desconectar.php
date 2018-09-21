<?php 
session_start();
if($_SESSION['user']){	
	session_destroy();
	header("location:Iniciar_sesion.php");
	
}
else{
	header("location:Iniciar_sesion.php");
}
?>