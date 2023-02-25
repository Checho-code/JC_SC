<?php include '../conexion/conexion.php' ?>
	<!------------------------------- todos product frutos ------------------------------------------->

	<div class="contenedorP">
		<div class="cont-txt-prod">
			<h4 class="textP">Nuestros Productos</h4>
		</div>
		<div class="container-fluid secundarioP ">

			<div class="row cont-productos">
				<?php
				$query = mysqli_query($conexion, "SELECT * FROM productos WHERE  estado='Disponible'");
				while ($consulta = mysqli_fetch_array($query)) { ?>
					<div class="col-4 columnasP ">
						<div class="card  tarjetaP ">
							<img src="../images/img_productos/<?php echo $consulta['imagen']; ?>" class="img-producto "
								style="width: 100%; height: 100%;" alt="Imagen Frutos del campo">
							<div class=" mt-3">
								<p class="titulo_producto">
									<?php echo $consulta['nom_producto'] ?>
								</p>
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

