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
<title>Clientes Bloqueados</title>
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

<br />
<a style="font-size:20px" href="menu_atrasados.php"><img height="50px;" width="50px" src="img/ir.png" /></a>





<h1>Listado de Clientes Bloqueados</h1>
<br />

<table align="center" border="1" style="font-size:20px;">
        <tbody>
        <tr>
        <td>Foto</td>
        <td ><b>Codigo Cliente</b></td>
        <td><b>Nombres</b></td>
        <td><b>Apellidos</b></td>
        <td><b>Direccion</b></td>
        <td><b>Tipo Membrecia</b></td>
        <td><b>Fecha de ultimo Pago</b></td>
        <td><b>Dias Atrasado</b></td>
        <td></td>
        </tr>

<?php


$fecha_de_hoy=date('Y-m-d');

$resultado = $mysqli->query("SELECT  cliente.foto,cliente.id_c,menbre.id,cliente.codigo,cliente.nombres,cliente.apellidos,cliente.estado,
cliente.direccion, menbre.tipo, max(menbre.fecha_pago) As 'fecha_pago', datediff('$fecha_de_hoy',
max(menbre.fecha_pago)) As 'dia_despues_del_ultimo_pago'
FROM menbre INNER JOIN cliente on cliente.codigo=menbre.codigo_c
WHERE cliente.estado='inactivo'
GROUP BY menbre.codigo_c
ORDER by cliente.nombres ASC");




$i=0;
$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc())
 {
	 $i++;
	$id_c=$fila['id_c'];
	$imagen=$fila['foto'];
	 $dia=$fila['dia_despues_del_ultimo_pago'];
	 $codigo=$fila['codigo'];
	 $nombre=$fila['nombres'];
	 $apellido=$fila['apellidos'];
	 $direccion=$fila['direccion'];
	 $tipo=$fila['tipo'];
	 $fecha=$fila['fecha_pago'];
	 
	 
		?>        
        
        <tr>
         <td title="Un Click Para Ampliar y Dos Click Para Volver a tamano normal"> <img onClick="javascript:this.width=400;this.height=400" onDblClick="javascript:this.width=100;this.height=80" src="data:imagen/jmg;base64,<?php echo base64_encode($imagen);?>"  width="100"/></td>	
        <td><?php echo $codigo; ?></td>
        <td><?php echo $nombre; ?></td>
        <td><?php echo $apellido; ?></td>
        <td><?php echo $direccion; ?></td>
        <td><?php echo $tipo; ?></td>
        <td><?php echo $fecha; ?></td>
        <td style="border-top-color:#F00; border-color:#F00"><?php echo $dia-30; ?></td>
        
         <td><a href="clientes_dequeados.php?id=<?php echo $id_c;?>"><img title="Debloquear Cliente" width="40px" height="40px" src="img/debloquear.ico" /></a></td>
         
        </tr>
        
       
        
        <?php
	 
 }
 

?>
</tbody>
 </table>
 
 <br />
 
<style>
#estilo{
	position:absolute;
	width:200px;
	height:85px;
	padding: 0px;
	background-color:#009;
	background:#999;
	border-style: dashed;
	border-width: 2px;
	margin: 5px;
	right:10px;
	top:100px;
}

</style> 
<div id="estilo">
 <h3 align="center"> Cantidad de Cliente Bloqueados <?php echo $i; ?></h3>
 </div>
</body>
</html>