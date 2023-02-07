<!-- <?php
require('../conexion/conexion.php');
//determino si hay una sesion iniciada para mostrar la foto
session_start();

//Buscamos la cantidad de elementos que tiene el carrito
$b_carrito2 = @mysqli_query($conexion, "SELECT id_registro FROM carrito WHERE idCliente IS NULL AND invitado='$");
$row_carrito2 = @mysqli_fetch_assoc($b_carrito2);
$filas2 = @mysqli_num_rows($b_carrito2);


$ver = 'nover';
$contenido = "Salir";
$pag = "login";
$puntos = 0;
$sql_usuario = "SELECT num_doc, nombre_usuario, nivel FROM usuarios WHERE email = ?";
	$stmt_usuario = $conexion->prepare($sql_usuario);
	$stmt_usuario->bind_param('s', $_SESSION['usuario']);
	$stmt_usuario->execute();
	$stmt_usuario->bind_result($correo1, $nombre_usuario1, $nivel1);
	$stmt_usuario->fetch();
	$stmt_usuario->close();
if (isset($_SESSION['nombre_usuario']) && $_SESSION['nombre_usuario'] != '') {
	$id_usuario = $_SESSION['id_usuario'];
	$contenido = "Ingresar";
	$pag = "desconectar";
	$ver = '';
	//Busco el usuario que esta logueado
	

	//Actualizo los productos del carrito que tengan el idUsuario vacio y pertenezcan a este invitado
	//mysqli_query($conexion, "UPDATE carrito SET id_usuario=$id_usuario  WHERE invitado='$invitado'");

	//Busco todo lo que hay en el carrito de este usuario
	$b_puntos = mysqli_query($conexion, "SELECT porcentaje FROM carrito WHERE id_usuario=$id_usuario AND estado=1");

	while ($row_puntos = mysqli_fetch_assoc($b_puntos)) {
		$puntos += $row_puntos['porcentaje'];
	}
	//Busco los abonos que se ha hecho a esos puntos
	$b_abonos = mysqli_query($conexion, "SELECT SUM(total) AS total_abonos FROM abono_comision WHERE id_usuario=$id_usuario");
	$row_abonos = mysqli_fetch_assoc($b_abonos);
	$total_abonos = $row_abonos['total_abonos'];
	$puntos = $puntos - $total_abonos;

}


?> -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../mis_css/menuBasico.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
	<script rel="stylesheet" type="text/css" href="../js/bootstrap.min.js"></script>
	<title>menu Inicio</title>
</head>

<body>
	<div class="ppal">
		<div class="card mb-3 mt-3" style="max-width: 95%; border: none;">
			<div class="row g-0">
				<div class="col-md-2">
					<img src="../img/sistema/logo.png" class="img-fluid rounded-start" alt="Logo Solcomercial">
				</div>
				<div class="col-md-7">
					<div class="card-body mt-2 mr-3">
						<!-- <h5 class="card-title">¿Qué es Solcomercial?</h5> -->
						<p class="card-text ">Somos una empresa ubicada en el municipio de Andes-Antioquia, creada para
							acompañar a los campesinos y emprendedores en el proceso de comercialización de sus
							productos, vinculando diferentes marcas, permitiendo tener un amplio portafolio al alcance
							de su mano y desde la comodidad de su hogar.</p>

					</div>
				</div>
				<div class=" botonera col-md-2  ">
					<div class="btn-group-vertical">
						<div><a href="../vistas/login.php" class="login">Ingresar</a></div>
						<div><a class="register" href="f_registro.php">Registrate</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!---------------------------------------------------------------->

	<nav class="navbar navbar-expand-lg" >

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav nav-pills">
				<li class="nav-item ">
					<a class="link nav-link" href="#">Inicio</a>
				</li>
				

				<li class=" nav-item">
					<a class="link nav-link" href="#">Nosotros</a>
				</li>

				<li class="nav-item">
					<a class="link nav-link" href="#">Mision</a>
				</li>

				<li class="nav-item">
					<a class="link nav-link" href="#">Vision</span></a>
				</li>

				<li class="nav-item">
					<a class="link nav-link" href="#">Puntos Solcomercial</a>
				</li>



			</ul>

		</div>
	</nav>
</body>

</html>