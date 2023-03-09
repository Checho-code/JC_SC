<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
$idUs = $_SESSION['datosU']['id_usuario'];

include '../conexion/conexion.php';

$buscar_usuario = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_usuario ='$idUs' AND estado = 'No enviado'");
$row_usuario = mysqli_fetch_assoc($buscar_usuario);
$num_row = mysqli_num_rows($buscar_usuario);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <style>
    .btnCarrito {
        visibility: hidden;
    }
    </style>
    <title>Contacto | Solcomercial</title>

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
	include 'mod/mod_carrito.php';

	?>
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
                        <option selected value="0">Seleccione</option>
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

                <?php include('../controladores/email-contacto2.php') ?>

                <div class="col-12 mt-5 mb-5">
                    <a href="index.php" class="btn btn-warning">Cancelar</a>
                    <button class=" btn"
                        style=" color:white; background-color: #177c03; width: 150px; margin-left: 50px; " type="submit"
                        name="btnEnviar">Enviar</button>
                </div>
            </form>
    </div>

    <br>
    <br>
    <br>

    <!---------------- Footer --------------->
    <footer>

        <div class="container__footer">
            <div class="box__footer">
                <div class="logo">
                    <img src="../img/sistema/logo.png" alt="">
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
            <p>Todos los derechos reservados © 2023 <b>Juanda-Code</b> <img src="../img/código.png"
                    alt="Logo programador" style="width: 3%; border-radius: 50%; "></p>
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