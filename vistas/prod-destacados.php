<?php include '../conexion/conexion.php' ?>
	<!------------------------------- Prod destacados ------------------------------------------->


	<div class="contenedorP">
		<div class="cont-txt-prod">
		<h4 class="textP">Productos más destacados</h4>
		</div>
		<div class="container-fluid secundarioP ">
			
			<div class="row cont-productos">
			<?php
				$query = mysqli_query($conexion, "SELECT * FROM productos WHERE  estado>0");
				while ($consulta = mysqli_fetch_array($query)) { ?>
					<div class="col-4 columnasP ">
						<div class="card  tarjetaP ">
							<img src="../img/miniaturas/<?php echo $consulta['imagen']; ?>" class="img-producto " alt="Imagen Frutos del campo">
							<div class=" mt-3">
								<p class="titulo_producto"><?php echo $consulta['nombre_producto'] ?></p>
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

