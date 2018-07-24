<?php

include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');
$codigo=$_POST['codigo'];
$descripcion=$_POST['descripcion'];
$precio=$_POST['precio'];
$stock=$_POST['stock'];

$fecha = date("Y-m-d");


$query= "insert into producto(descripcion, precio, control_stock, estado, fecha_vencimiento, codigo) Values ('$descripcion','$precio','$stock','activo','$fecha','$codigo')";

$result=$mysqli->query($query);

if($result)
{
echo "<script>alert('Producto Guardado Exitosamente'); window.location='producto.php';	
</script>";
}
else
{
	echo "<script>alert('Producto No Guardado '); window.location='producto.php';	
</script>";
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log</title>
</head>

<body>
</body>
</html>