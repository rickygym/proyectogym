<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
$mensu=$_POST['mensual'];
$quince=$_POST['quincenal'];
$sema=$_POST['semanal'];
$fecha=date("Y-m-d");


$queryUP="UPDATE `configuracion_precio_membrecia` SET `mensual` = '$mensu', `quincenal` = '$quince', `semanal` = '$sema', `fecha` = '$fecha', `id_e` = '".$_SESSION['id']."' WHERE `configuracion_precio_membrecia`.`id` = 1";

$result = $mysqli->query($queryUP);


if($result){
echo "<script>alert('Cofiguracion Exitosamente'); window.location='membrecia.php';	
</script>";
	}
	
	else{
		echo "<script>alert('Error - Cofiguracion No Realizada'); window.location='membrecia.php';	
</script>";

}


?>