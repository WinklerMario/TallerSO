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



  $Nombre_ = $_POST['Var1'];
  $apellido_Pa = $_POST['Var2'];
  $apellido_Ma = $_POST['Var3'];
  $edad = $_POST['Var4'];
  $correo = $_POST['Var5'];
  $direccion = $_POST['Var6'];
    $sexo = $_POST['Var7'];
  $telefono = $_POST['Var8'];
  $estado_civil = $_POST['Var9'];

  $Tipo = $_POST['Var10'];


//Se almacena en una variable el id del registro a modificar

  $Id_Cedula = $_POST['modificar_'];

  


if(isset($_POST["modificar_"])){

   if(empty($Nombre_)||empty($apellido_Pa)||empty($apellido_Ma)||empty($edad) ||empty($correo) ||empty($direccion) ||empty($sexo) ||empty($estado_civil) 
    ||empty($telefono) ||empty($Tipo)){

echo '<script>alert("Llene el formulario por favor")</script> ';
  echo "<script>location.href='Empleados.php'</script>";}
  else
  {


  mysqli_query($enlace, "UPDATE rmpleados set Nombre= '$Nombre_', Ap_Pa='$apellido_Pa', Ap_Ma='$apellido_Ma',Edad='$edad', Correo='$correo',
    Direccion='$direccion',  Sexo='$sexo', Telefono='$telefono' ,  Estado_civil='$estado_civil', Tipo='$Tipo' 
    WHERE idUsuarios =  '$Id_Cedula'");


}
}





//redirigir nuevamente a la página para ver el resultado
    echo "<script>location.href='Empleados.php'</script>";

  }




  ?>