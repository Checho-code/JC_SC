<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="css/css_bootstrap/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/menuBasico.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/marcas.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/footer.css" />
	<link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

	<title>Contacto | Solcomercial</title>

</head>

<body>

	<!--------------------------------- Incio ------------------------------->

	<div class="ppal">
		<div class="card mb-3 mt-5" style="max-width: 95%; border: none;">
			<div class="row g-0 mt-5">
				<div class="logo col-sm-3 col-md-5 col-lg-2">
					<img src="img/sistema/logo.png" class="img-fluid " alt="Logo Solcomercial">
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
	<hr>

	<!----------------------------- Navegacion ----------------------------------->

	<nav class="navbar navbar-expand-lg fixed-top">
		<div class="container-fluid ">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto nav-item dropdown">
					<li class="nav-item dropdown p-2">
						<a class="nav-link fs-6 fw-semibold text-dark link" href="index.php">Inicio</a>
					</li>


					<li class="nav-item p-2">
						<a class="nav-link fs-6 fw-semibold text-dark link" href="contactanos.php">Contáctanos</a>
					</li>

					<li class="nav-item p-2">
						<a class="nav-link fs-6 fw-semibold text-dark link" href="#">Puntos Solcomercial</a>
					</li>
				</ul>

				<a class="car-button" href="#"><i class="coche icon fa-solid fa-cart-shopping"></i></a>
				<span class="numProd">7</span>

				<!-- <ul class="navbar-nav nav-pills mr-l">
					<a class="btn btn-success m-2" href="busca_prodB.php">BUSCAR PRODUCTOS <span style="margin-left: 10px;"><i class="fa-solid fa-magnifying-glass"></i></span></a>
				</ul> -->


			</div>
		</div>
	</nav>
	<!---------------- contacto --------------->

	<div class="container-fluid w-75 mb-5">
		<h4 class="mt-5 mb-5 text-center" style="color:#177c03;">Formulario de contacto</h3>

			<form class="row g-3 needs-validation" method="post">

				<div class="col-md-12 mt-4">
					<label for="validationCustom01" class="form-label">Nombre completo *</label>
					<input type="text" class="form-control" name="nombre" placeholder="Su nombre y apellido">

				</div>

				<div class="col-md-12 mt-4">
					<label for="validationCustomUsername" class="form-label">Correo *</label>
					<div class="input-group has-validation">
						<span class="input-group-text" id="inputGroupPrepend">@</span>
						<input type="email" class="form-control" name="correo" placeholder="correo@algo.com">

					</div>
				</div>

				<div class="col-md-3">
					<label for="validationCustom04" class="form-label">Tipo de mensaje</label>
					<select class="form-select" name="tipo">
						<option selected disabled value="Felicitacion">Seleccione</option>
						<option value="Felicitaciones">Felicitacion</option>
						<option value="Tengo una Peticion">Petición</option>
						<option value="Tengo una Queja">Queja</option>
						<option value="Tengo un Reclamo">Reclamo</option>
					</select>
				</div>

				<div class="col-md-12 mt-4">
					<label for="validationCustom05" class="form-label">Mensaje *</label>
					<input type="text" class="form-control" name="mensaje" placeholder="Su mensaje ">
				</div>

				<div class="col-12 mt-5 mb-5">
					<button class=" btn" style=" color:white; background-color: #177c03; " type="submit" name="btnEnviar">Enviar</button>
					<a href="index.php" class="btn btn-warning">Cancelar</a>
				</div>
			</form>
<?php include ('./controladores/email-contacto.php')?>
	</div>

	<br>
	<br>
	<br>

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

<!-- 
  </body>
</html> -->