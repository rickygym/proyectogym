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
</body>
</html>


<?php

//esto funciona bien 
$fecha_actual = strtotime(date("d-m-Y"));
	


$queryAtrasados="SELECT menbre.tipo, menbre.fecha_pago FROM menbre INNER JOIN cliente on cliente.codigo=menbre.codigo_c";
$resulAtrasados=$mysqli->query($queryAtrasados);
if($resulAtrasados->num_rows>=1)
{
while ($wowAtrasados = $resulAtrasados->fetch_assoc())
{
    $tipo=$wowAtrasados['tipo'];
	$fecha_pago=$wowAtrasados['fecha_pago'];
	$queryAtrasados_p="SELECT DATEDIFF('$fecha_actual','$fecha_pago') As resta, menbre.*, cliente.nombres, cliente.apellidos FROM menbre INNER JOIN cliente on cliente.codigo=menbre.codigo_c";
$resulAtrasados_p=$mysqli->query($queryAtrasados_p);
if($resulAtrasados_p->num_rows>=1){echo "si";}
	
	
}//fin while



}//fin if


?>