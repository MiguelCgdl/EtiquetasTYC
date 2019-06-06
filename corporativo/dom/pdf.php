
<?php
header("Content-Type: text/html;charset=utf-8");
require '../pdf/fpdf/fpdf.php';
include 'barcode.php';

$Proveedor=$_POST['proveedor'];
$Factura=$_POST['factura'];
$Pedimento=$_POST['pedimento'];
$tamanot=$_POST['tamanot'];



$pdf = new FPDF('L','in',array(3,5));
$pdf->SetMargins(0, 0.2 , 0); 
$pdf->SetAutoPageBreak(true,0);
$pdf->SetTitle('Etiquetas Grandes',TRUE);
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
$lineas=utf8_decode($_POST[''.$i.'linea']);
	$linea=substr($descrip, $pespacio, strlen($descrip))." ".$_POST[''.$i.'linea'];
    //$descrip = substr($descrip, 0, $pespacio); 
	
 
 } 
$codigo = ''.str_replace(" ", "-", $codigo); 
barcode('codigos/'.$codigo.'.png',$codigo, 30, 'horizontal', 'Codabar', false);

$pdf->AddPage();

$pdf->SetFont('Helvetica','BU', 12);
$pdf->Cell(3.8,0, 'Distribution Center', 0, 0);
$pdf->SetFont('Helvetica','', 8);
$pdf->Cell(0,0, 'Units Per Box:'.$upc, 0, 0);
$pdf->Ln();

$pdf->SetFont('Helvetica','B', 50);
$pdf->SetX(0);
$pdf->Cell(0,1.2, $codigo, 0, 0);

$pdf->SetFont('Helvetica','B', 14);
$pdf->SetXY(0.1, 1);
$pdf->Rect(0.1, 1.1, 4.8, 0.5 , 'FD');
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0,0.7, utf8_decode($descrip), 0, 0);


$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(0, 1.3);
$pdf->Cell(0,1, $linea, 0, 0);
$pdf->Ln();

$pdf->Image('codigos/'.$codigo.'.png',0,1.95,1.8,0.5,'PNG');


$pdf->Rect(4, 1.90, 0.8, 0.5 , 'D');
$pdf->Rect(4, 2.20, 0.8, 0.2 , 'DF');

$pdf->SetXY(4.3, 1.90);
$pdf->Cell(0.50,0.30, $origen, 0, 0);

$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Helvetica','B', 10);
$pdf->SetXY(4.12, 2.18);
$pdf->Cell(0.50,0.25, 'Origen', 0, 0);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Helvetica','B', 8);
$pdf->Ln();

$pdf->SetXY(0.3, 2.5);
$pdf->Cell(0.35,0.2, 'Pedimento: '.$Pedimento, 0, 0);

$pdf->SetXY(1.6, 2.5);
$pdf->Cell(0.35,0.2, 'Proveedor: '.$Proveedor, 0, 0);

$pdf->SetXY(2.7, 2.5);
$pdf->Cell(0.35,0.2, 'Factura: '.$Factura, 0, 0);

$pdf->SetXY(3.7, 2.5);
$pdf->Cell(0.35,0.2, 'Linea: '.$lineas, 0, 0);



	
	}
}

}


$pdf->Output('Etiquetas-grandes.pdf','I');

  ?>
