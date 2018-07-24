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
<title>Pago de Membrecia</title>
</head>

<body>



<div align="right" style="border:double #000000; height:80px; color:#000; background:#06F">

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

<a style="font-size:20px" href="homeAdmin.php"><img height="40px;" width="40px" src="img/ir.png" /></a>




<div align="center">
<fieldset style="background: #A9D0F5">
<legend>Pago de Membrecia de Cliente</legend>



<form action="" method="post">
<br />
<label>Codigo del cliente :</label>
<input style="font-size:22px" size="20px" type="text" name="codigo_c" placeholder="Codigo del cliente" required autofocus /><br /><br />
<label>Cantidad de Horas:</label>
<input style="font-size:22px" size="10px" type="text" name="cantidad" placeholder="Cantidad de Horas a pagar" value="1" /><br /><br />

<label>Membrecia :</label>
<select style="font-size:22px" name="tipo">
<option>Mensual</option>
<option>Quincenal</option>
<option>Semanal</option>
<option>Diaria</option>

</select>
<br /><br />
<br /><br />
<br /><br />
<input type="submit" name="boton" value="Pagar Membrecia" /><br /><br />


</form>
</fieldset>

</div>

<style>
#estilo{
  position:absolute;
  width:200px;
  height:40px;
  padding: 0px;
  background-color:#000;
  background:#BDBDBD;
  border-style: dashed;
  border-width: 2px;
  margin: 5px;
  left: 10px;
  top:250px;
  text-align:center;
}
#estilo1{
position:absolute;
  width:200px;
  height:40px;
  padding: 0px;
  background-color:#000;
  background:#BDBDBD;
  border-style: dashed;
  border-width: 2px;
  margin: 5px;
  left: 10px;
  top:320px;
  text-align:center;
}
#estilo2{
  position:absolute;
  width:200px;
  height:40px;
  padding: 0px;
  background-color:#000;
  background:#BDBDBD;
  border-style: dashed;
  border-width: 2px;
  margin: 5px;
  left: 10px;
  top:390px;
  text-align:center;
}

</style> 
<div id="estilo" >
<a id="izq" href="buscar_membrecia.php">Buscar Membrecia</a>
</div>
<div id="estilo1" >
<a  href="membrecia_fecha_cualquiera.php">Pagar Membrecia en una Fecha</a>
</div>






<!--  -->


<!--inicio del div Modallllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->
            
<!--esta es la parte donde va cambiar contraseña-->
<div id="estilo2" title="Cambiar Todos los precios de las membrecias">
<a  href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';">Cambiar  los Precios de Las Membrecias</a></div>




<div id="fade" class="overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">
</div>

<div id="light" class="modal">
   <div align="right">  
<a style="color:#000" href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">cerrar</a>
</div>
 
 <style>
 
 #for{
   padding:2px;
   cursor:pointer;
   display:block;
   width:300px;
   margin: 0 auto;
   text-align:left;
}
 </style>

 <?php 

if(($_SESSION['user']=="Admin")||($_SESSION['id']=="1"))
{
  
 ?>
       <form id="for"  action="configuracion_membrecia.php" method="post">
<h3 title="Configuration" style=" color:#000"> <u>Configuracion de Precios $$</u></h3>
<input type="text" id="pass_anterior" name="mensual" placeholder="Precio Mensual" />
<br /><br />
<input type="text" id="pass_nueva" name="quincenal" placeholder="Precio Quincenal" />
<br /><br />
<input type="text" id="pass_confirmar" name="semanal" placeholder="Precio Semanal" />
<br /><br />
<input name="configurar" type="submit" value="Configurar"  />
</form>
 <?php 



}
else
{
}

 ?>
 
<br />   
   
<table border="1">
<tr>
<td>Precio Mesual</td>
<td>Precio Quincenal</td>
<td>Precio Semanal</td>
<td>Fecha de Modificacion</td>
</tr>

<?php

