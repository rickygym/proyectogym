<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php



echo "<script>

var r = confirm('Desea guardar el cierre de Caja ?...');
if (r == false) {

window.location='reportes.php';

}
else 
{
  alert('Cierre de caja Guardado...');
  cierre_caja();
  window.location='homeAdmin.php';
}
</script>";

?>


</body>
</html>


<?php

$total_venta=$_POST['total'];


function cierre_caja() {
  $fecha_de_hoy=date("Y-m-d");
	        $queryCierre="INSERT INTO `inventario` (`id`, `total`, `fecha`, `id_e`) VALUES (NULL, '".$total_venta."', '".            $fecha_de_hoy."','".$_SESSION['id']."');";
	        $result=$mysqli->query($queryCierre);	
}
?>