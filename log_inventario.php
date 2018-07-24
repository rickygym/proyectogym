
<?php 
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');

$fecha_de_hoy=date("Y-m-d");
$boton=$_POST['boton'];
$total_venta=$_POST['total_venta'];



if(isset($boton)){


			 $queryCierre="INSERT INTO `inventario` (`id`, `total`, `fecha`, `id_e`) VALUES (NULL, '".$total_venta."', '".    $fecha_de_hoy."','".$_SESSION['id']."');";
			 $result=$mysqli->query($queryCierre);
			  
			    if ($result) {

	               echo "<script>alert('Cierre de caja Guardado...'); window.location='homeAdmin.php';</script>";
                }
                else
                {
                	echo "<script>alert('Fallo en Cierre de caja ...'); window.location='reportes.php';</script>";
                }
}
else
{

}

?>
