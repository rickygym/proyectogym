<?php

include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');
$id_e=$_POST['id_e'];
	
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
	$fecha=$_POST['fecha_nacimiento'];
	$tipo=$_POST['tipo'];
   
	
	

$query = "UPDATE empleado SET nombres='$nombres',apellidos='$apellidos',direccion='$direccion',fecha_nacimiento='$fecha',tipo='$tipo' where  id_e='$id_e'"; 


$result = $mysqli->query($query);


if($result){
echo "<script>alert('Empleado Actualizado Exitosamente'); window.location='buscar_empleado.php';	
</script>";
	}
	
	else{
		echo "<script>alert('Empleado No Actualizado'); window.location='logica_de_act_empleado.php';	
</script>";

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
</body>
</html>