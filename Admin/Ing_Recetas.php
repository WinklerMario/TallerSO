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
$farmaco = mysqli_real_escape_string($enlace,$_POST['Farmaco']);
$dosis = mysqli_real_escape_string($enlace,$_POST['Dosis']);
$descripcion = mysqli_real_escape_string($enlace,$_POST['Descripcion']);



if(isset($_POST["enviar"])){

	 if(empty($paciente)||empty($farmaco)||empty($dosis)||empty($descripcion)){

echo '<script>alert("Llene el formulario por favor")</script> ';
	echo "<script>location.href='Recetas.php'</script>";}
	else
	{

$sql = "INSERT INTO receta
( Farmaco,Dosis,Descripcion,Id_Citas)
VALUES 
('$farmaco','$dosis','$descripcion,$paciente')";

}
}

if(!mysqli_query($enlace,$sql))
{
	die('Error:'.mysqli_error($enlace));
	
}
else{
	
	echo '<script>alert("Registro guardado exitosamente")</script> ';
	echo "<script>location.href='Recetas.php'</script>";
}



?>