<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
?>


<style>


#menu{ 
background-color:#06F;
width:350px;
height:550px;
border:double #000000;
top:14px;
}


 
</style>


<style>

.botn{
   position:fixed;
   display:scroll;
   padding:8px 50px;
   font-family:'psychotik';
   font-size:1.2em;
   font-weight:normal;
   left:10px;
  
   color:#000;
   text-shadow:none;
   border-radius:16px;
   background:#36F;
   box-shadow:inset 3px 3px 2px #007f8b;
}
.botn:hover{
   background:#FF9C00;
   box-shadow:inset 3px 3px 2px #995f02;
}

.botn_imag{
   
   display:scroll;
   padding:8px 50px;
   font-family:'psychotik';
   font-size:1.2em;
   font-weight:normal;
   right:1045px;
  
   color:#000;
   text-shadow:none;
   border-radius:16px;
   background:#960;
   box-shadow:inset 3px 3px 2px #007f8b;
}
.botn_imag:hover{
   background:#F00;
   box-shadow:inset 3px 3px 2px #995f02;
}
</style> 






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventario de productos y membrecias</title>
</head>

<body>











<div align="right" style="border:double #000000; height:80px; color:#000; background:#09C">

<?php

echo "Adminitrador       <b>". $_SESSION['user'];




$resultado = $mysqli->query("SELECT foto FROM empleado where id_e='".$_SESSION['id']."'");

$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc())
 {
	 ?>
	 <img height="70px" width="70px" src="data:imagen/jmg;base64,<?php echo base64_encode($fila['foto']);?>"/>
     <?php
 }
?>	
<a href="cerrar_session.php">      Cerrar session      </a>

</div>
<br />













<!--aqui para dar color gris a las tablas-->

 <style>
 tr:nth-child(even) {
        background:#69F;
    }
 tr:nth-child(odd){
        background:#CCC;
    }
</style> 




<!--aqui para alinear los detalles de ventas y membre-->

<style type="text/css">
#anchotabla {
background: #A9E2F3;
padding: 10px;
overflow: hidden;
}

#der{
float: right;
padding: 10px;
color: #fff;
width: 350px;
margin: 40px;
background: #039;

}

#izq {
float: left;
padding: 10px;
color: #fff;
width: 400px;
margin: 40px;
background: #039;
}

</style>





<a style="font-size:20px" href="reportes.php"><img height="50px;" width="50px" src="img/ir.png" /></a>
<br />
















<fieldset style="background: #A9D0F5">
<legend align="center">Inventario de Ventas por Fechas</legend>

<div align="center">


<form action="" method="post">
<label>Desde : </label>
<input type="date" name="primera_fecha"  /><br /><br />
<label>Hasta : </label>
<input type="date" name="segunda_fecha"  /><br /><br /><br />

<input type="submit" name="inventario" value="Inventario" />
</form>



<table border="1"  >



<tr>
<td colspan="3" width="10%" align="center" bgcolor="#CCCCCC" ><b>Ventas por Fechas</b></td>
</tr>



<br />
<tr>
<?php
if(isset($_POST['inventario'])){
$fecha_primera=$_POST['primera_fecha'];
$fecha_segunda=$_POST['segunda_fecha'];


$queriTotalMembre="SELECT SUM(menbre.precio) As 'total_del_dia' FROM menbre WHERE DATE(menbre.fecha_pago) BETWEEN '".$fecha_primera."' AND '".$fecha_segunda."'";
$resultMembre=$mysqli->query($queriTotalMembre);
if($resultMembre->num_rows>=1){
while($row=$resultMembre->fetch_assoc())
{
	$total_membre=$row['total_del_dia'];
}
}
?>
<td>Total Venta de Membrecia : </td>
<td align="center"><?php echo "RD$ : ".$total_membre.".<b>00</b>"; ?></td>
<td align="center" ><a>Detalles abajo</a></td>
</tr>




<?php

$queriTotalMembre="SELECT SUM(venta.total) As 'total_producto' FROM venta WHERE DATE(venta.fecha) BETWEEN '".$fecha_primera."' AND '".$fecha_segunda."' and venta.estado='finalizado'  ORDER BY venta.estado='finalizado'";
$resultMembre=$mysqli->query($queriTotalMembre);
if($resultMembre->num_rows>=1){
while($row=$resultMembre->fetch_assoc())
{
	$total_producto=$row['total_producto'];
}
}
?>



<tr>
<td>Total Venta de Producto : </td>
<td align="center"><?php echo  "RD$ : ".$total_producto.".<b>00</b>"; ?></td>
<td align="center"><a>Detalles abajo</a></td>
</tr>


<?php

$total_venta=$total_membre+$total_producto;

?>
<tr>
<td bgcolor="#CCCCCC"><b>Total de las Ventas : </b></td>
<td align="center" bgcolor="#04B45F"><?php echo  "RD$ : ".$total_venta.".<b>00</b>"; ?></td>
</tr>
<?php



}//fin de ver si pulso el boton inventario


