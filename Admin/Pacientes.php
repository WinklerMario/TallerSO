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
			<div id="content" >
				<div align = "center" >
					<h4>Pacientes</H4>
						<form action = "Buscar_Pacientes.php" method = "post">
							Ingrese el Nombre del Paciente a buscar<input type="text" name="Nombre" size="20">
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

					

						$sql1 = ("Select * from pacientes ");
						$Basesd = mysqli_query($enlace,$sql1) 
						or die("Problem".mysqli_error($enlace,$sql1));

						
						echo"<table align = center border = 4 Width=100>";


						echo"<tr>";
						echo"<td align = center>Cedula</td>";
						echo"<td align = center>Nombre</td>";

						echo"<td align = center>Apellido Paterno</td>";
						echo"<td align = center>Apellido Materno</td>";
						echo"<td align = center>Edad</td>";
						echo"<td align = center>Correo</td>";
						echo"<td align = center>Direccion</td>";
						echo"<td align = center>Telefono</td>";
						echo"<td align = center>Fecha de Nacimiento</td>";
						echo"<td align = center>Estado Civil </td>";
						echo"<td align = center>Sexo </td>";
						echo"<td align = center>Seguro Medico </td>";
						echo"<td align = center>Historal Medico </td>";

						echo"</tr>";


						while($fila = mysqli_fetch_array($Basesd))
						{ 
							echo"<tr>";
							
							
							
							
							echo"<td align = center >$fila[0]</td>";

							echo"<td align = center >$fila[1]</td>";


							echo"<td align = center >$fila[2]</td>";


							echo"<td align = center >$fila[3]</td>";

							echo"<td align = center >$fila[4]</td>";
							echo"<td align = center >$fila[5]</td>";
							echo"<td align = center >$fila[6]</td>";
							echo"<td align = center >$fila[7]</td>";
							echo"<td align = center >$fila[8]</td>";
							echo"<td align = center >$fila[9]</td>";

							
							echo"<td align = center >$fila[10]</td>";
							echo"<td align = center >$fila[11]</td>";
							
							echo"<td align = center >$fila[12]</td>";


							echo"<td><form method='post' action=''> \n
							<input type='hidden' name='eliminar' value='".$fila["Id_Cedula"]."'>
							<input type='submit' value='Eliminar'>
							</form></td>";
							echo"<td><form method='post' action=''> \n
							<input type='hidden' name='modificaar' value='".$fila["Id_Cedula"]."'>
							<input type='submit' value='Seleccionar'>
							</form></td>";
							
							//echo '<td>'.'<a href="Editar.php">'.'Modificar'.'</a>'.'</td>';


							echo"</tr>";
						}


						echo"</table><br><br>";



						$Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modificaar']);
 $sql = ("SELECT * FROM pacientes Where Id_Cedula ='$Id_Cedula'"); // Creamos el formulario echo '

 $Basesd = mysqli_query($enlace,$sql) 
 or die("Problem".mysqli_error($enlace,$sql));


 while($row = mysqli_fetch_array($Basesd)){

 	echo"<table border = 4  align = center >";
 	echo"<form method='post' action='Editar.php'>";
 	echo"<tr>";
 	echo "<td align = center><input type='submit'  name='modificar' value='Modificar'>";
 	echo"</tr>";
 	echo"<tr>";
 	echo "<td align = center><input type='text' style='text-align:center;' name = 'campo'  value=" . $row['Id_Cedula'] . " readonly ></td>";
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
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo7'  value=".$row['Telefono']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo8'  value=".$row['Fecha_Nacimiento']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo9'  value=".$row['Estado_Civil']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text'style='text-align:center;' name ='campo10' value=".$row['Sexo']." readonly ></td>";
 	echo"</tr>";
 	echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo11' value=".$row['Seguro_Medico']." readonly ></td>";
 	
 	echo"</tr>";
 	
 echo"<tr>";
 	echo"<td align = center><input type='text' style='text-align:center;' name ='campo12' value=".$row['Historial_Medico']." readonly ></td>";
 	
 	echo"</tr>";
 	echo"</form>";

 	echo"</table>";
 } 





						if (isset($_POST["eliminar"]))
						{

//Se almacena en una variable el id del registro a eliminar
							$Id_Cedula = mysqli_real_escape_string($enlace,$_POST['eliminar']);

//Preparar la consulta
 	$consulta = ("DELETE FROM pacientes WHERE Id_Cedula= '$Id_Cedula' ");
//Ejecutar la cons)ulta
 	$resultado = mysqli_query($enlace, $consulta) or die("Problem".mysqli_error($enlace));

//redirigir nuevamente a la página para ver el resultado
 	echo "<script>location.href='Pacientes.php'</script>";



						}



 ?>
 <script type="text/javascript">
    function isNumberKey(evt, Texto) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        switch (Texto) {
            case 'N': // SOLO NUMEROS ENTEROS
                if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                    return false;
                }
                break;

            case 'F': // SOLO NUMEROS CON GUIONES O DIAGONALES 
                if (charCode != 45 && charCode != 47) {
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                }
                break;

            case 'DT': // SOLO NUMEROS PARA FECHA Y TIEMPO 
                if (charCode != 45 && charCode != 47 && charCode != 32 && charCode != 58) {
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                }
                break;

            case 'T': // SOLO NUMEROS PARA FECHA Y TIEMPO 
                if (charCode != 32 && charCode != 58) {
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                }
                break;

            case 'NR': // SOLO NUMEROS ENTEROS Y NEGATIVOS 
                if (charCode != 45) {
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                }
                break;

            default: // SOLO NUMEROS CON DECIMALES
                if (charCode != 45 && charCode != 46) {
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        return false;
                    }
                }
                break;

        }
        return true;
    }
