<?php
session_start();
include("conexion.php");

if(!$_SESSION)
{
    header("Location: index.html");
}
date_default_timezone_set('America/Santo_Domingo');
$fecha_de_hoy=date("Y-m-d");




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
<title>Reportes de ventas y Membrecias</title>
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
<a style="font-size:20px" href="reportes.php"><img height="50px;" width="50px" src="img/ir.png" /></a>
<br />

 <style> 
 tr:nth-child(even) {
        background:#69F;
    }
 tr:nth-child(odd){
        background:#CCC;
    }
</style> 

<div align="center">
<table border="1" style="font-size:22px" >
<tr>
<td><b>Nombre</b></td>
<td><b>Apellido</b></td>
<td><b>Membrecia </b></td>
<td><b>Precio $</b></td> 
<td><b>Fecha</b></td>
<td><b>Codigo Cliente</b></td>
<td></td>
</tr>

<?php



$query="SELECT menbre.tipo,menbre.precio,menbre.fecha_pago,menbre.codigo_c, cliente.nombres,cliente.apellidos FROM `menbre` INNER JOIN cliente on cliente.codigo=menbre.codigo_c
WHERE menbre.fecha_pago LIKE '".$fecha_de_hoy."%' and menbre.id_e='".$_SESSION['id']."'
 ORDER by cliente.nombres ASC"; 

 


$result=$mysqli->query($query); 





if($result)
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

<td><?php  echo $nombre;  ?></td>
<td><?php  echo $apellido;  ?></td>
<td><?php  echo $tipo;  ?></td>
<td> <?php  echo $precio;  ?></td>
<td> <?php  echo $fecha_pago;  ?></td>
<td><?php  echo $codigo;  ?></td>
<td> 

<a href="tickett.php?id=<?php echo $codigo;?>">
  <button id="btnImprimir">Imprimir</button>
</a>
	


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








<script src="jquery-3.1.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#btnImprimir').click(function(){
           $.ajax({
               url: 'tickett.php',
               type: 'POST',
               success: function(response){
                   if(response==1){
                       alert('Imprimiendo....');
                   }else{
                       alert('Error');
                   }
               }
           }); 
        });
    });
</script>





</html>