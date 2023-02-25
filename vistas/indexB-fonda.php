<?php include '../conexion/conexion.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/menuBasico.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />

	<title>Inicio | La fonda chocoana</title>

</head>

<body>

	<!--------------------------------- Incio ------------------------------->

	<div class="ppal">
		<div class="card mb-3 mt-5" style="max-width: 95%; border: none;">
			<div class="row g-0 mt-5">
				<div class="logo col-sm-3 col-md-5 col-lg-2">
					<img src="../img/sistema/logo.png" class="img-fluid " alt="Logo Solcomercial">
				</div>
				<div class="col-sm-2 col-md-6 col-lg-7 mt-3">
					<div class="card-body">
						<p class="texto-sol">
							Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
							acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
							productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
							de su mano y desde la comodidad de su hogar.</p>

					</div>
				</div>
				<div class=" botonera col-sm-12 col-md-12 col-lg-2">
					<div class="btn-group-vertical">
						<div class="cont-login"><a href="vistas/login.php" class="login">Ingresar</a></div>
						<div class="cont-reg"><a class="register" href="vistas/f_registro.php">Registrate</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<!----------------------------- Navegacion ----------------------------------->

	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container-fluid ">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto nav-item dropdown">
					<li class="nav-item dropdown p-2">
						<a class="nav-link fs-6 fw-semibold text-dark link" href="index-base.php">Inicio</a>
					</li>


					<li class="nav-item p-2">
						<a class="nav-link fs-6 fw-semibold text-dark link" href="../contactanos.php">Contáctanos</a>
					</li>

					<li class="nav-item p-2">
						<a class="nav-link fs-6 fw-semibold text-dark link" href="#">Puntos Solcomercial</a>
					</li>
				</ul>

				<a class="car-button" href="#"><i class="coche icon fa-solid fa-cart-shopping"></i></a>
				<span class="numProd">7</span>

				<ul class="navbar-nav nav-pills mr-l">
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"></input>
						<button class="btn btn-outline-success " type="submit"><i
								class="fa-solid fa-magnifying-glass"></i></button>
					</form>
				</ul>

			</div>
		</div>
	</nav>

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
							echo "indexB-frutos.php";
						}else{
							echo "indexB-fonda.php";

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

<h4>Fonda chocoana</h4>
	<?php	include 'ver-todos-frutos.php'; ?>


	<br>
	<br>
	<br>
	<!---------------- Footer --------------->
<?php	include 'footer.php'; ?>

	<script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/popper.min.js"></script>
</body>

</html>