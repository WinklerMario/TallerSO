
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

      $sql1 = ("SELECT * FROM empleados WHERE Nombre LIKE '%".$nombre."%'");
      $Basesd = mysqli_query($enlace,$sql1) 
      or die("Problem".mysqli_error($enlace,$sql1));


      echo"<table align = center border = 4 input>";


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
      echo"<td align = center>Tipo </td>";

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

                                    echo"<td align = center >".$fila['Tipo']."</td>";


            echo"<td><form method='post' action=''> \n
            <input type='hidden' name='eliminar' value='".$fila["idUsuarios"]."'>
            <input type='submit' value='Eliminar'>
            </form></td>";



            echo"</tr>";
      }


      echo"</table><br><br>";

      if (isset($_POST["eliminar"]))
      {

//Se almacena en una variable el id del registro a eliminar
            $idUsuarios = mysqli_real_escape_string($enlace,$_POST['eliminar']);

//Preparar la consulta
            $consulta = ("DELETE FROM empleados WHERE idUsuarios= '$idUsuarios' ");

//Ejecutar la cons)ulta
            $resultado = mysqli_query($enlace, $consulta) or die("Problem".mysqli_error($enlace,$consulta));

//redirigir nuevamente a la página para ver el resultado
           echo "<script>location.href='Empleados.php'</script>";



      }



 // $Id_Cedula = mysqli_real_escape_string($enlace,$_POST['modifica']);




      ?>


</form>