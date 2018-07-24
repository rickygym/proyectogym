<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}

date_default_timezone_set('America/Santo_Domingo');

$ante=$_POST['pass_anterior'];
$nueva=$_POST['pass_nueva'];
$confi=$_POST['pass_confirmar'];



$querySELECT="SELECT empleado.pass As 'pas_BD' FROM  empleado WHERE empleado.id_e='".$_SESSION['id']."'";
$result=$mysqli->query($querySELECT);
if($result->num_rows>=1)
{
	while ($fila = $result->fetch_assoc())
    {
		$pas_BD=$fila['pas_BD'];
	}
	if(($ante==$pas_BD)&&($nueva==$confi))
	{
		$queryUPDATE="UPDATE empleado SET empleado.pass='$nueva' WHERE empleado.id_e='".$_SESSION['id']."'";
		$resultModi=$mysqli->query($queryUPDATE);
		echo "<script>alert('Contrasena Modificada Exitosamente'); window.location='homeAdmin.php';	
</script>";

	}
	else
	{
		echo "<script>alert('Contrasena NO Modificada '); window.location='homeAdmin.php';	
</script>";
	}
}







?>