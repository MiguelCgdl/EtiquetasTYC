	<link href="plugins/select2/select2.css" rel="stylesheet">
			<!-- start banner Area -->
			<section class="relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Imprimir Embarque | Etiquetas Pequeñas
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Inicio </a>  <span class="lnr lnr-arrow-right"></span>  <a > Etiquetas</a></p>
						</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->	
			<br><br>
			<section>
				<center> 
					<form method="post" action="dom/buscaetiquetasp.php" >   
                          
                        
                         <select name="options">
                               <option value="entrada">Entrada</option>
                               <option value="factura">Factura</option>
                          </select>         
                          <input type="number" id="name" name="name" requiered>
                          <button type="submit" id="submit" class="button"  >Buscar</button>
					
					</form>
					

					<div  id="resultado">
						
					</div>
				</center> 
			</section>



