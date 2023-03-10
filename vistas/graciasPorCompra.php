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

    <h4 class="mt-5 mb-5 text-center" style="color:#177c03;">Gracias por su compra</h4>

    <a href="index-base.php">Ir a home</a>


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