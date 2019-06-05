
  <!DOCTYPE html>
  <html lang="zxx" class="no-js">
  <head>
    <link rel="shortcut icon" href="../img/favicon_tyc.png" />
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Author Meta -->
    <meta name="author" content="GRUPOTYC">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Grupo T&C</title>
      <!--
      CSS
      ============================================= -->
      <link rel="stylesheet" href="../css/linearicons.css">
      <link rel="stylesheet" href="../css/font-awesome.min.css">
      <link rel="stylesheet" href="../css/bootstrap.css">
      <link rel="stylesheet" href="../css/magnific-popup.css">
      <link rel="stylesheet" href="../css/jquery-ui.css">        
      <link rel="stylesheet" href="../css/nice-select.css">              
      <link rel="stylesheet" href="../css/animate.min.css">
      <link rel="stylesheet" href="../css/owl.carousel.css">       
      <link rel="stylesheet" href="../css/main.css">
 </head>
    <body>  
      <header id="header">
        <div class="header-top">
          <div class="container">
                              
          </div>
        </div>
        <div class="container main-menu">
          <div class="row align-items-center justify-content-between d-flex">
              <div id="logo">
                <a href="../index.html"><img src="../img/logo_55x155.png" alt="" title="" /></a>
              </div>
              <nav id="nav-menu-container">
                <ul class="nav-menu">

                  <!-- Menu Inicio -->
                  <li class="menu-has-children"><a href="../index.html">INICIO</a> </li> 
                 
                </ul>
              </nav><!-- #nav-menu-container -->                      
          </div>
        </div>
      </header><!-- #header -->

      <section class="relative about-banner" id="home"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Etiquetas Chicas
              </h1> 
              <p class="text-white link-nav"><a href="../index.html">Inicio </a>  
            </div>  
          </div>
        </div>
      </section>




      <?php
   

      $buscar = $_POST['name'];
      $tipo = $_POST['options'];
      $b="";
       
      if(!empty($buscar)) {
        $entrada = preg_replace('([^0-9])', '', $buscar);
        $b=$entrada;
        
      }
        else{
 echo"Sin datos que mostrar"; 
      }
       
   

  
$serverName = '192.10.10.1';

$connectionInfT = array("Database"=>"SBO_TRANSMISIONES", "UID"=>"sa", "PWD"=>"Tce9005226R4", "CharacterSet"=>"UTF-8");
$conn_sisT = sqlsrv_connect($serverName, $connectionInfT);

$connectionInM = array("Database"=>"SBO_MASTERS", "UID"=>"sa", "PWD"=>"Tce9005226R4", "CharacterSet"=>"UTF-8");
$conn_sisM = sqlsrv_connect($serverName, $connectionInM);

if ($conn_sisT) {

}else{
echo "fallo";
die(print_r(sqlsrv_errors() , true));
}
$sql = "";
if ($tipo=='entrada') {
  $sql = "SELECT * FROM OITM, OITB, ITM1, OPDN, PDN1 WHERE ITM1.ItemCode = OITM.ItemCode AND ITM1.ItemCode = PDN1.ItemCode AND OITM.ItmsGrpCod = OITB.ItmsGrpCod AND OPDN.DocNum = PDN1.DocEntry AND OPDN.DocNum = '".$b."'";
}else if ($tipo=='factura') {
  $sql = "SELECT * FROM OITM, OITB, ITM1, OPCH, PCH1 WHERE ITM1.ItemCode = OITM.ItemCode AND ITM1.ItemCode = PCH1.ItemCode AND OITM.ItmsGrpCod = OITB.ItmsGrpCod AND OPCH.DocNum = PCH1.DocEntry AND OPCH.DocNum = '".$b."'";
}


//$almacen= "SELECT ItemCode, WhsCode, OnHand, OnOrder, IsCommited FROM OITW WHERE WhsCode != '02' AND WhsCode != '03' ORDER BY ItemCode" ;
//$sql = "SELECT * FROM OITM, OITB, ITM1 WHERE ITM1.ItemCode = OITM.ItemCode AND OITM.ItmsGrpCod = OITB.ItmsGrpCod AND ITM1.PriceList=1 AND OITM.ItemName LIKE '%".$b."%' ORDER BY ITM1.ItemCode";  DocNum, CardCode, NumAtCard,
 
$stmt = sqlsrv_query( $conn_sisT, $sql );
//$stal = sqlsrv_query( $conn_sisT, $almacen );
//$stal2 = sqlsrv_query( $conn_sisM, $almacen );

if( $stmt === false) {
 die( print_r( sqlsrv_errors(), true) );
}

//if( $stal === false) {
 //die( print_r( sqlsrv_errors(), true) );
//}
//if( $stal2 === false) {
// die( print_r( sqlsrv_errors(), true) );
//}



