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
$paciente = mysqli_real_escape_string($enlace,$_POST['Paciente']);
$fecha = mysqli_real_escape_string($enlace,$_POST['Fecha']);
$hora = mysqli_real_escape_string($enlace,$_POST['Hora']);

$tratamiento = mysqli_real_escape_string($enlace,$_POST['Tratamiento']);




if(isset($_POST["enviar"])){

	 if(empty($paciente)||empty($fecha)||empty($hora)||empty($tratamiento)){

echo '<script>alert("Llene el formulario por favor")</script> ';
	echo "<script>location.href='Citas.php'</script>";
}
	else

	{


$sql = "INSERT INTO citas
(Fecha,Hora,Tratamiento,Id_Cedula)
VALUES 
('$fecha','$hora','$tratamiento','$paciente')";

}
}
	

if(!mysqli_query($enlace,$sql))
{
	die('Error:'.mysqli_error($enlace));
	
}
else{
	
	echo '<script>alert("Registro guardado exitosamente")</script> ';
	echo "<script>location.href='Citas.php'</script>";
}



?>