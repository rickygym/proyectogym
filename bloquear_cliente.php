<?php
session_start();
include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');

if(!$_SESSION)
{
	header("Location: index.html");
}
$id = $_GET['id'];

$query = "UPDATE cliente SET estado='inactivo' WHERE id_c ='$id'"; 
$result=$mysqli->query($query);

if($result)
echo"<script type=\"text/javascript\">alert('Cliente borrado correctamente'); window.location='mensual.php';</script>";
else
echo"<script type=\"text/javascript\">alert('Cliente no borrado  //// Error'); window.location='mensual.php';</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borrado</title>
</head>

<body>

	
<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    height: 10%;
    width: 100%;
    background-color: #A9D0F5;
    color: black;
    text-align: center;
}
</style>

</div><!--fin del div menu-->

<div class="footer">
<footer id="main-footer" >
    <p> Creado By:   <a href="#"> Ing. Ricky J. Galan Paulino</a> &copy; 2017 Version 2.0.1</p>
  </footer> <!-- / #main-footer -->
</div>
</body>
</html>