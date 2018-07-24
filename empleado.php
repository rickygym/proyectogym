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
<title>Empleados</title>
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


<a style="font-size:20px" href="homeAdmin.php"><img height="50px;" width="50px" src="img/ir.png" /></a>





<br /><br /><br />
<div align="center">
<fieldset style="width:600px; height:350px;   ">

<legend>Registro de Empleado</legend>


<form action="log_guardar_empleado.php" method="post" enctype="multipart/form-data">


<input size="15px" type="text" name="usu" placeholder="dijite el usuario"   required="required"/><br /><br />
<input size="15px" type="password" name="pas" placeholder="dijite la pas"       required="required"/><br /><br />
<input size="50px" type="text" name="nombres" placeholder="dijite nombre(S)"required="required"/><br /><br />
<input size="50px" type="text" name="apellidos" placeholder="dijite el apellido(S)"required="required"/><br /><br />
<input size="50px" type="text" name="direccion" placeholder="direccion"    /><br /><br />
<input size="50px" type="date" name="fecha_nacimiento" placeholder="nacimiento"/><br /><br />
<input size="50px" type="text" name="tipo" placeholder="cargo"               /><br /><br />


<input type="file" name="Imagen" placeholder="Foto"  /><br /><br />
<br />

<input type="submit" name="guardar_empleado" value="Guardar Empleado" />


</form>
</fieldset>
<br />
</div>


<a  href="buscar_empleado.php">Ir a Buscar Empleado</a>

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