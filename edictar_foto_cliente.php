<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
$codigo=$_POST['codigo'];

$ima = mysqli_real_escape_string($mysqli, (file_get_contents($_FILES['Image']['tmp_name'])));

      // Create the query and update 
      // into our database. 
      $query = "UPDATE cliente SET foto = '".$ima."' WHERE codigo ='$codigo'"; 
      $result=$mysqli->query($query);

if($result)
echo"<script type=\"text/javascript\">alert('Foto de Cliente aztualizada');window.location='buscar_cliente.php';</script>";
else
echo"<script type=\"text/javascript\">alert('Foto de Cliente no aztualizada //// Error'); window.location='buscar_cliente.php';</script>";

?>