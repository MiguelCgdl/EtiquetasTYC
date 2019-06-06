
<?php
header("Content-Type: text/html;charset=utf-8");
require '../pdf/fpdf/fpdf.php';
include 'barcode.php';

$Proveedor=$_POST['proveedor'];
$Factura=$_POST['factura'];
$Pedimento=$_POST['pedimento'];
$tamanot=$_POST['tamanot'];



$pdf = new FPDF('L','in',array(1.2,3.0));
$pdf->SetMargins(0., 0., 0); 
$pdf->SetAutoPageBreak(true,0);
$pdf->SetTitle('Etiquetas Pequeñas',TRUE);
$y = $pdf->GetY();

for ($i=0; $i < $tamanot; $i=$i+10) { 
	
$check=$_POST[''.$i.'check'];
if ($check!='no') {

$Etiquetas=$_POST[''.$i.'etiquetas'];

	for ($j=0; $j < $Etiquetas; $j++) { 
	
$codigo=$_POST[''.$i.'codigo'];

$origen=$_POST[''.$i.'origen'];
$upc=$_POST[''.$i.'upc'];

$descrip=$_POST[''.$i.'descrip'];
$linea=utf8_decode($_POST[''.$i.'linea']);


if (strlen($descrip) > 30) {

    $pespacio=0;
    $max=strlen($descrip);
	for ($p=$max-1; $p > 0 ; $p--) { 
		
		if ($descrip[$p]==' '){
			$pespacio=$p;
			$p=0;

		}
	}
$lineas=$_POST[''.$i.'linea'];
$linea=substr($descrip, $pespacio, strlen($descrip))." ".$_POST[''.$i.'linea'];
//$descrip = substr($descrip, 0, $pespacio); 
	 
 
 } 
$codigo = ''.str_replace(" ", "-", $codigo); 
barcode('codigos/'.$codigo.'.png',$codigo, 15, 'horizontal', 'Codabar', false);

$pdf->AddPage();
///////UNIDAD POR CAJA/////////
$pdf->SetFont('Helvetica','BU', 5);
$pdf->Cell(2.3,.2, 'Distribution Center', 0, 0);
$pdf->SetFont('Helvetica','BU', 5);
$pdf->Cell(.9,0.2, 'Unidad por Caja: '.$upc, 0, 0);
$pdf->Ln();

//Codigo etiqueta

$pdf->SetFont('Helvetica','B', 20);
$pdf->SetX(1);
$pdf->Cell(1,0.3, $codigo, 0,0);

//Descripcion

$pdf->SetFont('Helvetica','B',5);
$pdf->SetXY(0.01, 0.65);
$pdf->Rect(0.038, 0.55, 2.93, 0.2 , 'FD');
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0,0, utf8_decode($descrip), 0, 0);

////////////CODEBAR////////////
$pdf->Image('codigos/'.$codigo.'.png',0,.77,0.9,0.2,'PNG');

//////////ORIGEN////////////////
$pdf->SetFont('Helvetica','B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(2, .8);
$pdf->Cell(0.9,0.17, 'Origen: '.' '.$origen, 1, 0);

/////////////LINEA//////////////////

$pdf->SetXY(0.9, .9);
$pdf->SetFont('Helvetica','BU',6);
$pdf->Cell(0,0.25, 'Linea: '.$lineas, 0, 0);


//////////PEDIMIENTO//////////
$pdf->SetXY(0.1, 1);
$pdf->SetFont('Helvetica','B',5);
$pdf->Cell(0,0.2, 'Pedimento: '.$Pedimento, 0, 0);

//////////Proveedor/////////

$pdf->SetXY(2.3, 1);
$pdf->SetFont('Helvetica','B',5);
$pdf->Cell(0,0.2, 'Proveedor: '.$Proveedor, 0, 0);


	
	}
}

}


$pdf->Output('Etiquetas-grandes.pdf','I');

  ?>
