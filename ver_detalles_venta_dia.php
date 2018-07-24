
<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
$id_v_d = $_GET['id'];

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
<title>Detalle de productos por dia</title>
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







<a style="font-size:20px" href="detalle_productos.php"><img height="50px;" width="50px" src="img/ir.png" /></a>
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











<table align="center" border="1" style="width: 70%; height: 15%"   >

<tr>
<td><b>ID Venta</b></td>
<td><b>Descripcion</b></td>
<td><b>Cantidad</b></td>
<td><b>Precio</b></td>

</tr>





<?php

$queriTotalMembre="SELECT venta.id_v,venta.total, venta.id_c, cliente.nombres, cliente.email,detalle.cantidad, detalle.id_d, detalle.id_p, producto.descripcion, producto.precio
FROM
venta INNER JOIN cliente ON cliente.id_c=venta.id_c INNER JOIN detalle on detalle.id_v=venta.id_v INNER JOIN producto on detalle.id_p = producto.codigo

WHERE venta.id_v='".$id_v_d."'";

/*$queriTotalMembre="SELECT 
venta.id_v,producto.precio, detalle.cantidad, producto.descripcion,venta.total

FROM 
venta INNER JOIN detalle on venta.id_v=detalle.id_v INNER JOIN
producto on detalle.id_p=producto.id_p



WHERE venta.id_v='".$id_v_d."'";*/

 


$resultMembre=$mysqli->query($queriTotalMembre);
if($resultMembre->num_rows>=1){
while($row=$resultMembre->fetch_assoc())
{
  $total_venta=$row['total'];
	$id_vv=$row['id_v'];
	$total=$row['precio'];
	$cantidad=$row['cantidad'];
	$descripcion=$row['descripcion'];



?>

<tr>

    <td><?php echo $id_vv; ?></td>
    <td><?php echo $descripcion; ?></td>
    <td><?php echo $cantidad; ?></td>
    <td><?php echo $total; ?></td>

    



</tr>

<?php
}////fin de while
}//fiin de if




?>



</table>


<table align="center" border="1" style="width: 70%; height: 10%; text-align: center;" >
  <tr><td bgcolor="#81F7BE"><b>Total de Factura:: </b></td><td bgcolor="#088A85">
    <?php echo "RD$           ".$total_venta; ?></td></tr>
  
  

</table>