$query_confi="SELECT * FROM `configuracion_precio_membrecia`";
$result_confi=$mysqli->query($query_confi);
if($result_confi->num_rows>=1)
{
	while($row=$result_confi->fetch_assoc())
	{
	$mensual=$row['mensual'];
	$semanal=$row['semanal'];
	$quincenal=$row['quincenal'];
	$fecha=$row['fecha'];
	



?>

<tr>
<td><?php echo $mensual; ?></td>
<td><?php echo $quincenal; ?></td>
<td><?php echo $semanal; ?></td>
<td><?php echo $fecha; ?></td>
</tr>

</table> 
<?php

}//fin de while

}//fin de if

?>     
</div>

</div>
</div>
    

<style type="text/css">

 /* base semi-transparente */
    .overlay{
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #000;
        z-index:1001;
  opacity:.75;
        -moz-opacity: 0.75;
        filter: alpha(opacity=75);
    }
 
    /* estilo para la ventana modal */
    .modal {
        display: none;
        position: absolute;
        top: 30%;
        left: 30%;
        width: 50%;
        height: 50%;
        padding: 16px;
        background: #fff;
  color: #333;
        z-index:1002;
        overflow: auto;
    }
    </style>
<!--fin del div Modallllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllll-->

<!--  -->









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



<?php



if(isset($_POST['boton']))
{
	
	
	
$tipo_membre=$_POST['tipo'];
$codigo_c=$_POST['codigo_c'];
$cantidad=$_POST['cantidad'];





$query_buscar_ID="SELECT cliente.codigo FROM cliente WHERE cliente.codigo='$codigo_c'";
$resultado=$mysqli->query($query_buscar_ID);
if($resultado->num_rows<=0)
{
	echo "<script>alert('Error Codigo no Exite - Confirme codigo '); window.location='membrecia.php';	
</script>";
}
else
{
	
$date=date("Y-m-d");





//Verificar cual Membrecia fue tomada por el emple

if($tipo_membre=="Mensual")
{


	$total_mensual=$mensual*$cantidad;



$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Mensual', '$total_mensual', '$date', '$codigo_c', '".$_SESSION['id']."');";

$result_membre=$mysqli->query($queryPagar_Membre);
if($result_membre)
{
	echo "<script>alert('Pago Mensual Realizado Exictosamente'); window.location='membrecia.php';	
</script>";
}
}
//cIERRO MENSUAL








elseif($tipo_membre=="Quincenal")
{




$total_quincenal=$quincenal*$cantidad;


	
$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Quincenal', '$total_quincenal', '$date', '$codigo_c', '".$_SESSION['id']."');";

$result_membre=$mysqli->query($queryPagar_Membre);
if($result_membre)
{
	echo "<script>alert('Pago Quincenal Realizado Exictosamente'); window.location='membrecia.php';	
</script>";
}
}
//CIERRO qUINCENAL








elseif($tipo_membre=="Diaria")
{
	$valor_diaria=50;
	$total_precio_diarios=$valor_diaria*$cantidad;

$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Diario', '$total_precio_diarios', '$date', '$codigo_c', '".$_SESSION['id']."');";

$result_membre=$mysqli->query($queryPagar_Membre);
if($result_membre)
{
	echo "<script>alert('Pago diario Realizado Exictosamente'); window.location='membrecia.php';	
</script>";
}
}
//CIERRO diaria







elseif($tipo_membre=="Semanal")
{




$total_semanal=$semanal*$cantidad;





	$queryPagar_Membre="INSERT INTO `menbre` (`id`, `tipo`, `precio`, `fecha_pago`, `codigo_c`, `id_e`) VALUES (NULL, 'Semanal', '$total_semanal', '$date', '$codigo_c', '".$_SESSION['id']."');";

$result_membre=$mysqli->query($queryPagar_Membre);
if($result_membre)
{
	echo "<script>alert('Pago Semanal Realizado Exictosamente'); window.location='membrecia.php';	
</script>";
}
}
//cIERRO SEMANAL 
}










}//if boton comprovacion




?>