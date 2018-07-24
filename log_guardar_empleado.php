<?php

include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');
$usu=$_POST['usu'];
$pas=$_POST['pas'];
$nom=$_POST['nombres'];
$ape=$_POST['apellidos'];
$dire=$_POST['direccion'];
$fecha=$_POST['fecha_nacimiento'];
$tipo=$_POST['tipo'];
$ima= addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));


$query= "insert into empleado(usu,pass,nombres,apellidos,direccion,fecha_nacimiento,tipo,foto) Values ('$usu','$pas','$nom','$ape','$dire','$fecha','$tipo','$ima')";

$result=$mysqli->query($query);

if($result)
{
	echo "<script>alert('Empleado Guardado Excelentemente'); window.location='empleado.php';	
</script>";	

}
else
{
	echo "<script>alert('Empleado No Guardado '); window.location='empleado.php';	
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