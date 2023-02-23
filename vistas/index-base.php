<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />

	<link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />

	<title>Solcomercial</title>

</head>

<body>

	<?php
	$nivel = $_SESSION['datosU']['nivel'];
	switch ($nivel) {
		case '1':
			include('../vistas/menuRepartidor.php');
			break;
		case '2':
			include('../vistas/menuVendedor.php');
			break;
		case '3':
			include('../vistas/menuAdmin.php');
			break;
		case '4':
			include('../vistas/menuCliente.php');
			break;
	}

	?>





	<!---------------- Marcas ----------------->

	<div class="contenedor mb-5">

		<h4 class="text mb-5">Nuestras marcas</h4>

		<div class="container-fluid secundario ">

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

<br>

	<!--------------------- Productos -------------------->


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

	<br>
	<br>
	<br>
	

	<!---------------- Footer --------------->
	<?php include('footer.php') ?>

	<script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/popper.min.js"></script>
</body>

</html>