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





  $apellido_Pa = $_POST['Var2'];
  $apellido_Ma = $_POST['Var3'];
  $edad = $_POST['Var4'];
  $correo = $_POST['Var5'];
  $direccion = $_POST['Var6'];
  $sexo = $_POST['Var7'];
   $telefono = $_POST['Var8']; 
    $estado_civil = $_POST['Var9'];
    $contrasena = $_POST['Var10'];

//Se almacena en una variable el id del registro a modificar

  $Id_Cedula = $_POST['modificar_'];




  if(isset($_POST["modificar_"])){
if(empty($correo)||empty($apellido_Pa)||empty($apellido_Ma)||empty($edad)||empty($direccion)||empty($telefono)
  ||empty($sexo) ||empty($estado_civil) ||empty($contrasena)){

echo '<script>alert("Llene el formulario por favor")</script> ';
  echo "<script>location.href='index.php'</script>";}

  else

  {


  mysqli_query($enlace, "UPDATE empleados set  Ap_Pa='$apellido_Pa', Ap_Ma='$apellido_Ma',Edad='$edad', Correo='$correo',
    Direccion='$direccion',  Sexo='$sexo', Telefono='$telefono' ,  Estado_Civil='$estado_civil', Contrasena='$contrasena' 
    WHERE idUsuarios =  '$Id_Cedula'");


}
}



//redirigir nuevamente a la página para ver el resultado
   echo "<script>location.href='index.php'</script>";

  }




  ?>