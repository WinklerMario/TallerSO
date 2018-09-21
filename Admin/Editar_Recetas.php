


<?PHP
if(isset($_POST["modificar"])) {
  error_reporting(E_ALL ^ E_NOTICE);

  require("Config.php");

  if($enlace = mysqli_connect($serv,$usu,$pass,$bd))    
  {


  }
  else{
    echo "No se pudo conectar".mysqli_connect_error();

  }

  $ID = $_POST['campo'];
  $Paciente = $_POST['campo1'];
  $Farmaco = $_POST['campo2'];
  $Dosis = $_POST['campo3'];
  $Descripcion = $_POST['campo4'];

 

  $sql1 = ("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
              receta.Id_Receta, receta.Farmaco, receta.Dosis, receta.Descripcion, receta.Id_Cedula, citas.Id_Citas
              FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula 
                             INNER JOIN receta on citas.Id_Citas = receta.Id_Citas  where Id_Receta = '$ID'");
  $Basesd = mysqli_query($enlace,$sql1) 
  or die("Problem".mysqli_error($enlace,$sql1));

 
  echo"<table align = center border = 4 width='50%'>";


  echo"<tr>";
  echo"<td  align = center>Receta</td>";
  echo"<td align = center>Paciente</td>";

  echo"<td align = center>Farmaco</td>";
  echo"<td align = center>Dosis</td>";
  echo"<td align = center>Descripcion</td>";

 
  echo"</tr>";


  $fila=mysqli_fetch_array($Basesd);


  echo"<tr>";

  echo"<form method='post' action='Update_Recetas.php'>
  <td rowspan='2'><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Id_Receta']."   ></td>

  <td rowspan='2'><input type = 'text'  style='text-align:center;' disabled    value = " . $fila['Nombre'] . "  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = " . $fila['Farmaco'] . " ></td>
  <td ><input type = 'text'  style='text-align:center;' disabled   value = ".$fila['Dosis']."  ></td>

 <td ><input type = 'text' style='Width:400px'  style='text-align:center;'  disabled  value = ".$fila['Descripcion']."  ></td>


  
  <td><input type='hidden' name='modificar_' value=".$fila['Id_Receta'].">
  <input type='submit' value='Modificar'></td>
  <tr>



  <td><input type='text' name='Var2' value='$Farmaco'   ></td>
  <td><input type='text' name='Var3' value='$Dosis'   ></td>
  <td><input type='text' style='Width:400px' name='Var4' value='$Descripcion'   ></td>



  </tr> 
  </form></td>";




  echo"</tr>";


  echo"</table><br><br>";
echo"<form method='post' action='Recetas.php'>";
echo"  <input type='submit' value='Regresar'></td>";
echo"</form>";

}





?>


