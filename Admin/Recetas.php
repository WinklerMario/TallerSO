	<!DOCTYPE html>
	<?php

	error_reporting(E_ALL ^ E_NOTICE);
	if (@!$_SESSION['user']) {
		header("Location:Pacientes_admin.php");
	}
	?>
	<html>
	<head>
		<meta charset="utf-8" />
		<title>Recetas</title>

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
			<div id="content" >
				<div align = "center" >
					<h4>Recetas</H4>
						<form action = "Buscar_Receta.php" method = "post">
							Ingrese La cedula del Paciente <input type="text" name="Nombre" size="20">
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
							receta.Id_Receta, receta.Farmaco, receta.Dosis, receta.Descripcion, receta.Id_Cedula, citas.Id_Citas
							FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula 
							INNER JOIN receta on citas.Id_Citas = receta.Id_Citas ");
						$Basesd = mysqli_query($enlace,$sql1) 
						or die("Problem".mysqli_error($enlace,$sql1));

						
						echo"<table align = center border = 4 >";


						echo"<tr>";
						echo"<td align = center>Id_Receta</td>";
						echo"<td align = center>Paciente</td>";
						echo"<td align = center>Farmaco</td>";
						echo"<td align = center>Dosis</td>";
						echo"<td align = center>Descripcion</td>";




						echo"</tr>";


						while($fila = mysqli_fetch_array($Basesd))
						{ 
							echo"<tr>";
							
							echo"<td align = center >".$fila['Id_Receta']."</td>";
							
							echo"<td align = center >".$fila['Nombre']."</td>";
							echo"<td align = center >".$fila['Farmaco']."</td>";

							echo"<td align = center >".$fila['Dosis']."</td>";


							echo"<td align = center >".$fila['Descripcion']."</td>";

							


							echo"<td><form method='post' action=''> \n
							<input type='hidden' name='eliminar' value='".$fila["Id_Receta"]."'>
							<input type='submit' value='Eliminar'>
							</form></td>";


							echo"<td><form method='post' action=''> \n
							<input type='hidden' name='modificaar' value='".$fila["Id_Receta"]."'>
							<input type='submit' value='Seleccionar'>
							</form></td>";
							
							echo"</tr>";
						}


						echo"</table><br><br>";



						$Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modificaar']);

						$sql = ("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
							receta.Id_Receta, receta.Farmaco, receta.Dosis, receta.Descripcion, receta.Id_Cedula, citas.Id_Citas
							FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula 
						 		  			     INNER JOIN receta on citas.Id_Citas = receta.Id_Citas  Where Id_Receta ='$Id_Cedula'"); // Creamos el formulario echo '

						$Basesd = mysqli_query($enlace,$sql) 
						or die("Problem".mysqli_error($enlace,$sql));


						while($row = mysqli_fetch_array($Basesd)){

							echo"<table border = 4  align = center >";
							echo"<form method='post' action='Editar_Recetas.php'>";
							echo"<tr>";
							echo "<td align = center><input type='submit'  name='modificar' value='Modificar'>";
							echo"</tr>";
							echo"<tr>";
							echo "<td align = center><input type='text' style='text-align:center;' name = 'campo'  value=" . $row['Id_Receta'] . " readonly ></td>";
							echo"</tr>";
							echo"<tr>";
							echo "<td align = center><input type='text' style='text-align:center;' name = 'campo1'  value=" . $row['Nombre'] . " readonly ></td>";
							echo"</tr>";
							echo"<tr>";
							echo "<td align = center><input type='text' style='text-align:center;' name ='campo2'  value=" . $row['Farmaco'] . " readonly ></td>";
							echo"</tr>";
							echo"<tr>";
							echo"<td align = center><input type='text' style='text-align:center;' name ='campo3'  value=".$row['Dosis']." readonly ></td>";
							echo"</tr>";
							echo"<tr>";
							echo"<td align = center><input type='text' style='text-align:center;' name ='campo4'  value=".$row['Descripcion']." readonly ></td>";
							echo"</tr>";

							echo"</form>";

							echo"</table>";
						} 


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



						?>
					</form>


					<div align="Center" >
						<h4>Ingresar nueva receta</H4>

						</div>

						<form action = "Ing_Recetas.php" method = "post">

							<table width = "70%"  align ="center"border = "4">
								<tr>
									<td>

										Paciente
									</td>
									<?PHP
									echo "<td>";
									echo"<Select Name='Paciente' >";
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
											Farmaco
										</td>
										<td>
											<input type = "text" style="Height:100px; Width:400px" id= "Farmaco" name = "Farmaco" value = ""/>

										</td>
									</tr>
									<tr>
										<td>
											Dosis
										</td>
										<td>
											<input type = "text" style="Height:100px; Width:400px" id= "Dosis" name = "Dosis" value = ""/>
										</td>
									</tr>
									<tr>
										<td>
											Descripcion
										</td>
										<td>
											<input type = "text" style="Height:100px; Width:400px" id= "Descripcion" name = "Descripcion" value = ""/>
										</td>
									</tr>



								</table>
								<input type = "submit" style="position:relative; top:10px; left:900px;" name ="enviar" value = "Guardar" />

								<input type = "reset" style="position:relative; top:10px; left:900px;" name ="Borrar" value = "Borrar" />
							</form> 

						</div>

					</body>
					</html>