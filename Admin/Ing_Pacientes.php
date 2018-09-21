<?PHP
require("Config.php");

if($enlace = mysqli_connect($serv,$usu,$pass,$bd))	
{


}
else{
	echo "No se pudo conectar".mysqli_connect_error();

}



//ingresar Pacientes

$nombre = mysqli_real_escape_string($enlace,$_POST['Nombre']);
$apellido_Pa = mysqli_real_escape_string($enlace,$_POST['Apellido_Pa']);
$apellido_Ma = mysqli_real_escape_string($enlace,$_POST['Apellido_Ma']);
$edad = mysqli_real_escape_string($enlace,$_POST['Edad']);
$correo = mysqli_real_escape_string($enlace,$_POST['Correo']);
$direccion = mysqli_real_escape_string($enlace,$_POST['Direccion']);
$telefono = mysqli_real_escape_string($enlace,$_POST['Telefono']);
$cumpleanios = mysqli_real_escape_string($enlace,$_POST['Cumpleanios']);
$estado_civil = mysqli_real_escape_string($enlace,$_POST['Estado_civil']);
$sexo = mysqli_real_escape_string($enlace,$_POST['Sexo']);
$seguro_Medico = mysqli_real_escape_string($enlace,$_POST['Seguro_Medico']);
$historial_Medico = mysqli_real_escape_string($enlace,$_POST['Historial_Medico']);




if(isset($_POST["enviar"])){

	 if(empty($nombre)||empty($apellido_Pa)||empty($apellido_Ma)||empty($edad) ||empty($correo) ||empty($direccion) ||empty($telefono) ||empty($cumpleanios) 
  	||empty($estado_civil) ||empty($sexo) ||empty($seguro_Medico) ||empty($historial_Medico)){

echo '<script>alert("Llene el formulario por favor")</script> ';
	echo "<script>location.href='Pacientes.php'</script>";}
	else
	{

$sql = "INSERT INTO pacientes
(Nombre,Ap_Pa,Ap_Ma,Edad,Correo,Direccion,Telefono,Fecha_Nacimiento,Estado_civil,Sexo,Seguro_Medico,Historial_Medico)
VALUES 
('$nombre','$apellido_Pa','$apellido_Ma','$edad','$correo','$direccion','$telefono','$cumpleanios',
	'$estado_civil','$sexo','$seguro_Medico','$historial_Medico')";
}

}
 
if(!mysqli_query($enlace,$sql))
{
	//die('Error:'.mysqli_error($enlace));
		echo '<script>alert("El numero de cedula ya existe")</script> ';
	echo "<script>location.href='Pacientes.php'</script>";
}
else{
	echo '<script>alert("Registro guardado exitosamente")</script> ';
	echo "<script>location.href='Pacientes.php'</script>";
}

?>