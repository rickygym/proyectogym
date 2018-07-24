<?php
session_start();
include ("conexion.php");
$usuario=$_REQUEST['usuario'];
$password=$_REQUEST['pass'];



$query = "SELECT * FROM empleado where usu='$usuario' and pass='$password'";
$result = $mysqli->query($query);



if(mysqli_num_rows($result) > 0)
{
  $fila=$result->fetch_array();
  

$_SESSION['id']= $fila['id_e'];
  $_SESSION['user']=$fila['usu'];
  $_SESSION['nombre']=$fila['nombres'].' '.$fila['apellidos']; 
 // $_SESSION['verificar']=true;
  
 echo"<script type=\"text/javascript\">alert('Bienvenido $usuario'); window.location='homeAdmin.php';</script>"; 
   
}
else
{

echo"<script type=\"text/javascript\">alert('Usuario o Contraseña Incorrecta :( '); window.location='index.html';</script>"; 

}

?>