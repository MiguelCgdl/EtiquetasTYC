
<?php
header("Content-Type: text/html;charset=utf-8");
require '../pdf/fpdf/fpdf.php';
include 'barcode.php';

$Proveedor=$_POST['proveedor'];
$Factura=$_POST['factura'];
$Pedimento=$_POST['pedimento'];
$tamanot=$_POST['tamanot'];



$pdf = new FPDF('L','in',array(1.5,2.9));
$pdf->SetMargins(0, 0.2 , 0); 
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
$linea=$_POST[''.$i.'linea'];


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
$descrip = substr($descrip, 0, $pespacio); 
	 
 
 } 
$codigo = ''.str_replace(" ", "-", $codigo); 
barcode('codigos/'.$codigo.'.png',$codigo, 15, 'horizontal', 'Codabar', false);

$pdf->AddPage();

$pdf->SetFont('Helvetica','BU', 6);
$pdf->Cell(2,0, 'Distribution Center', 0, 0);
$pdf->SetFont('Helvetica','', 4);
$pdf->Cell(0,0, 'Units Per Box:'.$upc, 0, 0);
$pdf->Ln();

$pdf->SetFont('Helvetica','B', 30);
$pdf->SetX(0);
$pdf->Cell(0,0.8, $codigo, 0, 0);

$pdf->SetFont('Helvetica','B', 7);
$pdf->SetXY(0.1, 1);
$pdf->Rect(0.05, 0.8, 2.8, 0.3 , 'FD');
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(0,0, utf8_decode($descrip), 0, 0);

$pdf->Image('codigos/'.$codigo.'.png',0,1.2,0.9,0.25,'PNG');


$pdf->SetFont('Helvetica','B', 10);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(1.95, 1.25);
$pdf->Cell(0.5,0.2, 'Origen: '.' '.$origen, 0, 0);

$pdf->SetXY(0.85, 1.25);
$pdf->SetFont('Helvetica','B',6);
$pdf->Cell(0,0.2, 'Linea: '.$lineas, 0, 0);


	
	}
}

}


$pdf->Output('Etiquetas-grandes.pdf','I');

  ?>
