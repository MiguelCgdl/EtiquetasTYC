
			<!-- start banner Area -->
			<section class="banner-area relative">
				<div class="overlay overlay-bg"></div>				
				<div class="container">
					<div class="row fullscreen align-items-center justify-content-between">
						<div class="col-lg-6 col-md-6 banner-left">
							
							<h1 class="text-white">Grupo T&C</h1>
							<p class="text-white">
								<b>Misión:</b>
<br>
Somos expertos en tren motriz para servicio pesado, importamos y distribuímos refacciones a nivel nacional, satisfaciendo necesidades actuales y futuras de nuestros clientes, con asesoría especializada y personal altamente calificado, dejando huella en los entornos comunitarios donde operamos.
<br>
<b>Visión:</b>
<br>
Al año 2020, ser el centro de distribución de tren motriz más eficiente del país, creando alianzas estratégicas exitosas e impulsando el desarrollo del transporte en México.
<br>
<b>Valores:</b>
<br>
•Perserverancia<br>
•Honor<br>
•Servicio
							</p>
							
						</div>
						<div class="col-lg-6 col-md-6 banner-left">
							<!-- SiteSearch Google -->
<FORM method=GET action="http://www.google.com/search"> 
<input type=hidden name=ie value=UTF-8> 
<input type=hidden name=oe value=UTF-8> 

<center><A HREF="http://www.google.com/"> 
<IMG SRC="https://www.google.com.mx/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" 
border="0" ALT="Google"></A> 

	<br>
<INPUT TYPE=text name=q size=31 maxlength=255 value=""> 
<INPUT type=submit name=btnG VALUE="Buscar con Google"> 

 
</FORM>

<!-- SiteSearch Google --> 
						</div>
						
					</div>
				</div>					
			</section>
			<!-- End banner Area -->

			<!-- Start popular-destination Area -->
			
			
	
			
			<section class="recent-blog-area section-gap">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-9">
							<div class="title text-center">
								<h1 class="mb-10">¡Feliz Cumpleaños Equipo!</h1>
								<?php 
                                $nmes=date("n");
                                $dmes=date("m");
								$mes=nombremes($nmes);

								
								function nombremes($mes){
								 setlocale(LC_TIME, 'spanish');  
								  $nombre=strftime("%B",mktime(0, 0, 0, $mes, 1, 2000)); 
								   return $nombre;
								}  ?>
								<p>Festejados en el grupo para el mes de <?php echo $mes;   echo $nmes; ?>:</p>
							</div>
						</div>
					</div>	



					<div class="row">


						<div class="active-recent-blog-carusel">
							


<!--informacion automatica-->

							<?php  

$mysqli = new mysqli("localhost", "root", "", "corporativo");
if ($mysqli->connect_errno) {
    echo "Falló la conexión con MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$mysqli->set_charset("utf8");


if (!$mysqli->query("DROP TABLE IF EXISTS test") ||
    !$mysqli->query("CREATE TABLE test(id INT)") ||
    !$mysqli->query("INSERT INTO test(id) VALUES (1)")) {
    echo "Falló la creación de la tabla: (" . $mysqli->errno . ") " . $mysqli->error;
}

$resultado = $mysqli->query("SELECT * FROM personal WHERE month(nacimiento) = '$dmes' ");


while($row = mysqli_fetch_array($resultado))  {

   
							echo "<div class='single-recent-blog-post item'>
								<div class='thumb'>
									<img class='img-fluid' src='img/FOTOS DEL PERSONAL/".$row['sucursal']."/".$row['foto']."' width='150' height='50'>
								</div>
								<div class='details'>
									<div class='tags'>
										<ul>
											<li>
												<a>".$row['sucursal']."</a>
											</li>
																						
										</ul>
									</div>
									<a><h4 class='title'>".$row['nombre']." ".$row['app']." ".$row['apm']."</h4></a>
									
									<h6 class='date'>".$row['nacimiento']."</h6>
								</div>	
							</div>";

						}
						mysqli_close($mysqli);

							?>

							

<!--informacion automatica-->							
							
							
							
							
							
							
																				

						</div>
					</div>
				</div>	
			</section>
					

	