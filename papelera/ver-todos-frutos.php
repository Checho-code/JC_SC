<?php include '../conexion/conexion.php' ?>
	<!------------------------------- todos product frutos ------------------------------------------->

	<div class="contenedorP">
		<div class="cont-txt-prod">
			<h4 class="textP">Nuestros Productos</h4>
		</div>
		<div class="container-fluid secundarioP ">

			<div class="row cont-productos">
				<?php
				$query = mysqli_query($conexion, "SELECT * FROM productos WHERE  estado='Disponible' AND id_marca= 1");
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
							<div class=" mt-3">
								<button type="button" class="ver" data-toggle="modal" data-target="#verProdConLogueo<?php echo $consulta['id_producto'] ?>">Ver</button>
								<?php include('mod/mod_comprar_prod.php'); ?><!--Ventana Modal--->
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

