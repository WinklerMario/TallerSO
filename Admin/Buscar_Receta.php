
<form action="">

	<?PHP

	error_reporting(E_ALL ^ E_NOTICE);
	$paciente="";
	$paciente=$_POST['Nombre'];
	require("Config.php");

	if($enlace = mysqli_connect($serv,$usu,$pass,$bd))    
	{


	}
	else{
		echo "No se pudo conectar".mysqli_connect_error();

	}
	$Buscar= mysqli_real_escape_string($enlace,$_POST['Nombre']);

	$sql1 = ("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
		receta.Id_Receta, receta.Farmaco, receta.Dosis, receta.Descripcion, receta.Id_Cedula, citas.Id_Citas
		FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula 
		INNER JOIN receta on citas.Id_Citas = receta.Id_Citas  WHERE Id_Receta LIKE '%".$paciente."%'");
	$Basesd = mysqli_query($enlace,$sql1) 
	or die("Problem".mysqli_error($enlace,$sql1));


	echo"<table align = center border = 4 input>";


	echo"<tr>";
	echo"<td align = center>Paciente</td>";
	echo"<td align = center>Farmaco</td>";
	echo"<td align = center>Dosis</td>";
	echo"<td align = center>Descripcion</td>";

	echo"</tr>";


	while($fila = mysqli_fetch_array($Basesd))
	{ 
		echo"<tr>";




		echo"<td align = center >".$fila['Nombre']."</td>";
		echo"<td align = center >".$fila['Farmaco']."</td>";

		echo"<td align = center >".$fila['Dosis']."</td>";


		echo"<td align = center >".$fila['Descripcion']."</td>";







		echo"<td><form method='post' action=''> \n
		<input type='hidden' name='eliminar' value='".$fila["Id_Receta"]."'>
		<input type='submit' value='Eliminar'>
		</form></td>";



		echo"</tr>";
	}


	echo"</table><br><br>";


	if (isset($_POST["eliminar"]))
	{

//Se almacena en una variable el id del registro a eliminar
		$Id_Receta = mysqli_real_escape_string($enlace,$_POST['eliminar']);

//Preparar la consulta
		$consulta = ("DELETE FROM receta WHERE Id_Receta= '$Id_Receta' ");

//Ejecutar la cons)ulta
		$resultado = mysqli_query($enlace, $consulta) or die("Problem".mysqli_error($enlace,$consulta));

//redirigir nuevamente a la página para ver el resultado
		header("location: Recetas.php");



	}



 // $Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modifica']);




	?>


</form>