// METODO VECTORES 
$tamañot=0;
$tamañom=0;
$proveedor="";

 for ($i=0; $i < $rowT = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC); $i++) { 
$tamañot=$tamañot+1;
$proveedor=substr($rowT['CardCode'], 3);
$factura = strtoupper($rowT['NumAtCard']);
$transmisiones[0][$i] = strtoupper($rowT['ItemCode']);
$transmisiones[1][$i] = strtoupper($rowT['ItemName']);
$transmisiones[2][$i] = strtoupper($rowT['ItmsGrpNam']);
$transmisiones[3][$i] = round($rowT['Quantity']);
$transmisiones[4][$i] = "0";//original

$reem   = "-1";//reemplazo
$ori   = "-2";//original
$nacional   = "@N";//nacional



$posicion_reem = strpos($transmisiones[0][$i], $reem);
$posicion_ori = strpos($transmisiones[0][$i], $ori);
$posicion_nacional = strpos($transmisiones[0][$i], $nacional);
 
//se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
if ($posicion_reem == true) {
    $transmisiones[4][$i] = "1";
    } 
if ($posicion_ori == true) {
    $transmisiones[4][$i] = "2";
    } 
if ($posicion_nacional == true) {
    $transmisiones[4][$i] = "QN";
    } 

$vowels = array("-1", "-2", "@N");
$transmisiones[0][$i] = ''.str_replace($vowels, "", $transmisiones[0][$i]);    

} 

if ($tamañot>1) {
  

?>
<body>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">

<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="../../app/js/jquery.dataTables.min.js"></script>

<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<div style="width: 200px; height: 50px; "></div>
<center><form method="POST" action="vistaprevias.php">
Entrada: <input type="text" name="entrada" value="<?php echo $entrada; ?>" readonly><br><br>
Proveedor: <input type="text" name="proveedor" value="<?php echo $proveedor;  ?>" readonly><br><br>
Factura: <input type="text" name="factura" value="<?php echo $factura;  ?>" readonly><br><br>
Pedimento: <input type="text" name="pedimento" optional><br><br><br>
<input type="hidden" name="tamañot" value="<?php echo $tamañot;  ?>">

  <center><input type="submit" value="Vista Previa"></center>
  <br>
  <br>
<center><div style="width: 1200px; height: 300px; text-align:center; overflow:auto;"  >
<div class="box-header">
<div class="box-name" style=" border-top-style: solid;
  
  border-bottom-style: solid;
  ">
<h6><i class="fa fa-table"></i>
  

<span>Entrada de Mercancia</span></h6>
</div>

</div>
<div>

</div>
<div class="box-content no-padding" style="border-bottom-style: solid;">

<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="tabla">
<thead>
<tr>
<th>IMPRIMIR</th>
<th>CÓDIGO</th>
<th>DESCRIPCIÓN</th>
<th>DESCRIPCIÓN 2</th>

<th>CANTIDAD</th>
<th>UNIDADES P/CAJA</th>


</tr>
</thead>
<tbody style="height:30%;">


<?php
for ($i=0; $i < $tamañot ; $i=$i+10) { 

echo "<tr>";
echo "<td> <input type='checkbox' name='".$i."check' value='imprimir' ></td> ";
echo "<td>".$transmisiones[0][$i]."<input type='hidden' name='".$i."codigo' value='".$transmisiones[0][$i]."' readonly ></td>";
echo "<td> <input type='text' name='".$i."descrip' value='".$transmisiones[1][$i]."' requiered></td> ";
echo "<td> <input type='text' name='".$i."linea' value='".$transmisiones[2][$i]."' requiered></td> ";
echo "<input type='hidden' name='".$i."origen' size='2' value='".$transmisiones[4][$i]."'> ";
echo "<td><input type='number' name='".$i."cantidad' size='2' value='".$transmisiones[3][$i]."' readonly></td>";
echo "<td> <input type='number' name='".$i."upc' value='1' requiered size='5'> </td>";


echo "</tr>";
}     
       
?>
</tbody>
</table>
</div>
</div>
<?php 

}
else{

echo "<br><h1>Entrada sin informacion</h1>";

}


 ?>

</center>


<script type="text/javascript">
  $(document).ready(function() {
      $('#tabla').dataTable();
  } );

</script>
<br>


</form></center>
<div id="contenedorForm">

</div>
</body>


<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
      <script src="../js/popper.min.js"></script>
      <script src="../js/vendor/bootstrap.min.js"></script>      
      <script src="../js/jquery-ui.js"></script>
      <script src="../js/My_Query.js"></script>          
        <script src="../js/easing.min.js"></script>      
      <script src="../js/hoverIntent.js"></script>
      <script src="../js/superfish.min.js"></script> 
      <script src="../js/jquery.ajaxchimp.min.js"></script>
      <script src="../js/jquery.magnific-popup.min.js"></script>           
      <script src="../js/jquery.nice-select.min.js"></script>          
      <script src="../js/owl.carousel.min.js"></script>              
      <script src="../js/mail-script.js"></script> 
      <script src="../js/main.js"></script>  
