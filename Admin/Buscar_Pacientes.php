
<form action="">

<?PHP

error_reporting(E_ALL ^ E_NOTICE);
$nombre="";
$nombre=$_POST['Nombre'];
require("Config.php");

if($enlace = mysqli_connect($serv,$usu,$pass,$bd))    
{


}
else{
      echo "No se pudo conectar".mysqli_connect_error();

}
$Buscar= mysqli_real_escape_string($enlace,$_POST['Nombre']);

$sql1 = ("SELECT * FROM pacientes WHERE Nombre LIKE '%".$nombre."%'");
$Basesd = mysqli_query($enlace,$sql1) 
or die("Problem".mysqli_error($enlace,$sql1));


echo"<table align = center border = 4 input>";


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
echo"<td align = center>Estado_Civil </td>";
echo"<td align = center>Sexo </td>";
echo"<td align = center>Seguro_Medico </td>";
echo"<td align = center>Historial Medico </td>";
echo"</tr>";


while($fila = mysqli_fetch_array($Basesd))
{ 
      echo"<tr>";
                        
                                    echo"<td align = center >".$fila['Id_Cedula']."</td>";

                                    echo"<td align = center >".$fila['Nombre']."</td>";


                                    echo"<td align = center >".$fila['Ap_Pa']."</td>";


                                    echo"<td align = center >".$fila['Ap_Ma']."</td>";

                                    echo"<td align = center >".$fila['Edad']."</td>";
                                    echo"<td align = center >".$fila['Correo']."</td>";
                                    echo"<td align = center >".$fila['Direccion']."</td>";

                                    echo"<td align = center >".$fila['Telefono']."</td>";
                                    echo"<td align = center >".$fila['Fecha_Nacimiento']."</td>";
                                    echo"<td align = center >".$fila['Estado_Civil']."</td>";

                                    
                                    echo"<td align = center >".$fila['Sexo']."</td>";
                                    echo"<td align = center >".$fila['Seguro_Medico']."</td>";
echo"<td align = center >".$fila['Historial_Medico']."</td>";



      echo"<td><form method='post' action=''> \n
      <input type='hidden' name='eliminar' value='".$fila["Id_Cedula"]."'>
      <input type='submit' value='Eliminar'>
      </form></td>";
     


      echo"</tr>";
}


echo"</table><br><br>";

if (isset($_POST["eliminar"]))
{

//Se almacena en una variable el id del registro a eliminar
      $Id_Cedula = mysqli_real_escape_string($enlace,$_POST['eliminar']);

//Preparar la consulta
      $consulta = ("DELETE FROM pacientes WHERE Id_Cedula= '$Id_Cedula' ");

//Ejecutar la cons)ulta
      $resultado = mysqli_query($enlace, $consulta) or die("Problem".mysqli_error($enlace,$consulta));

//redirigir nuevamente a la página para ver el resultado
      header("location: Pacientes.php");



}



 // $Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modifica']);




?>


</form>