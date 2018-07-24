<?php 
session_start();

$operacion = $_REQUEST['operacion'];





switch ($operacion) {
	case 'buscarcliente':buscarcliente();
		break;
	case 'buscararticulo':buscararticulo();
		break;
	case 'cancelar':cancelar();
		break;	
	case 'facturacion':facturacion();
		break;
	case 'devolver': devolver();
	    break;	
    
}



function buscarcliente()
{
	include("conexionPDO.php");
	$documento = $_REQUEST['documento'];

	//Esto verifica si el cliente Existe en la BD
	$verificacliente = $bd->query("SELECT * from cliente WHERE codigo= $documento")->fetch(PDO::FETCH_OBJ);
	if(!$verificacliente)
		{
           echo "<script type=\"text/javascript\">alert(\"Cliente no Existe... Verifique que este Bien escrito\");  window.location= 'formulario.php'</script>";
		}
	else
		{
			$cliente = $bd->query("SELECT * FROM cliente WHERE codigo = $documento")->fetch(PDO::FETCH_OBJ);
		    $_SESSION['cliente']=$cliente;
		    header('location:formulario.php');
        }
	
}










function buscararticulo()
{
	
		include("conexionPDO.php");
			$cantidad = $_REQUEST['cantidad'];
			$codigo = $_REQUEST['codigo'];
			
		//Esto verifica si el articulo Existe en la BD
			$verificaarticulo = $bd->query("SELECT * FROM producto WHERE codigo = $codigo")->fetch(PDO::FETCH_OBJ);
			if(!$verificaarticulo)
				{
		           echo "<script type=\"text/javascript\">alert(\"Articulo no Existe... Verifique el codigo\");  window.location= 'formulario.php'</script>";
				}
			elseif ($cantidad<=0) {
				echo "<script type=\"text/javascript\">alert(\"La cantidad del Articulo No puede ser Cero 0...\");  window.location= 'formulario.php'</script>";
			}
		    else
		    {
				$articulo = $bd->query("SELECT * FROM producto WHERE codigo = $codigo")->fetch(PDO::FETCH_OBJ);
				$articulo->cantidad= $cantidad;
				$articulo->subtotal= $subtotal;
				$_SESSION['articulos'][]=$articulo;
				header('location:formulario.php');
			}
		
   
}





function devolver()
{
	
$x = $_REQUEST['id'];
$articulos = $_SESSION['articulos'];

foreach ($articulos as $a) {
	if ($a->codigo==$x) {
	unset($_SESSION["articulos"]);
	header('location:formulario.php');				
	}		

}

}








function cancelar()
{
	unset( $_SESSION["cliente"] ); 
	unset( $_SESSION["articulos"] ); 
   

	header('location:formulario.php');
}



























function facturacion()
{
	include("conexionPDO.php");
	date_default_timezone_set('America/Santo_Domingo');
	$fecha_de_hoy=date("Y-m-d H:i:s");


	if (isset($_SESSION['cliente']))
	 {
			$cliente = $_SESSION['cliente'];
			$articulos = $_SESSION['articulos'];
			$total = $_REQUEST['total'];
	        


			$bd->query("INSERT INTO `venta` (`id_v`, `total`, `fecha`, `estado`, `id_e`, `id_c`) VALUES (NULL, '$total', '$fecha_de_hoy', 'finalizado', '".$_SESSION['id']."', '$cliente->codigo')");
			$venta = $bd->lastInsertId();
		


			foreach ($articulos as $a) {

          $stock = $a->control_stock - $a->cantidad;
				if ($stock>=0) 
				{
				   $bd->query("INSERT INTO `detalle` (`id_d`, `cantidad`, `sub_total`, `id_v`, `id_p`) VALUES (NULL, '$a->cantidad', '$a->subtotal', '$venta', '$a->codigo')");

			       $bd->query("UPDATE `producto` SET `control_stock` = '$stock' WHERE `producto`.`id_p` = '$a->id_p'"); 
			       
				}
				else
				{
					echo "<script type=\"text/javascript\">alert(\"Verificar el almacen La cantidad es Nula...\");  window.location= 'formulario.php'</script>";
				}
				
			}
			// imprimir();
			unset($_SESSION["cliente"]);
			unset($_SESSION["articulos"]);
			echo "<script type=\"text/javascript\">alert(\"Venta almacenada Exitosamente...\");  window.location= 'formulario.php'</script>";
			
	 }
	 else
	 {

	 	 header('location:formulario.php');
	 }
	
	
}
























