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







  $Farmaco= $_POST['Var2'];
$Dosis = $_POST['Var3'];
 $Descripcion = $_POST['Var4'];




//Se almacena en una variable el id del registro a modificar

  $Id_Cedula = $_POST['modificar_'];

  


  
if(isset($_POST["modificar_"])){

   if(empty($Farmaco)||empty($Dosis)||empty($Descripcion)){

echo '<script>alert("Llene el formulario por favor")</script> ';
  echo "<script>location.href='Recetas.php'</script>";
}
  else
  {



  mysqli_query($enlace, "UPDATE receta set Farmaco='$Farmaco', Dosis='$Dosis',Descripcion='$Descripcion'
   
    WHERE Id_Receta =  '$Id_Cedula'");

}
}





//redirigir nuevamente a la página para ver el resultado
    echo "<script>location.href='Recetas.php'</script>";

  }




  ?>