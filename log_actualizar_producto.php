<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
$id_p = $_GET['id_p'];


$query = "SELECT * from producto where  id_p='$id_p'"; 
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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar producto</title>
</head>

<body>

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

</form>



<?php } ?>





</body>
</html>