<?php 

//libreria
$proveedor=$_POST['proveedor'];
$factura=$_POST['factura'];
$pedimento=$_POST['pedimento'];
$tamanot=$_POST['tamanot'];

require_once '../Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();

//Propiedades del documento Excel
$objPHPExcel->getProperties()
        ->setCreator("Dpto. Sistemas")
        ->setLastModifiedBy("Almacen")
        ->setTitle("Etiquetas Entrada")
        ->setSubject("Etiquetas del producto")
        ->setDescription("Documento generado para Impresora Zebra")
        ->setKeywords("Zebra Entradas Sistemas")
        ->setCategory("Almacen");

//Propiedades de Hoja
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setTitle('Etiquetas');

$objPHPExcel->getActiveSheet()->setCellValue('A1','CODIGO');
$objPHPExcel->getActiveSheet()->setCellValue('B1','DESCRIPCION');
$objPHPExcel->getActiveSheet()->setCellValue('C1','DESCRIPCION 2');
$objPHPExcel->getActiveSheet()->setCellValue('D1','ORIGEN');
$objPHPExcel->getActiveSheet()->setCellValue('E1','UNIDADES P/CAJA');
$objPHPExcel->getActiveSheet()->setCellValue('F1','PROVEEDOR');
$objPHPExcel->getActiveSheet()->setCellValue('G1','PEDIMENTO');
$objPHPExcel->getActiveSheet()->setCellValue('H1','FACTURA');
$objPHPExcel->getActiveSheet()->setCellValue('I1','ETIQUETAS');


for ($i=2; $i < $tamanot+2 ; $i++) { 
$j=$i-2;
$codigo=$_POST[''.$j.'codigo'];
$descrip=$_POST[''.$j.'descrip'];
$linea=$_POST[''.$j.'linea'];
$upc=$_POST[''.$j.'upc'];
$origen=$_POST[''.$j.'origen'];
$etiquetas=$_POST[''.$j.'etiquetas'];

$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$codigo);
$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$descrip);
$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$linea);
$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$origen);
$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,$upc);
$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$proveedor);
$objPHPExcel->getActiveSheet()->setCellValue('G'.$i,$pedimento);
$objPHPExcel->getActiveSheet()->setCellValue('H'.$i,$factura);
$objPHPExcel->getActiveSheet()->setCellValue('I'.$i,$etiquetas);



}


header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="ETIQUETAS-'.$pedimento.'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');




?>