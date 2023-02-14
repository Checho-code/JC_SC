<?php include '../conexion/conexion.php' ?>
	<!------------------------------- Marcas ------------------------------------------->

	<div class="contenedor">
		
		<h4 class="text">Nuestras marcas</h4>
		
		<div class="container-fluid bg-warning secundario ">
			
			<div class="row cont-marcas">
				
				
				<?php
				$query = mysqli_query($conexion, "SELECT * FROM marcas");
				while ($consulta = mysqli_fetch_array($query)) { ?>
					<div class="col columnas m-2">
						<div class="card  tarjeta ">
							<img src="../<?php echo $consulta['logo'] ?>" class="img-marca " alt="Imagen Frutos del campo">
							<div class=" mt-3">
								<p class="titulo_marca"></p><?php echo $consulta['nom_marca'] ?></p>
							</div>
						</div>
					</div>
					<?php
				}
				?>


			</div>
		</div>
	</div>


	<!---------------------------------------------------------------->

