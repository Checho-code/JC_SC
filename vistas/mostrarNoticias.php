<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../controladores/crear_noticia_C.php';
?>
<!------------------------------- Prod destacados ------------------------------------------->
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
  <title>Noticias | Solcomercial</title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
  <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />


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

	<div class="container text-center">
<h4 class="text-center mt-5 mb-5" style="color:#177c03; font-weight: 600; ">Las Noticias de Solcomercial</h4>
		<div class="row">
			<?php do { ?>
				<div class="col-sm-12 mb-3 mb-sm-0">
					<div class="card mb-3" style="max-width: 1040px;">
						<div class="row g-0">
							<div class="col-md-4">
								<img src="../images/img_noticias/<?php echo $dataNoticias['imagen']; ?>"
									class="img-fluid " style="border-radius: 100%;" alt="Imagen <?php echo $dataNoticias['titulo']; ?>">
							</div>
							<div class="col-md-8">
								<div class="card-body">
									<h5 class="card-title">
										<?php echo $dataNoticias['titulo']; ?>
									</h5>
									<p class="card-text">
										<?php echo $dataNoticias['noticia']; ?>
									</p>
									<p class="card-text"><small class="text-muted">
											<?php echo $dataNoticias['fecha_publicacion']; ?>
										</small></p>
								</div>
							</div>
						</div>
					</div>

				</div>
			<?php } while ($dataNoticias = mysqli_fetch_assoc($buscar_noticias)); ?>

		</div>
	</div>

	<br>
        <hr>

        <h5 style="color: #177c03; text-align: center;">Video Frutos del campo </h5>
        <br>

        <div class="video">
            <iframe width="860" height="415" src="https://www.youtube.com/embed/x8hEbhePSF4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        
        


	<br>
	<br>
	<br>
	

	<!---------------- Footer --------------->
	<?php include('footer.php') ?>

	<script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>