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
background-color:#696;
width:350px;
height:550px;
border:double #000000;
top:14px;
}



</style>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Productos</title>
</head>

<body>



<div align="right" style="border:double #000000; height:80px; color:#000; background:#696">

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



<a style="font-size:20px" href="buscar_producto.php"><img height="50px;" width="50px" src="img/ir.png" /></a>

<?php  
$id = $_GET['id'];

date_default_timezone_set('America/Santo_Domingo');
$query = "SELECT * from producto where  id_p='$id'"; 
$result = $mysqli->query($query);



while ($roww = $result->fetch_assoc())
{
	$id_p=$roww['id_p'];
	$codigo=$roww['codigo'];
	$nombre=$roww['descripcion'];
	$precio=$roww['precio'];
	$control=$roww['control_stock'];
	$estado=$roww['estado'];
	$fecha=$roww['fecha_vencimiento'];

?>


<center><h1>Modificar producto</h1></center>


<form  method="post" action="logica_de_act_productos.php">
<fieldset>
  <legend>Datos a modificar </legend>
<table width="50%">

<tr>
<input type="hidden" name="codigo" value="<?php echo "$codigo"; ?>"/>
<td width="20"><b>Codigo : </b></td>
<td width="30"><input type="text" name="codigo" size="25" value="<?php echo $roww['codigo'];?>"/></td>
</tr>

<tr>
<td><b>Nombre :</b></td>
<td><input type="TEXT" name="descripcion" size="25" value="<?php echo $roww['descripcion'];?> "/></td>
</tr>

<tr>
<td><b>Precio :</b></td>
<td><input type="text" name="precio" size="25" value="<?php echo $roww['precio']; ?>"/></td>
</tr>

<tr>
<td><b>Stock</b></td>
<td><input type="text" name="control_stock" size="25" value="<?php echo $roww['control_stock']; ?>"/></td>
</tr>

<tr>
<td><b>Estado</b></td>
<td><input type="text" name="estado" size="25" value="<?php echo $roww['estado']; ?>"/></td>
</tr>

<tr>
<td><b>Fecha de vencimiento</b></td>
<td><input type="date" name="fecha_vencimiento" size="25" value="<?php echo $roww['fecha_vencimiento']; ?>"/></td>
</tr>

<tr>
<td colspan="2"><center><input type="submit"  value="Modificar"/></center></td>
</tr>

</table>

</fieldset>

<input type="hidden" name="id_p" value="<?php echo $id_p; ?>" />
</form>



<?php } ?>




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