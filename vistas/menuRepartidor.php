<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/menuRepartidor.css" />
	<link rel="stylesheet" type="text/css" href="../mis_css/categorias.css" />
	<link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
	<title>Repartidor | SolComercial</title>
</head>

<body>

	<div class="ppal">
		<div class="card mb-3 mt-3" style="max-width: 95%; border: none;">
			<div class="row g-0">
				<div class="logo col-sm-4 col-md-3 col-lg-2">
					<img src="../img/sistema/logo.png" class="img-fluid " alt="Logo Solcomercial">
				</div>
				<div class="col-sm-4 col-md-6 col-lg-7 mt-3">
					<div class="card-body">
						<p class="card-text ">
							Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
							acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
							productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
							de su mano y desde la comodidad de su hogar.</p>

					</div>
				</div>
				<div class=" botonera col-sm-4 col-md-3 col-lg-2 ">
					<div class="dropdown">
						<button class="btn1 dropdown-toggle" type="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							<i class="fa-solid fa-user" id="user"></i>
							Bienvenido <b>Repartidor</b>
						</button>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">Mi perfil</a></li>
							<li><a class="dropdown-item" href="#">Pendiente</a></li>
							<li><a class="dropdown-item" href="../controladores/cerrar_sesion.php">Cerrar Sesión</a></li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!---------------------------------------------------------------->

	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid ">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto nav-item dropdown">
					<li class="nav-item p-2">
						<a class="link nav-link fs-6 fw-semibold text-dark " href="#">Inicio</a>
					</li>

					<li class="nav-item p-2">
						<a class="link nav-link fs-6 fw-semibold text-dark" href="#">¿Quiénes somos?</a>
					</li>

					<li class="nav-item p-2">
						<a class="link nav-link fs-6 fw-semibold text-dark" href="#">Contáctanos</a>
					</li>

					<li class="nav-item p-2">
						<a class="link nav-link fs-6 fw-semibold text-dark" href="#">Puntos Solcomercial</a>
					</li>

					<li class="nav-item p-2">
						<a class="link nav-link fs-6 fw-semibold text-dark" href="#">Mi panel entregas</a>
					</li>

				</ul>
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

	

	<?php 
include 'categorias.php';
?>

<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
<script  src="../js/jquery.js"></script>
<script  src="../js/popper.min.js"></script>
</body>
</html>