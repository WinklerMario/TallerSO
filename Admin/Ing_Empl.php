<?PHP
require("Config.php");
error_reporting(E_ALL ^ E_NOTICE);
if($enlace = mysqli_connect($serv,$usu,$pass,$bd))	
{
	echo "Conectado satisfactoriamente<br><br>";

}
else{
	echo "No se pudo conectar".mysqli_connect_error();

}



//ingresar empleados
$nombre = mysqli_real_escape_string($enlace,$_POST['Nombre']);
$apellido_Pa = mysqli_real_escape_string($enlace,$_POST['Apellido_Pa']);
$apellido_Ma = mysqli_real_escape_string($enlace,$_POST['Apellido_Ma']);
$edad = mysqli_real_escape_string($enlace,$_POST['Edad']);
$correo = mysqli_real_escape_string($enlace,$_POST['Correo']);
$direccion = mysqli_real_escape_string($enlace,$_POST['Direccion']);
$sexo = mysqli_real_escape_string($enlace,$_POST['Sexo']);
$estado_civil = mysqli_real_escape_string($enlace,$_POST['Estado_civil']);
$telefono = mysqli_real_escape_string($enlace,$_POST['Telefono']);
$contraseña = mysqli_real_escape_string($enlace,$_POST['Contrasena']);

$tipo = mysqli_real_escape_string($enlace,$_POST['Tipo']);
$conf_Contrasena = mysqli_real_escape_string($enlace,$_POST['Conf_Contrasena']);


if(isset($_POST["enviar"])){

	 if(empty($nombre)||empty($apellido_Pa)||empty($apellido_Ma)||empty($edad) ||empty($correo) ||empty($direccion) ||empty($sexo) ||empty($estado_civil) 
  	||empty($telefono) ||empty($contraseña) ||empty($tipo) ||empty($conf_Contrasena)){

echo '<script>alert("Llene el formulario por favor")</script> ';
	echo "<script>location.href='Empleados.php'</script>";}
	else
	{
$sql = "INSERT INTO empleados
(Nombre,Ap_Pa,Ap_Ma,Edad,Correo,Direccion,Sexo,Estado_civil,Telefono,Contrasena,Tipo)
VALUES 
('$nombre','$apellido_Pa','$apellido_Ma','$edad','$correo','$direccion','$sexo','$telefono','$estado_civil','$contraseña','$tipo')";

}
}
	
if($contraseña == $conf_Contrasena )
{
	echo"<form action=''> \n
      <h1> las contraseñas coinciden<h1>
      </form>";
      if(!mysqli_query($enlace,$sql))
{
	die('Error:'.mysqli_error($enlace));
	
}
else{
	
	echo '<script>alert("Registro guardado exitosamente")</script> ';
	echo "<script>location.href='Empleados.php'</script>";
}
}
  
  else
{
echo '<script>alert("las contraseñas no coinciden")</script> ';
echo "<script>location.href='Empleados.php'</script>";
}



?>