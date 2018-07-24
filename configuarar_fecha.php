<?php

include("conexion.php");
date_default_timezone_set('America/Santo_Domingo');

$date=date("Y-m-d");



$query_confi="UPDATE `venta`
 SET `fecha`='2018-06-01 00:00:00' WHERE id_v BETWEEN 2 and 1400";
$result_confi=$mysqli->query($query_confi);




if($result_confi)
{
	echo "<script>alert('Comfiguracion de Hora Actualizada');window.location='homeAdmin.php';	
</script>";


}
else
{
	echo "<script>alert('Comfiguracion  de NO Hora Actualizada'); window.location='homeAdmin.php';	
</script>";

}

?>
