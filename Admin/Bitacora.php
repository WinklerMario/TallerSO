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
					<li><a href="desconectar.php"> Cerrar Cesión </a></li>	
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
					<h4>Bitacora de empleados</H4>
						
					</div>
					<?php

//Ver Empleados

					require("Config.php");

					if($enlace = mysqli_connect($serv,$usu,$pass,$bd))	
					{


					}
					else{
						echo "No se pudo conectar".mysqli_connect_error();

					}

					$sql1 = ("Select * from bitacora");
					$Basesd = mysqli_query($enlace,$sql1) 
					or die("Problem".mysqli_error($enlace,$sql1));


					echo"<table align = center border = 4>";


					echo"<tr>";
					echo"<td align = center>Id</td>";
					echo"<td align = center>Usuario</td>";

					echo"<td align = center>Tipo </td>";
					echo"<td align = center>Fecha </td>";
					echo"<td align = center>Operacion </td>";
					echo"<td align = center>Tabla </td>";
				



					echo"</tr>";


					while($fila = mysqli_fetch_array($Basesd))
					{ 
						echo"<tr>";
						echo"<td align = center >".$fila['idBitacora']."</td>";

						echo"<td align = center >".$fila['Usuario']."</td>";


						echo"<td align = center >".$fila['Tipo']."</td>";


						echo"<td align = center >".$fila['Fecha']."</td>";

						echo"<td align = center >".$fila['Operacion']."</td>";
						echo"<td align = center >".$fila['Tabla']."</td>";
						



						echo"</tr>";
					}


					echo"</table><br><br>";
 ?>

 </div>
</body>
</html>