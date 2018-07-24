<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Detalle de las Ventas</title>
</head>

<body>
<br />
<h1 align="center">Detalle de las Ventas de Productos</h1>
<br />
<a style="font-size:20px" href="reportes.php"><img height="50px;" width="50px" src="img/ir.png" /></a>
<br />



<div align="center">
 <style>
 tr:nth-child(even) {
        background:#69F;
    }
 tr:nth-child(odd){
        background:#CCC;
    }
</style>
<table border="1"  style="font-size:22px"  >
<tr>
<td><b>Nombre</b></td>
<td><b>Apellidos</b></td>
<td><b>Codigo Cliente</b></td>
<td><b>Total de venta</b></td>
<td><b>Fecha</b></td>
<td></td>

</tr>

<?php
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
$fecha_de_hoy=date("Y-m-d");






$query="SELECT venta.id_v,venta.total, venta.fecha, cliente.codigo, cliente.nombres,cliente.apellidos FROM 
venta INNER JOIN cliente on venta.id_c=cliente.codigo
WHERE venta.fecha LIKE '".$fecha_de_hoy."%' and  venta.id_e='".$_SESSION['id']."' and venta.estado='finalizado'
 ORDER by cliente.nombres ASC";
$result=$mysqli->query($query);

if($result)
{
while ($wow = $result->fetch_assoc())
{
	$id_v=$wow['id_v'];
    $nombres=$wow['nombres'];
	$apellidos=$wow['apellidos'];
    $codigo=$wow['codigo'];
	$total=$wow['total'];
	$fecha_pago=$wow['fecha'];

?>
<tr>
<td><?php  echo $nombres;  ?></td>
<td><?php  echo $apellidos;  ?></td>
<td><?php  echo $codigo;  ?></td>
<td><?php  echo $total;  ?></td>
<td> <?php  echo $fecha_pago;  ?></td>
<td>
    
<a title="Ver los detalle de la venta del cliente" href="ver_detalles_venta_dia.php?id=<?php echo $id_v;?>"><img width="40px" height="40px" src="img/ico_buscar.ico" /></a>
</td>































</tr>

<?php
}//fin while

}//fin if
?>


</table>

</div>
</style> 

<style>
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    height: 10%;
    width: 100%;
    background-color: #A9D0F5;
    color: black;
    text-align: center;
}
</style>

</div><!--fin del div menu-->

<div class="footer">
<footer id="main-footer" >
    <p> Creado By:   <a href="#"> Ing. Ricky J. Galan Paulino</a> &copy; 2017 Version 2.0.1</p>
  </footer> <!-- / #main-footer -->
</div>
</body>
</html>