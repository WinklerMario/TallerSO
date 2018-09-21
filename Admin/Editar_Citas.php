


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

$id_Cedula = $_POST['campo'];
  $Paciente = $_POST['campo1'];
  $Fecha = $_POST['campo2'];
  $Hora = $_POST['campo3'];

  $Tratamiento = $_POST['campo5'];
 

  $sql1 = ("SELECT CONCAT(pacientes.Nombre, ' ', pacientes.Ap_Pa, ' ', pacientes.Ap_MA) AS Nombre, 
                      citas.Id_Citas, citas.Fecha, citas.Hora, citas.Tratamiento, pacientes.Id_Cedula
                  FROM pacientes INNER JOIN citas on pacientes.Id_Cedula = citas.Id_Cedula WHERE Id_Citas  ='$id_Cedula'");
  $Basesd = mysqli_query($enlace,$sql1) 
  or die("Problem".mysqli_error($enlace,$sql1));

 
  echo"<table align = center border = 4 width='50%'>";


  echo"<tr>";
  echo"<td  align = center>Cita</td>";
  echo"<td align = center>Paciente</td>";

  echo"<td align = center>Fecha</td>";
  echo"<td align = center>Hora</td>";

  echo"<td align = center>Tratamiento</td>";
 
  echo"</tr>";


  $fila=mysqli_fetch_array($Basesd);


  echo"<tr>";

  echo"<form method='post' action='Update_Citas.php'>
  <td rowspan='2'><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Id_Citas']."   ></td>

  <td rowspan='2'><input type = 'text'  style='text-align:center;' disabled    value = " . $fila['Nombre'] . "  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = " . $fila['Fecha'] . " ></td>
  <td ><input type = 'text'  style='text-align:center;' disabled   value = ".$fila['Hora']."  ></td>

   <td ><input type = 'text' style='Width:400px' style='text-align:center;'  disabled  value = ".$fila['Tratamiento']."  ></td>

  
  <td><input type='hidden' name='modificar_' value=".$fila['Id_Citas'].">
  <input type='submit' value='Modificar'></td>
  <tr>



  <td><input type='date' name='Var2' step='1' min='1930-01-01' max='2019-01-01' value='$Fecha'></td>
  <td>                    <input type='time' name='Var3' value='$Hora' max='18:30:00' min='10:30:00' step='1'>
</td>

  <td><input type='text' style='Width:400px' name='Var5' value='$Tratamiento'   ></td>


  </tr> 
  </form></td>";




  echo"</tr>";


  echo"</table><br><br>";
echo"<form method='post' action='Citas.php'>";
echo"  <input type='submit' value='Regresar'></td>";
echo"</form>";

}





?>


