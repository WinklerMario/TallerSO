


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
 $id_Usuarios = $_POST['campo'];
  $nombre = $_POST['campo1'];
  $apellido_Pa = $_POST['campo2'];
  $apellido_Ma = $_POST['campo3'];
  $edad = $_POST['campo4'];
  $correo = $_POST['campo5'];
  $direccion = $_POST['campo6'];
    $sexo = $_POST['campo7'];
  $telefono = $_POST['campo8'];
  $estado_civil = $_POST['campo9'];
  $Tipo = $_POST['campo10'];

  $sql1 = ("Select * from empleados where idUsuarios = '$id_Usuarios'");
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
  echo"<td align = center>Sexo</td>";
   echo"<td align = center>Telefono</td>";
  echo"<td align = center>Estado_Civil </td>";
  echo"<td align = center>Tipo</td>";

  echo"</tr>";


  $fila=mysqli_fetch_array($Basesd);


  echo"<tr>";

  echo"<form method='post' action='Update_Empleados.php'>
  <td rowspan='2'><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['idUsuarios']."   ></td>

  <td ><input type = 'text'  style='text-align:center;' disabled    value = " . $fila['Nombre'] . "  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = " . $fila['Ap_Pa'] . " ></td>
  <td ><input type = 'text'  style='text-align:center;' disabled   value = ".$fila['Ap_Ma']."  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Edad']."  ></td>
 <td ><input type = 'text'   style='Width:400px' style='text-align:center;'  disabled  value = ".$fila['Correo']."  ></td>
  <td ><input type = 'text' style='Width:400px' style='text-align:center;'  disabled  value = ".$fila['Direccion']."  ></td>
  <td ><input type = 'text'  style='text-align:center;' disabled   value = ".$fila['Sexo']."  ></td>
  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Telefono']."  ></td>

  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Estado_Civil']."  ></td>



  <td ><input type = 'text'  style='text-align:center;'  disabled  value = ".$fila['Tipo']."  ></td>

  <td><input type='hidden' name='modificar_' value=".$fila['idUsuarios'].">
  <input type='submit' value='Modificar'></td>
  <tr>

  <td><input type='text' name='Var1' value='$nombre'   ></td>
  <td><input type='text' name='Var2' value='$apellido_Pa'   ></td>
  <td><input type='text' name='Var3' value='$apellido_Ma'   ></td>
  <td><input type='number' name='Var4' value='$edad'   ></td>

  <td><input type='text' style='Width:400px' name='Var5' value='$correo'   ></td>

  <td><input type='text' style='Width:400px' name='Var6' value='$direccion'   ></td>

  <td><input type='text' name='Var7' value='$sexo'   ></td>
  <td><input type='text' name='Var8' value='$telefono'   ></td>

  <td><input type='text' name='Var9' value='$estado_civil'   ></td>

  <td><input type='text' name='Var10' value='$Tipo'   ></td>


  </tr> 
  </form></td>";




  echo"</tr>";


  echo"</table><br><br>";
echo"<form method='post' action='Empleados.php'>";
echo"  <input type='submit' value='Regresar'></td>";
echo"</form>";

}





?>


