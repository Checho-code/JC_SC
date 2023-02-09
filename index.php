<!doctype html>
<html lang="es">

<head>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<title>Inicio | Solcomercial</title>

	<link rel="stylesheet" type="text/css" href="css/css_bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/mi_estilo.css" />
	<link rel="stylesheet" type="text/css" href="./mis_css/menuCliente.css" />
	<link rel="stylesheet" type="text/css" href="./mis_css/menuBasico.css" />
	<link rel="stylesheet" type="text/css" href="./mis_css/estilos-index.css" />
	<link rel="stylesheet" type="text/css" href="./css/galeria.css" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

	<script type="text/javascript">
		function cargar_carrito(str, unidad, contador, cantidad) {
			var xmlhttp;


			/*if(isNaN(cantidad) || cantidad==0){
				alert('Valor invalido, no se ha realizado el registro');
			}*/

			if (cantidad && cantidad > 0) {

				if (str == "") {
					document.getElementById("txtHint").innerHTML = "";
					return;
				}
				if (window.XMLHttpRequest) {
					xmlhttp = new XMLHttpRequest();
				} else {
					xmlhttp = new ActiveXObjet("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("carro").innerHTML = '';
						document.getElementById("carro").innerHTML = xmlhttp.responseText;
						document.getElementById("carro" + contador).innerHTML = "Agregado" + " " + cantidad;

					}
				}
			}

			xmlhttp.open("GET", "cargar_carrito.php?idProducto=" + str + "&cantidad=" + cantidad, true);
			xmlhttp.send();

		}

		function aumentar(contador) {
			var nuevo_valor = document.getElementById('cantidad' + contador).value;
			nuevo_valor = parseInt(nuevo_valor);
			nuevo_valor = nuevo_valor + 1;
			document.getElementById('cantidad' + contador).value = nuevo_valor;
		}
	</script>
</head>

<body class="p-3 m-0 border-0 bd-example">
	<div class="container-fluid">
		<!-- 
				//Buscamos la cantidad de elementos que tiene el carrito
				$b_carrito2 = @mysqli_query($conexion, "SELECT id_registro FROM carrito WHERE id_usuario IS NULL AND invitado='$invitado'");
				$row_carrito2 = @mysqli_fetch_assoc($b_carrito2);
				$filas2 = @mysqli_num_rows($b_carrito2);
				echo $filas;
				?> -->
		<!--<div class="row">
			<div class="col-sm-12" align="center">
				
				
				</div>
			</div>-->
		<div class="row fixed-top">
			<div class="col-md-12">
				<!--INICIO DEL MENU-->

				<!-- <?php //session_start(); 
						if ($_SESSION['nivel'] <= 3) {
							include('menuPrincipal.php');
						} else {
							include('menuBasico.php');
						}
						?> -->
				<!-- <//?php include('vistas/menuPrincipal.php'); ?>-->
				<!-- <//?php include('vistas/menuBasico.php'); ?> -->
				<?php include('vistas/menuBasico.php'); ?>
			</div>
		</div>

		<!--Menu de categorias-->
		<div class="categorias">
			<div class="row row-cols-1 row-cols-md-2 g-4">
				<div class="col">
					<div class="card">
						<a class="links"><img src="img/fruCamp.webp" class="card-img-top " id="img1" alt="Logo Frutos del Campo"></a>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<a class="links"><img src="img/Fonda.webp" class="card-img-top" id="img2" alt="Logo La Fonda Chocoana"></a>
					</div>
				</div>
			</div>
		</div>
		<!--Menu de Recomendado-->
		<div class="row">

			<div class="col-sm-10">
				<!--<h2>Elija los productos que desea comprar</h2>-->
				<!--Inicio de la talba modal para enviar los pedidos-->

				<?php $contador = 0;
				do { ?>

					<div>
						<!--  <?php $idSubdepartamento = $row_subdepartamentos['idSubdepartamento'];
								$b_productos = mysqli_query($conexion, "SELECT * FROM productos WHERE idSubdepartamento=$idSubdepartamento AND estado>0");
								$row_productos = @mysqli_fetch_assoc($b_productos);
								?> -->
						<ul class="galeria">
							<?php do { ?>
								<div style="align-content: center; width: 350px; margin: 15px; background-color: #ccc; border-radius: 3px;" align="center">
									<li>
										<figure>
											<a href="img/<?php echo $row_productos['imagen']; ?>" target="_blank">
												<img src="img/miniaturas/<?php echo $row_productos['imagen']; ?>" width="320" alt="<?php echo $row_productos['nombre_producto']; ?>" />
											</a>
											<figcaption><b style="font-size: 20px;">
													<?php echo $row_productos['nombre_producto']; ?>
												</b><br><br>

												<b style="font-size: 24px;">
													<?php echo "$" . number_format($row_productos['precio']); ?> &nbsp;
													<?php echo $row_productos['unidad']; ?>
												</b><br>

												<input name="cantidad" type="text" id="cantidad<?php echo $contador; ?>" placeholder="Cantidad" autocomplete="off" onkeyup="cargar_carrito(<?php echo $row_productos['idProducto']; ?>, '<?php echo $row_productos['unidad']; ?>',<?php echo $contador; ?>, this.value) " size="6" />

												<!-- < $id_prod = $row_productos['idProducto'];
												$texto = '';
												$clase = "";
												$b_carro = mysqli_query($conexion, "SELECT cantidad FROM carrito WHERE idProducto=$id_prod AND invitado='$invitado' AND estado=1");
												$row_prod = @mysqli_fetch_assoc($b_carro);
												$promocion = $row_productos['promocion'];
												$prom = "";
												if ($promocion == 1) {
													$prom = "Promocion";
												}
												if (@$row_prod['cantidad'] != '') {
													$texto = "Agregado" . " " . $row_prod['cantidad'];
												}

												?> -->
												<span id="carro<?php echo $contador; ?>" class="btn btn-success btn-sm" style="font-size: 12px;"><?php echo $texto; ?></span>
											</figcaption>
										</figure>
									</li>
									<div class="<?php echo $prom; ?>"><?php echo $prom; ?></div>
									<div style="margin: 10px; padding: 5px;">
										<?php echo $row_productos['descripcion']; ?>
									</div>
								</div>

							<?php $contador++;
							} while ($row_productos = @mysqli_fetch_assoc($b_productos)); ?>

						</ul>
					</div>

				<?php } while ($row_subdepartamentos = mysqli_fetch_assoc($b_subdepartamentos)); ?>


			</div>
		</div>

		<!-- <div class="row">

											<div class="col-sm-3">
												<<h1>Super</h1>
											</div>
											<div class="col-sm-9">
												
											</div>
										</div> -->


		<!-- <div class="row">
											<div class="col-md-12">
												< include('footer.php'); ?>
											</div>
										</div> -->



	</div>





	<script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/popper.js"></script>
</body>

</html>