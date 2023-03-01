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
	<link rel="stylesheet" type="text/css" href="../mis_css/ver_prodct.css" />


	<title>Inicio | La fonda chocoana</title>

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


	<!--------------------- Productos -------------------->
	<!---------------- Marcas ----------------->

	<div class="contenedor">

		<h4 class="text">Nuestras marcas</h4>

		<div class="container-fluid  secundario ">

			<div class="row cont-marcas">


				<?php
				$query = mysqli_query($conexion, "SELECT * FROM marcas WHERE nom_marca != 'La fonda chocoana'");
				while ($consulta = mysqli_fetch_array($query)) { ?>
					<div class="col columnas m-2">
						<div class="card  tarjeta ">
						<a class="link-img" href="<?php $nom= $consulta['nom_marca'] ;
						if($nom=="Frutos del campo"){
							echo "index-frutos.php";
						}else{
							echo "index-fonda.php";

						}?>"><img  src="../images/img_marcas/<?php echo $consulta['logo'] ?>" class="img-marca " alt="Imagen Fonda chocoana"></a>
							<div class=" mt-3">
								<p class="titulo_marca">
								<?php echo $consulta['nom_marca'] ?>
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
	
	
	
	<!--------------------- Productos -------------------->
	<h4>La fonda chocoana</h4>
	<div class="contenedorP">
		<div class="cont-txt-prod">
			<h4 class="textP">Nuestros Productos</h4>
		</div>
		<div class="container-fluid secundarioP ">

			<div class="row cont-productos">
				<?php
				$query = mysqli_query($conexion, "SELECT * FROM productos WHERE  estado='Disponible' AND id_marca= 2");
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

	<br>
	<br>
	<br>
	

	<!---------------- Footer --------------->
	<!---------------- Footer --------------->
	<?php include('footer.php') ?>

	<script src="../js/jquery-3.6.3.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>