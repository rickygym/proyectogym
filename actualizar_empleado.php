<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}

$id = $_GET['id'];
date_default_timezone_set('America/Santo_Domingo');

$query = "SELECT * from empleado where  id_e='$id'"; 
$result = $mysqli->query($query);



while ($roww = $result->fetch_assoc())
{
	//
	$id_e=$roww['id_e'];
	$nombres=$roww['nombres'];
	$apellidos=$roww['apellidos'];
	$direccion=$roww['direccion'];
	$fecha=$roww['fecha_nacimiento'];
	$tipo=$roww['tipo'];
	
//foto
	

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
<title>Modificar Empleado</title>
</head>

<body>


<div align="right" style="border:double #000000; height:80px; color:#000; background:#069">

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
<a href="buscar_empleado.php"><img height="50px;" width="50px" src="img/ir.png" /></a>

<br />

<center><h1>Modificar Empleado</h1></center>


<form  method="post" action="logica_de_act_empleado.php">
<fieldset>
  <legend>Datos a modificar </legend>
<table width="50%">


<tr>
<td><b>Nombres :</b></td>
<td><input type="TEXT" name="nombres" size="25" value="<?php echo $roww['nombres'];?> "/></td>
</tr>

<tr>
<td><b>Apellidos :</b></td>
<td><input type="text" name="apellidos" size="25" value="<?php echo $roww['apellidos']; ?>"/></td>
</tr>

<tr>
<td><b>Direccion :</b></td>
<td><input type="text" name="direccion" size="25" value="<?php echo $roww['direccion']; ?>"/></td>
</tr>

<tr>
<td><b>Fecha Nacimiento :</b></td>
<td><input type="date" name="fecha_nacimiento" size="25" value="<?php echo $roww['fecha_nacimiento']; ?>"/></td>
</tr>

<tr>
<td><b>Tipo :</b></td>
<td><input type="text" name="tipo" size="25" value="<?php echo $roww['tipo']; ?>"/></td>
</tr>


<tr>
<td colspan="2"><center><input type="submit"  value="Modificar"/></center></td>
</tr>

</table>

</fieldset>

<input type="hidden" name="id_e" value="<?php echo $id_e; ?>" />
</form>

<br />

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