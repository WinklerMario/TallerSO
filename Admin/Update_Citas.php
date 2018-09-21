<?php
        //Para evitar hacer esta invocacion de variables de conexion cada rato necesitas 
        //hacerte un php con cualquier nombre donde pongas estas variables y luego lo llamas con un include.
        //Inicializamos variables de conexión

if (isset($_POST["modificar_"]))
  error_reporting(E_ALL ^ E_NOTICE);
{
  require("Config.php");

  if($enlace = mysqli_connect($serv,$usu,$pass,$bd))    
  {


  }
  else{
    echo "No se pudo conectar".mysqli_connect_error();

  }







  $Fecha= $_POST['Var2'];
$Hora = $_POST['Var3'];

  $Tratamiento = $_POST['Var5'];



//Se almacena en una variable el id del registro a modificar

  $Id_Cedula = $_POST['modificar_'];

  

if(isset($_POST["modificar_"])){

   if(empty($Fecha)||empty($Hora)||empty($Tratamiento)){

echo '<script>alert("Llene el formulario por favor")</script> ';
  echo "<script>location.href='Citas.php'</script>";
}
  else

  {


  mysqli_query($enlace, "UPDATE citas set  Fecha='$Fecha', Hora='$Hora' ,
     Tratamiento='$Tratamiento' 
    WHERE Id_Citas =  '$Id_Cedula'");

}
}

//redirigir nuevamente a la página para ver el resultado
    echo "<script>location.href='Citas.php'</script>";

  }




  ?>