<?php
session_start();
include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');

if(!$_SESSION)
{
	header("Location: index.html");
}
$id_membre = $_GET['id'];
echo $id_membre;




$query = "DELETE FROM `menbre` WHERE `menbre`.`id`='$id_membre'"; 
$result=$mysqli->query($query);

if($result)
echo "<script type=\"text/javascript\">alert('Menbrecia borrada correctamente'); window.location='buscar_membrecia.php';</script>";
else
echo"<script type=\"text/javascript\">alert('Membrecia no borrada  //// Error  :('); window.location='buscar_membrecia.php';</script>";


?>