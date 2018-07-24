<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<br />

<table align="center" border="1">
        <tbody>
        <tr>
        <td ><b>Codigo Cliente</b></td>
        <td><b>Nombres</b></td>
        <td><b>Apellidos</b></td>
        <td><b>Direccion</b></td>
        <td><b>Tipo Membrecia</b></td>
        <td><b>Fecha de ultimo Pago</b></td>
        <td><b>Dias despues del pago</b></td>
        </tr>

<?php
include("conexion.php");

date_default_timezone_set('America/Santo_Domingo');

$fecha_de_hoy=date('Y-m-d');
$resultado = $mysqli->query("SELECT  max(menbre.id),cliente.codigo,cliente.nombres,cliente.apellidos,cliente.direccion, menbre.tipo, menbre.fecha_pago, datediff('$fecha_de_hoy',menbre.fecha_pago) As 'dia_despues_del_ultimo_pago'
FROM menbre INNER JOIN cliente on cliente.codigo=menbre.codigo_c
WHERE menbre.tipo='Mensual'
GROUP BY menbre.codigo_c 
ORDER by cliente.nombres ASC");
$i=0;
$resultado->data_seek(0);
while ($fila = $resultado->fetch_assoc())
 {
	 $i++;
	 $dia=$fila['dia_despues_del_ultimo_pago'];
	 $codigo=$fila['codigo'];
	 $nombre=$fila['nombres'];
	 $apellido=$fila['apellidos'];
	 $direccion=$fila['direccion'];
	 $tipo=$fila['tipo'];
	 $fecha=$fila['fecha_pago'];
	 
	 
	 if($dia>35)
	 {
      ?>
		        
        <tr>
        <td><?php echo $codigo; ?></td>
        <td><?php echo $nombre; ?></td>
        <td><?php echo $apellido; ?></td>
        <td><?php echo $direccion; ?></td>
        <td><?php echo $tipo; ?></td>
        <td><?php echo $fecha; ?></td>
        <td style="border-top-color:#F00; border-color:#F00"><?php echo $dia; ?></td>
        </tr>
        
       
        
        <?php
	 }
 }
 

?>
 </table>
 
<style>
#estilo{
	float:none;
	top:5px;}

</style> 
 <h1 id="#estilo" > Cantidad de Cliente mensuales atrasados <?php echo $i; ?></h1>
</body>
</html>