function imprimir()
{
	include("conexionPDO.php");
	include('fpdf.php');


	$cliente = $_SESSION['cliente'];
	$articulos = $_SESSION['articulos'];
    $total = $_REQUEST['total'];
//

$imprimir=$bd->query("SELECT venta.id_v,venta.total, venta.id_c, cliente.nombres, cliente.email,detalle.cantidad, detalle.id_d, detalle.id_p, producto.descripcion, producto.precio
FROM
venta INNER JOIN cliente ON cliente.id_c=venta.id_c INNER JOIN detalle on detalle.id_v=venta.id_v INNER JOIN producto on detalle.id_p = producto.id_p")->fetchAll(PDO::FETCH_OBJ);

$pdf=new FPDF();
$pdf->AddPage();

            
		    // Inserta un logo en la esquina superior izquierda a 300 ppp
			//$pdf->Image('img/logo_001.jpg',25,5,-550);
			$pdf->Image("img/logo_001.jpg" , 25 ,3, 30 , 30 , "JPG" ,"formulario.php");
			// Inserta una imagen dinámica a través de una URL
			//$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(30);
			
			$pdf->Cell(120,10, 'MOUNTAIN FITNESS CENTER',0,0,'C');
			$pdf->SetFont('Arial','B',10);
			$pdf->Ln(5);
			$pdf->Cell(180,10, 'Facturacion',0,1,'C');
			//esto es para imprimir la fecha actual del servidor
			$pdf->SetXY(170,3);
			$pdf->Cell(40,10,"Fecha : ".date('d/m/Y'),0,1,'L');
			//fin fecha
			$pdf->Ln(22);

//Datos del clientes
$pdf->Cell(40,10,'Documento', 1,0,'C');
$pdf->Cell(90,10,'Nombre', 1,0,'C');
$pdf->Cell(50,10,'Telefono', 1,1,'C');
$pdf->Cell(40,10,$cliente->codigo, 1,0,'C');
$pdf->Cell(90,10,$cliente->nombres, 1,0,'C');
$pdf->Cell(50,10,$cliente->email, 1,1,'C');

//Salto de linea
$pdf->Ln();

//Cabezera de la factura
$pdf->Cell(30,10,'Codigo', 1,0,'C');
$pdf->Cell(30,10,'Descripcion', 1,0,'C');
$pdf->Cell(50,10,'Cantidad', 1,0,'C');
$pdf->Cell(50,10,'Precio', 1,0,'C');
$pdf->Cell(20,10,'Subtotal', 1,1,'C');

foreach ($articulos as $a) {
$pdf->Cell(30,10,$a->codigo, 1,0,'C');
$pdf->Cell(30,10,$a->descripcion, 1,0,'C');
$pdf->Cell(50,10,$a->cantidad, 1,0,'C');
$pdf->Cell(50,10,$a->precio, 1,0,'C');
$pdf->Cell(20,10,$a->cantidad * $a->precio,1,1,'C');
}

//Salto de linea
$pdf->Ln();

//Para el Total
$pdf->Cell(30,10,'Total', 1,0,'C');
$pdf->Cell(50,10,$total, 1,1,'C');







//esto es para la firma del coordinador
             $pdf->SetFillColor(232,232,232);
		    $pdf->SetFont('Arial','B',10);
			$pdf->SetXY(10,260);
			$pdf->Cell(180,10, 'Esta factura es valida por un mes',0,1,'C');
			$pdf->SetXY(10,264);
			$pdf->Cell(180,10, 'Depachado por Empleado1',0,1,'C');
            $pdf->SetFont('Arial','', 10);
            $pdf->SetXY(20, 271);
            $pdf->MultiCell(160, 5, utf8_decode('Recuerde guardar el recibo para cualquier reclamacion Gracias por preferirnos '), 0, 'C');

			//fin firma
			
			//esto es para colocar # de pagina 
			$pdf->SetY(-15);
			$pdf->SetFont('Arial','I', 8);
			$pdf->Cell(0,10, 'Pagina '.$pdf->PageNo().'/{n}',0,0,'R' );
			//fin # de pag

$pdf->Output();


}
?>