?>
</table>

</div>

<br />
<br />




</fieldset>


<h1 align="center"><u>Detalles de las Ventas de Membrecias y Ventas</u> </h1>
<br />
<br />




<?php

if(isset($_POST['inventario'])){
?>
<!--aqui para arriva estan los totales del inventario y para abajo los detalles-->








<div id="anchotabla">

<div  id="izq">
<table border="1px">
<tr bgcolor="#CCCCCC">
<td><b>Nombre</b></td>
<td><b>Apellido</b></td>
<td><b>Membrecia </b></td>
<td><b>Precio</b></td> 
<td><b>Fecha</b></td>
<td><b>Codigo Cliente</b></td>
</tr>

<?php
	
$fecha_de_hoy=date("Y-m-d");
$query="SELECT menbre.tipo,menbre.precio,menbre.fecha_pago,menbre.codigo_c, cliente.nombres,cliente.apellidos FROM `menbre` INNER JOIN cliente on cliente.codigo=menbre.codigo_c
WHERE DATE(menbre.fecha_pago) BETWEEN '".$fecha_primera."' AND '".$fecha_segunda."'";
$result=$mysqli->query($query);

if($result->num_rows>=1)
{
while ($wow = $result->fetch_assoc())
{
    $nombre=$wow['nombres'];
	$apellido=$wow['apellidos'];
    $codigo=$wow['codigo_c'];
	$tipo=$wow['tipo'];
	$precio=$wow['precio'];
	$fecha_pago=$wow['fecha_pago'];

?>
<tr>
<td><?php echo $nombre; ?></td>
<td><?php echo $apellido; ?></td>
<td><?php  echo $tipo;  ?></td>
<td> <?php  echo $precio;  ?></td>
<td> <?php  echo $fecha_pago;  ?></td>
<td><?php  echo $codigo;  ?></td>
</tr>

<?php
}//fin while

}//fin if
?>

</table>
</div>


<div id="der">
<table border="1px" >
<tr bgcolor="#CCCCCC">
  <td><b>ID</b></td>
<td><b>Nombre</b></td>
<td><b>Apellido</b></td>
<td><b>Codigo Cliente</b></td>
<td><b>Total de venta</b></td>
<td><b>Fecha</b></td>
<td></td>

</tr>

<?php


$fecha_de_hoy=date("Y-m-d");
$query="SELECT venta.id_v,venta.total, venta.fecha, cliente.codigo, cliente.nombres,cliente.apellidos FROM 
venta INNER JOIN cliente on venta.id_c=cliente.id_c 
WHERE DATE(venta.fecha) BETWEEN '".$fecha_primera."' AND '".$fecha_segunda."' and  venta.estado='finalizado'";
$result=$mysqli->query($query);

if($result->num_rows>=1)
{
while ($wow = $result->fetch_assoc())
{
  $id_v=$wow['id_v'];
   $nombrek=$wow['nombres'];
	$apellidok=$wow['apellidos'];
    $codigo=$wow['codigo'];
	$total=$wow['total'];
	$fecha_pago=$wow['fecha'];

?>
<tr>
  <td><?php echo $id_v; ?></td>
<td><?php echo $nombrek; ?></td>
<td><?php echo $apellidok; ?></td>
<td><?php  echo $codigo;  ?></td>
<td><?php  echo $total;  ?></td>
<td> <?php  echo $fecha_pago;  ?></td>
<td><a title="Ver los detalle de la venta del cliente" href="ver_detalles_venta.php?id=<?php echo $id_v;?>"><img width="40px" height="40px" src="img/ico_buscar.ico" /></a></td>

</tr>

<?php
}//fin while

}//fin if

?>


</table>
<?php

}//fin de if que verifica si el boton inventario fue pulsado

?>
</div>

</div> 

</body>
</html>