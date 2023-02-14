<?php include 'conexion/conexion.php' ?>

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
	
	<link rel="stylesheet" type="text/css" href="css/css_bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/menuBasico.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/marcas.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/Estilos.css" />

	<link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />
	
	<title>Inicio | Solcomercial</title>
	
</head>

<body>

	<!--------------------------------- Incio ------------------------------->
	
	<div class="ppal">
		<div class="card mb-3 mt-3" style="max-width: 95%; border: none;">
			<div class="row g-0">
				<div class="logo col-sm-4 col-md-3 col-lg-2">
					<img src="img/sistema/logo.png" class="img-fluid " alt="Logo Solcomercial">
				</div>
				<div class="col-sm-4 col-md-6 col-lg-7 mt-3">
					<div class="card-body">
						<p class="card-text">
							Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
							acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
							productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
							de su mano y desde la comodidad de su hogar.</p>

					</div>
				</div>
				<div class=" botonera col-sm-4 col-md-3 col-lg-2">
					<div class="btn-group-vertical">
						<div class="cont-login"><a href="vistas/login.php" class="login">Ingresar</a></div>
						<div class="cont-reg"><a class="register" href="vistas/f_registro.php">Registrate</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!----------------------------- Navegacion ----------------------------------->
	
	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid ">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto nav-item dropdown">
					<li class="nav-item dropdown p-2">
						<a class="link nav-link fs-6 fw-semibold text-dark " href="index.php">Inicio</a>
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
				</ul>
				<ul class="navbar-nav nav-pills mr-l">
					<li class="linkcar nav-item ">
						<a class="nav-link text-light" href="#"><i class="coche icon fa-solid fa-cart-shopping"></i> Carrito <span class="numProd">0</span> </a>
					</li>
					<form class="d-flex" role="search">
						<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search"></input>
						<button class="btn btn-outline-success " type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
					</form>
				</ul>
				
			</div>
		</div>

	</nav>
	
	<!---------------- Marcas ----------------->

	<div class="contenedor">
		
		<h4 class="text">Nuestras marcas</h4>
		
		<div class="container-fluid bg-warning secundario ">
			
			<div class="row cont-marcas">
				
				
				<?php
				$query = mysqli_query($conexion, "SELECT * FROM marcas");
				while ($consulta = mysqli_fetch_array($query)) { ?>
					<div class="col columnas m-2">
						<div class="card  tarjeta ">
							<img src="<?php echo $consulta['logo'] ?>" class="img-marca " alt="Imagen Frutos del campo">
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
							<img src="img/miniaturas/<?php echo $consulta['imagen']; ?>" class="img-producto " alt="Imagen Frutos del campo">
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

	
	
<!---------------- Footer --------------->
<footer>

<div class="container__footer">
    <div class="box__footer">
        <div class="logo">
            <img src="img/sistema/logo.png" alt="">
        </div>
        <div class="terms">
            <p>Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
							acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
							productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
							de su mano y desde la comodidad de su hogar.</p>
        </div>
    </div>
    

    <div class="box__footer">
        <h2>Nuestas marcas</h2>
        <a href="#">Frutos del campo</a>
        <a href="#">La fonda chocoana</a>
        <a href="#">Artesanisa Andinas</a>
    </div>

    <div class="box__footer">
        <h2>Redes Sociales</h2>
        <a href="#"> <i class="fab fa-facebook-square"></i> Facebook</a>
        <a href="#"><i class="fab fa-whatsapp-square"></i> WhastsApp</a>
        <a href="#"><i class="fab fa-instagram-square"></i> Instagram</a>
    </div>

</div>

<div class="box__copyright">
    <hr>
    <p>Todos los derechos reservados © 2023 <b>Juanda-Code</b> <img src="img/código.png" alt="Logo programador" style="width: 3%; border-radius: 50%; "></p>
    <p>Contacto:<b> 300-725-61-49</b> -- E-mail: <b>codigopractico23@gmail.com</b></p>
</div>
</footer>

	<script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
	<script src="js/jquery.js"></script>
	<script src="js/popper.min.js"></script>
</body>

</html>