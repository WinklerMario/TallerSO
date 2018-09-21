
<?php

 error_reporting(E_ALL ^ E_NOTICE);



require("Config.php");

if($enlace = mysqli_connect($serv,$usu,$pass,$bd))	
{


}
else{
	

}

$username=$_POST['Usr'];
$pass=$_POST['Pass'];
$entrar=false;


$sql2=mysqli_query($enlace,"SELECT * FROM empleados WHERE Nombre = '$username'");

if($result=mysqli_fetch_assoc($sql2)){
	
	$_SESSION['id']=$result['idUsuarios'];
	$_SESSION['user']=$result['Nombre'];
	$ns=$result['Tipo']; 


}

	






$sql=mysqli_query($enlace,"SELECT * FROM empleados WHERE Nombre='$username'");
if($result2=mysqli_fetch_assoc($sql)){
	if($pass==$result2['Contrasena']){
		$_SESSION['id']=$result2['idUsuarios'];
		$_SESSION['user']=$result2['Nombre'];
		
		$ns=$result['Tipo'];
		if($ns== "Administrador")
			{ 	echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
		echo "<script>location.href='Admin/index.php'</script>";

	$entrar=true;
			mysqli_query($enlace,"UPDATE empleados set Session='Offline'");

		mysqli_query($enlace,"UPDATE empleados set Session='Online' WHERE idUsuarios= '".$_SESSION['id']."'");
		
		
	}else{
		echo "<script>location.href='Empleado/index.php'</script>";
			mysqli_query($enlace,"UPDATE empleados set Session='Offline'");

		mysqli_query($enlace,"UPDATE empleados set Session='Online' WHERE idUsuarios= '".$_SESSION['id']."'");
	}
}else{
	echo '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
	
	echo "<script>location.href='Iniciar_sesion.php'</script>";
}
}else{
	
	echo '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
	
echo "<script>location.href='Iniciar_sesion.php'</script>";	

}

?>