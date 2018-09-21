	<!DOCTYPE html>
	<?php


		error_reporting(E_ALL ^ E_NOTICE);
	if (@!$_SESSION['user']) {
	
	}
	?>
	<html>
	<head>
		<meta charset="utf-8" />
		<title>Citas</title>

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
			 <li><a href="Recetas.php">Recetas</a></li>
					<li><a href="Empleados.php">Empleados</a></li>
					<li><a href="Bitacora.php">Bitacora</a></li>


				</ul>
			</div>
			<div id="content" >
				<div align = "center" >
					<h4>Citas</H4>
						<form action = "Buscar_Citas.php" method = "post">
							Ingrese una fecha <input type="text" name="Nombre" size="20">
							<input type="submit" value="Buscar" name="Buscar"> <br><br> 
						</form>
					</div>
					<form action="">
						<?php

//Ver Empleados

						require("Config.php");

						if($enlace = mysqli_connect($serv,$usu,$pass,$bd))	
						{


						}
						else{
							echo "No se pudo conectar".mysqli_connect_error();

						}

						$sql1 = ("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
										  citas.Id_Citas, citas.Fecha, citas.Hora, citas.Tratamiento, pacientes.Id_Cedula
						 		  FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula");
						$Basesd = mysqli_query($enlace,$sql1) 
						or die("Problem".mysqli_error($enlace,$sql1));

						
						echo"<table align = center border = 4 >";


						echo"<tr>";
						echo"<td align = center>Cita</td>";
						echo"<td align = center>Paciente</td>";
						echo"<td align = center>Fecha</td>";

						echo"<td align = center>Hora</td>";
					
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
								echo"<td><form method='post' action=''> \n
							<input type='hidden' name='modificaar' value='".$fila["Id_Citas"]."'>
							<input type='submit' value='Seleccionar'>
							</form></td>";
							


							echo"</tr>";
						}


						echo"</table><br><br>";



						$Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modificaar']);
 
 $sql =("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
										  citas.Id_Citas, citas.Fecha, citas.Hora, citas.Tratamiento, pacientes.Id_Cedula
						 		  FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula WHERE Id_Citas  ='$Id_Cedula'");
 $Basesd = mysqli_query($enlace,$sql) 
 or die("Problem".mysqli_error($enlace,$sql));


 while($row = mysqli_fetch_array($Basesd)){
 	echo"<table border = 4  align = center >";
 	echo"<form method='post' action='Editar_Citas.php'>";

 	echo"<tr>";
 	echo "<td align = center><input type='submit'  name='modificar' value='Modificar'>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name = 'campo'  value=" . $row['Id_Citas'] . " readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name = 'campo1'  value=" . $row['Nombre'] . " readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name ='campo2'  value=" . $row['Fecha'] . " readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo3'  value=".$row['Hora']." readonly ></td>";
 	echo"</tr>";
 
 	echo"<tr>";
 	echo"<td style='Width:400px' ><input type='text'  style='Width:400px' name ='campo5'  value=".$row['Tratamiento']." readonly ></td>";
 	echo"</tr>";
 
 	echo"</form>";

 	echo"</table>";
 } 

						if (isset($_POST["eliminar"]))
						{

//Se almacena en una variable el id del registro a eliminar
							$Id_Citas = mysqli_real_escape_string($enlace,$_POST['eliminar']);

//Preparar la consulta
							$consulta = ("DELETE FROM citas WHERE Id_Citas= '$Id_Citas' ");

//Ejecutar la cons)ulta
							$resultado = mysqli_query($enlace, $consulta) or die("Problem".mysqli_error($enlace,$consulta));

//redirigir nuevamente a la página para ver el resultado
						echo "<script>location.href='Citas.php'</script>";



						}



						?>
					</form>


					<div align="Center" >
						<h4>Ingresar nueva cita</H4>

						</div>

						<form action = "Ing_Citas.php" method = "post">

							<table width = "70%"  align ="center"border = "4">
							<tr>
									<td>

										Paciente
									</td>
									<?PHP
									echo "<td>";
									echo"<Select Name='Paciente'>";
											echo "<OPTION VALUE = ''>Elige</OPTION>";
											 
											require("Config.php");

											if($enlace2 = mysqli_connect($serv,$usu,$pass,$bd))	
											{


											}
											else{
												echo "No se pudo conectar".mysqli_connect_error();

											}

											$sql2 = ("Select * from pacientes");
											$Basesd1 = mysqli_query($enlace2,$sql2) 
											or die("Problem".mysqli_error($enlace2,$sql2));

											while($fila = mysqli_fetch_array($Basesd1))
											{

												 //value = "'.$fila['Id_Cedula'].'" >'.'</td>';
												echo"<OPTION VALUE = ".$fila['Id_Cedula']. "> ".$fila['Nombre']."
												".$fila['Ap_Pa']." ".$fila['Ap_Ma']."
												</OPTION>";
												
												 } 

											echo"</select>";
										echo"</td>";
									echo"</tr>";
									?>
								<tr>
									<td>
										Fecha
									</td>
									<td>
									<input type="date" name="Fecha" step="1" min="1930-01-01" max="2019-01-01" value="">	
									</td>
								</tr>
								<tr>
									<td>
										Hora
									</td>
									<td>
										<input type="time" name="Hora" value="11:45:00" max="22:30:00" min="10:00:00" step="1">
									</td>
								</tr>
								<tr>
								<td>
									Tratamiento
								</td>
								<td>
									<input type = "text" style="Height:100px; Width:400px" id= "Tratamiento" name = "Tratamiento" value = ""/>
								</td>
							</tr>
							
							
							
						</table>
						<input type = "submit" style="position:relative; top:10px; left:900px;" name ="enviar" value = "Guardar" />

						<input type = "reset" style="position:relative; top:10px; left:900px;" name ="Borrar" value = "Borrar" />
					</form> 

				</div>

			</body>
			</html>