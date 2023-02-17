<?php include '../conexion/conexion.php' ?>
	<!------------------------------- Marcas ------------------------------------------->

	<div class="contenedor">
		
		<h4 class="text">Nuestras marcas</h4>
		
		<div class="container-fluid bg-warning secundario ">
			
			<div class="row cont-marcas">
				
				
				<?php
				$query = mysqli_query($conexion, "SELECT logo, nom_marca FROM marcas WHERE estado = 'ver'");
				while ($consulta = mysqli_fetch_array($query)) { 
					$ver=$consulta['estado'];//revisra ojo 
					if($ver=='ver') {
					?>
					<div class="col columnas m-2">
						<div class="card  tarjeta ">
							<img src="<?php echo $consulta['logo'] ?>" class="img-marca " alt="Imagen marca">
							<div class=" mt-3">
								<p class="titulo_marca"></p><?php echo $consulta['nom_marca'] ?></p>
							</div>
						</div>
					</div>
					<?php
				}
				}
			
				?>


			</div>
		</div>
	</div>


	<!---------------------------------------------------------------->

