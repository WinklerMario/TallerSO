<!DOCTYPE html>
	<?php

error_reporting(E_ALL ^ E_NOTICE);
if (@!$_SESSION['user']) {

}
?>
<html>
<head>
	<meta charset="utf-8" />
	<title>Index</title>

	<link rel="stylesheet" type="text/css" href="css/Consultorio.css">
</head>
<body>
	<div id="header">
		

		<h1> Consultorio Medico </H1>
							<div style="position:relative; top:0px; left:400px;">
<h4>Bienvenid@ <strong><?php echo $_SESSION['user'];?></strong> </h4>
  <li><a href="desconectar.php"> Cerrar Sesión </a></li>	
    <li><a href="index.php"> index </a></li>	
</div>
		</div>
		<div id="sidebar">
			<ul class="nav">
				<li><a href="Pacientes.php">Pacientes </a></li>
				<li><a href="Citas.php">Citas </a></li>
				 <li><a href="Recetas.php">Recetas </a></li>
				 <li><a href="Empleados.php">Empleados </a></li>
				 <li><a href="Bitacora.php">Bitacora </a></li>
			</ul>
		</div>
		<div id="content" align = "CENTER">
						<IMG SRC="image/logo.png"  WIDTH=390 HEIGHT=180 >
							<br></br>
<H3> MIS DATOS <H3>

<?php

	require("Config.php");

					if($enlace = mysqli_connect($serv,$usu,$pass,$bd))	
					{


					}
					else{
						echo "No se pudo conectar".mysqli_connect_error();

					}

					$sql1 = ("SELECT * from empleados WHERE Session ='Online'");
					$Basesd = mysqli_query($enlace,$sql1) 
					or die("Problem".mysqli_error($enlace));


					echo"<table align = center border = 4>";


					echo"<tr>";
					echo"<td align = center>Id</td>";
					echo"<td align = center>Nombre</td>";

					echo"<td align = center>Apellido Paterno</td>";
					echo"<td align = center>Apellido Materno</td>";
					echo"<td align = center>Edad </td>";
					echo"<td align = center>Correo </td>";
					echo"<td align = center>Direccion </td>";
					echo"<td align = center>Sexo </td>";
					echo"<td align = center>Telefono </td>";
					echo"<td align = center>Estado_Civil </td>";
					echo"<td align = center>Contrasena </td>";
					

					echo"</tr>";


					while($fila = mysqli_fetch_array($Basesd))
					{ 
						
						echo"<tr>";
						echo"<td align = center >".$fila['idUsuarios']."</td>";

						echo"<td align = center >".$fila['Nombre']."</td>";


						echo"<td align = center >".$fila['Ap_Pa']."</td>";


						echo"<td align = center >".$fila['Ap_Ma']."</td>";

						echo"<td align = center >".$fila['Edad']."</td>";
						echo"<td align = center >".$fila['Correo']."</td>";
						echo"<td align = center >".$fila['Direccion']."</td>";
						echo"<td align = center >".$fila['Sexo']."</td>";
						echo"<td align = center >".$fila['Telefono']."</td>";
						echo"<td align = center >".$fila['Estado_Civil']."</td>";
echo"<td align = center >".$fila['Contrasena']."</td>";
					

						echo"<td><form method='post' action=''> \n
						<input type='hidden' name='modificaar' value='".$fila["idUsuarios"]."'>
						<input type='submit' value='Seleccionar'>
						</form></td>";



						echo"</tr>";
					}


					echo"</table><br><br>";

					$Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modificaar']);
 $sql = ("SELECT * FROM empleados Where idUsuarios ='$Id_Cedula'"); // Creamos el formulario echo '

 $Basesd = mysqli_query($enlace,$sql) 
 or die("Problem".mysqli_error($enlace,$sql));


 while($row = mysqli_fetch_array($Basesd)){

 	echo"<table border = 4  align = center >";
 	echo"<form method='post' action='Editar_Datos.php'>";
 	echo"<tr>";
 	echo "<td align = center><input type='submit'  name='modificar' value='Modificar'>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name = 'campo'  value=" . $row['idUsuarios'] . " readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name = 'campo1'  value=" . $row['Nombre'] . " readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name ='campo2'  value=" . $row['Ap_Pa'] . " readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo3'  value=".$row['Ap_Ma']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo4'  value=".$row['Edad']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td style='Width:400px' ><input type='text'  style='Width:400px' name ='campo5'  value=".$row['Correo']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td><input type='text'  name ='campo6'   style='Width:400px' value=".$row['Direccion']." readonly ></td>";
 	echo"</tr>";
 			echo"<tr>";
 	echo"<td align = center><input type='text'style='text-align:center;' name ='campo7' value=".$row['Sexo']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo8'  value=".$row['Telefono']." readonly ></td>";
 	echo"</tr>";
 
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo9'  value=".$row['Estado_Civil']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo10'  value=".$row['Contrasena']." readonly ></td>";
 	echo"</tr>";
 	echo"</form>";

 	echo"</table>";
 } 

					?>

		</div>

	</body>
	</html>