</script>
</form>


<div align="Center" >
	<h4>Ingresar paciente nuevo</H4>

	</div>

	<form action = "Ing_Pacientes.php" method = "post">

		<table width = "70%"  align ="center"border = "4">
<tr>
				<td>
					Nombre 
				</td>
				<td>
					<input type = "text" id= "Nombre" name = "Nombre" value = ""/>
				</td>
			<tr>
				<td>
					Apellido Paterno
				</td>
				<td>
					<input type = "text" id= "Apellido_Pa" name = "Apellido_Pa" value = ""/>
				</td>
			</tr>
			<tr>
				<td>
					Apellido Materno
				</td>
				<td>
					<input type = "text" id= "Apellido_Ma" name = "Apellido_Ma" value = ""/>
				</td>
			</tr>
			<tr>
				<td>
					Edad
				</td>
				<td>
					<input type="number" id= "Edad"  name = "Edad" value = ""/>
				</td>
			</tr><tr>
			<td>
				Correo Electronico
			</td>
			<td>
				<input type = "text" style="Width:400px" id= "Correo" name = "Correo" value = ""/>
			</td>
		</tr>
		<tr>
			<td>
				Direccion
			</td>
			<td>
				<input type = "text" style="Width:400px" id= "Direccion" name = "Direccion" value = ""/>
			</td>
		</tr>
		<tr>
			<td>
				Telefono
			</td>
			<td>
				<input type = "text"  maxlength="10" id= "Telefono" name = "Telefono"  onkeypress ="return isNumberKey(event,'NR')" value = ""/>
			</td>
		</tr>
		<tr>
			<td>
				Fecha de nacimiento
			</td>
			<td>
				<input type="date" name="Cumpleanios" step="1" min="1930-01-01" max="2017-01-01" value="">										</td>
			</tr>
			<tr>
				<td>
					Estado civil
				</td>
				<td>

					<Select Name="Estado_civil" Size =1>
						<OPTION VALUE = "Soltero">Soltero</OPTION>
						<OPTION VALUE = "Comprometido">Comprometido</OPTION>
						<OPTION VALUE = "Casado">Casado</OPTION>
						<OPTION VALUE = "Divorciado">Divorciado</OPTION>
					</select>
				</td>
			</tr>
			<tr>
				<td>

					Sexo
				</td>
				<td>

					<Select Name="Sexo" Size =1>
						<OPTION VALUE = "Masculino">Masculino</OPTION>
						<OPTION VALUE = "Femenino">Femenino</OPTION>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					Seguro_Medico
				</td>
				<td>

					<Select Name="Seguro_Medico" Size =1>
						<OPTION VALUE = "Si">Si</OPTION>
						<OPTION VALUE = "No">No</OPTION>
					</select>
				</td>
			</tr>
		</tr>
			<tr>
			<td>
				Historial Medico
			</td>
			<td>
				<input type = "text" style="Width:400px" id= "Historial_Medico" name = "Historial_Medico" value = ""/>
			</td>
		</tr>
	</table>
	<input type = "submit" style="position:relative; top:10px; left:900px;" name ="enviar" value = "Guardar" />

	<input type = "reset" style="position:relative; top:10px; left:900px;" name ="Borrar" value = "Borrar" />
</form> 

</div>

</body>
</html>