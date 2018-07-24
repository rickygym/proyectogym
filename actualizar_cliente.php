<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
	header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');


$id = $_GET['id'];
$query = "SELECT * from cliente where  id_c='$id'"; 
$result = $mysqli->query($query);



while ($roww = $result->fetch_assoc())
{
	//
	$id_c=$roww['id_c'];
	$codigo=$roww['codigo'];
	$foto=$roww['foto'];
	

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
<title>Modificar producto</title>
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
<a href="buscar_cliente.php"><img height="50px;" width="50px" src="img/ir.png" /></a>

<br />

<center><h1>Modificar Cliente</h1></center>


<form  method="post" action="logica_de_act_cliente.php" enctype="multipart/form-data">
<fieldset>
  <legend>Datos a modificar </legend>
<table width="50%">

<tr>
<input type="hidden" name="codigo" value="<?php echo "$codigo"; ?>" autofocus/>
<td width="20"><b>Codigo : </b></td>
<td width="30"><input type="text" name="codigo" size="50" value="<?php echo $roww['codigo'];?>"/></td>
</tr>

<tr>
<td><b>Nombres :</b></td>
<td><input type="TEXT" name="nombres" size="50" value="<?php echo $roww['nombres'];?> "/></td>
</tr>

<tr>
<td><b>Apellidos :</b></td>
<td><input type="text" name="apellidos" size="50" value="<?php echo $roww['apellidos']; ?>"/></td>
</tr>

<tr>
<td><b>Direccion :</b></td>
<td><input type="text" name="direccion" size="50" value="<?php echo $roww['direccion']; ?>"/></td>
</tr>


<tr>
<td><b>Telefono :</b></td>
<td><input type="text" name="email" size="50" value="<?php echo $roww['email']; ?>"/></td>
</tr>

<tr>
<td><b>Fecha Inscripcion :</b></td>
<td><input style="font-weight:100" type="date" name="fecha_inscripcion" size="50" value="<?php echo $roww['fecha_inscripcion']; ?>"/></td>
</tr>

<tr>
<td><b>Estado :</b></td>
<td>
<select name="estado">
<option>activo</option>
<option>inactivo</option>
</select>
</td>
</tr>


<tr>
<td><b>Foto :</b></td>
<td>
<div id="estilo">
	<img height="240px" width="290px" src="data:imagen/jmg;base64,<?php echo base64_encode($foto);?>"/>
</div>
</td>
</tr>

<tr>
<td colspan="2"><center><input type="submit"  value="Modificar" title="Modificar los datos"/></center></td>
</tr>

</table>

</fieldset>

<input type="hidden" name="id_c" value="<?php echo $id_c; ?>" />
</form>

<br />
<style>
#estilo{
	position:absolute;
	width:290px;
	height:240px;
	padding: 0px;
	/*background-color:#009;
	background:#999;*/
	border-style: dashed;
	border-width: 2px;
	margin: 5px;
	right:200px;
	top:237px;
}

</style> 



<?php }//fin de wuile table ?>











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

