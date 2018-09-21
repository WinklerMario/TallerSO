


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
  $nombre = $_POST['campo1'];
  $apellido_Pa = $_POST['campo2'];
  $apellido_Ma = $_POST['campo3'];
  $edad = $_POST['campo4'];
  $correo = $_POST['campo5'];
  $direccion = $_POST['campo6'];
  $telefono = $_POST['campo7'];
  $cumpleanios = $_POST['campo8'];
  $estado_civil = $_POST['campo9'];
  $sexo = $_POST['campo10'];
  $seguro_Medico = $_POST['campo11'];
    $historial_Medico = $_POST['campo12'];

  $sql1 = ("Select * from pacientes where Id_Cedula = '$id_Cedula'");
  $Basesd = mysqli_query($enlace,$sql1) 
  or die("Problem".mysqli_error($enlace,$sql1));

 
  echo"<table align = center border = 4 width='50%'>";


  echo"<tr>";
  echo"<td  align = center>Cedula</td>";
  echo"<td align = center>Nombre</td>";

  echo"<td align = center>Apellido Paterno</td>";
  echo"<td align = center>Apellido Materno</td>";
  echo"<td align = center>Edad</td>";
  echo"<td align = center>Correo</td>";
  echo"<td align = center>Direccion</td>";
  echo"<td align = center>Telefono</td>";
  echo"<td align = center>Fecha de Nacimiento</td>";
  echo"<td align = center>Estado_Civil </td>";
  echo"<td align = center>Sexo </td>";
  echo"<td align = center>Seguro_Medico </td>";
   echo"<td align = center>Historial_Medico </td>";

  echo"</tr>";


  $fila=mysqli_fetch_array($Basesd);


  echo"<tr>";

  echo"<form method='post' action='update.php'>
  <td rowspan='2'><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Id_Cedula']."   ></td>

  <td ><input type = 'text'  style='text-align:center;' disabled    value = " . $fila['Nombre'] . "  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = " . $fila['Ap_Pa'] . " ></td>
  <td ><input type = 'text'  style='text-align:center;' disabled   value = ".$fila['Ap_Ma']."  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Edad']."  ></td>
 
  <td ><input type = 'text' style='Width:400px' style='text-align:center;'  disabled  value = ".$fila['Correo']."  ></td>
  <td ><input type = 'text' style='Width:400px'  style='text-align:center;'  disabled  value = ".$fila['Direccion']."  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Telefono']."  ></td>
  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Fecha_Nacimiento']."  ></td>
  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Estado_Civil']."  ></td>


  <td ><input type = 'text'  style='text-align:center;' disabled   value = ".$fila['Sexo']."  ></td>
  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Seguro_Medico']."  ></td>
  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Historial_Medico']."  ></td>
  <td><input type='hidden' name='modificar_' value=".$fila['Id_Cedula'].">
  <input type='submit' value='Modificar'></td>
  <tr>


  <td><input type='text' name='Var1' value='$nombre'   ></td>
  <td><input type='text' name='Var2' value='$apellido_Pa'   ></td>
  <td><input type='text' name='Var3' value='$apellido_Ma'   ></td>
  <td><input type='number' name='Var4' value='$edad'   ></td>
  <td><input type='text' style='Width:400px' name='Var5' value='$correo'   ></td>
  <td><input type='text' style='Width:400px' name='Var6' value='$direccion'   ></td>
  <td><input type='text' maxlength='10'   name='Var7' onkeypress ='return isNumberKey(event,'NR)' value='$telefono'   ></td>
  <td><input type='date' name='Var8' step='1' min='1930-01-01' max='2017-01-01' value='$cumpleanios'></td>
  <td><input type='text' name='Var9' value='$estado_civil'   ></td>
  <td><input type='text' name='Var10' value='$sexo'   ></td>
  <td><input type='text' name='Var11' value='$seguro_Medico'   ></td>
    <td><input type='text' name='Var12' value='$historial_Medico'   ></td>

    

  </tr> 
  </form></td>";




  echo"</tr>";


  echo"</table><br><br>";

echo"<form method='post' action='Pacientes.php'>";
echo"  <input type='submit' value='Regresar'></td>";
echo"</form>";



}





?>


