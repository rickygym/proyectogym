<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
$id_c=$_POST['id_c'];
	$codigo=$_POST['codigo'];
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$direccion=$_POST['direccion'];
	//$fecha=$_POST['fecha_nacimiento'];
	$email=$_POST['email'];
    $fecha_in=$_POST['fecha_inscripcion'];
	$estado=$_POST['estado'];
	
	

$query = "UPDATE cliente SET codigo='$codigo',nombres='$nombres',apellidos='$apellidos',direccion='$direccion',email='$email',fecha_inscripcion='$fecha_in',estado='$estado' where  id_c='$id_c'"; 


$result = $mysqli->query($query);


if($result){
echo "<script>alert('Cliente Actualizado Exitosamente'); window.location='buscar_cliente.php';	
</script>";
	}
	
	else{
		echo "<script>alert('Cliente No Actualizado'); window.location='logica_de_act_cliente.php';	
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