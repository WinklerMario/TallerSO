
<form action="">

	<?PHP

	error_reporting(E_ALL ^ E_NOTICE);
	$fecha="";
	$fecha=$_POST['Nombre'];
	require("Config.php");

	if($enlace = mysqli_connect($serv,$usu,$pass,$bd))    
	{


	}
	else{
		echo "No se pudo conectar".mysqli_connect_error();

	}
	$Buscar= mysqli_real_escape_string($enlace,$_POST['Nombre']);

	$sql1 = ("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
                      citas.Id_Citas, citas.Fecha, citas.Hora, citas.Tratamiento, pacientes.Id_Cedula
                  FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula WHERE Fecha LIKE '%".$Buscar."%'");
	$Basesd = mysqli_query($enlace,$sql1) 
	or die("Problem".mysqli_error($enlace,$sql1));


	echo"<table align = center border = 4 input>";


	echo"<tr>";
	echo"<td align = center>Cita</td>";
	echo"<td align = center>Paciente</td>";
	echo"<td align = center>Fecha</td>";

	echo"<td align = center>Hora</td>";
	echo"<td align = center>Historial Clinico</td>";
	echo"<td align = center>Tratamiento</td>";

	echo"</tr>";


	while($fila = mysqli_fetch_array($Basesd))
	{ 
		echo"<tr>";


							
							echo"<td align = center >".$fila['Id_Citas']."</td>";

							echo"<td align = center >".$fila['Nombre']."</td>";


							echo"<td align = center >".$fila['Fecha']."</td>";


							echo"<td align = center >".$fila['Hora']."</td>";

						
							echo"<td align = center >".$fila['Tratamiento']."</td>";





		echo"<td><form method='post' action=''> \n
		<input type='hidden' name='eliminar' value='".$fila["Id_Citas"]."'>
		<input type='submit' value='Eliminar'>
		</form></td>";



		echo"</tr>";
	}


	echo"</table><br><br>";


						if (isset($_POST["eliminar"]))
						{

require("Config.php");

	if($enlace2 = mysqli_connect($serv,$usu,$pass,$bd))    
	{


	}
	else{
		echo "No se pudo conectar".mysqli_connect_error();

	}
//Se almacena en una variable el id del registro a eliminar
							$Id_Citas = mysqli_real_escape_string($enlace2,$_POST['eliminar']);

//Preparar la consulta
							$consulta = ("DELETE FROM citas WHERE Id_Citas= '$Id_Citas' ");

//Ejecutar la cons)ulta
							$resultado = mysqli_query($enlace2, $consulta) or die("Problem".mysqli_error($enlace,$consulta));

//redirigir nuevamente a la página para ver el resultado
							header("location: Citas.php");



						}



 // $Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modifica']);




	?>


</form>