<?php
session_start();
include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');

if(!$_SESSION)
{
	header("Location: index.html");
}
$id = $_GET['id'];

$query = "UPDATE cliente SET estado='Activo' WHERE id_c ='$id'"; 
$result=$mysqli->query($query);

if($result)
echo"<script type=\"text/javascript\">alert('Cliente debloqueado correctamente'); window.location='buscar_cliente.php';</script>";
else
echo"<script type=\"text/javascript\">alert('Cliente no debloqueado //// Error'); window.location='buscar_cliente.php';</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Debloqueado</title>
</head>

<body>
</body>
</html>