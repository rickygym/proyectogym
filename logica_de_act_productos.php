<?php
date_default_timezone_set('America/Santo_Domingo');
include("conexion.php");
     $id_p=$_POST['id_p'];
	$codigo=$_POST['codigo'];
	$nombre=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$control=$_POST['control_stock'];
	$estado=$_POST['estado'];
	$fecha=$_POST['fecha_vencimiento'];

$query = "UPDATE producto SET codigo='$codigo',descripcion='$nombre',precio='$precio',control_stock='$control',estado='$estado',fecha_vencimiento='$fecha' where  id_p='$id_p'"; 
$result = $mysqli->query($query);


if($result){
echo "<script>alert('Producto Actualizado Exitosamente'); window.location='buscar_producto.php';	
</script>";
	}
	
	else{
		echo "<script>alert('Producto No Actualizado Exitosamente'); window.location='log_actualizar_producto.php';	
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