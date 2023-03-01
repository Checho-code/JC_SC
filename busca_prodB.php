<?php include 'conexion/conexion.php'; 
error_reporting(0);
?>

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

    <link rel="stylesheet" type="text/css" href="css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="mis_css/menuBasico.css" />
    <link rel="stylesheet" type="text/css" href="mis_css/footer.css" />
    <link rel="stylesheet" type="text/css" href="mis_css/ver_prodct.css" />


    <title>Buscar | Solcomercial</title>
<style>


</style>
</head>

<body>

    <!----------------------------- Navegacion ----------------------------------->

    <nav class="navbar navbar-expand-lg fixed-top mb-5">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                <span class="numProd">0</span>



            </div>
        </div>
    </nav>

    <div class="mt-5 mb-5">.</div>
    <div class="container  ">
    <form action="busca_prodB.php" method="POST" id="formBuscar">
        <div class="row justify-content-center">
            <div class="col-4">
                <input type="text" class="form-control" name="buscarProd" placeholder="Buscar Producto">
            </div>
            <div class="col-4 ">
                <button type="submit" class="btn btn-warning"><i class="fa-solid fa-magnifying-glass"></i></button>

            </div>
        </div>
    </form>
</div>

    <!--------------------- Productos -------------------->


    <div class="contenedor mt-5">

        
        <div class="container-fluid secundario ">

            <div class="row cont-productos">
                <?php
            if (empty($_POST['buscarProd'])) {
             echo '<div class="text-center text-bg-warning text-success p-2"> <h4>No hay busquedas relacionadas</h4></div>';
            }else{
                echo '<div class="text-center p-2 mb-5" style="color:#177c03; font-weight: 600;"> <h4>Resultado de la busqueda</h4></div>';
                $nom = $_POST['buscarProd'];
                $sql = ("SELECT * FROM productos WHERE nom_producto= '$nom' AND estado = 'Disponible'");
                $productos = mysqli_query($conexion, $sql);
                $row_prod = mysqli_fetch_assoc($productos);
            
                do { ?>
                    <div class="col-4 columnas ">
                        <div class="card  tarjeta ">
                            <img src="images/img_productos/<?php echo $row_prod['imagen']; ?>" class="img-producto "
                                style="width: 100%; height: 100%;" alt="Imagen <?php echo $row_prod['nom_producto'] ?> ">

                            <div class=" mt-3">
                                <p class="titulo_producto">
                                    <?php echo $row_prod['nom_producto'] ?>
                                </p>
                            </div>
                            <div class=" mt-3">
                                <button type="button" class="ver" data-toggle="modal"
                                    data-target="#verProdSinLogueo<?php echo $row_prod['id_producto'] ?>">Ver</button>
                                <?php include('mod_ver_prodct.php'); ?><!--Ventana Modal--->
                            </div>
                        </div>
                    </div>
                <?php }while ( $row_prod = mysqli_fetch_assoc($productos)) ?>
                <?php }?>

            </div>
        </div>

    </div>

<br>
<br>
<br>
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
                <a href="#"> <i class="fab fa-brands fa-android"></i> App Android</a>
                <a href="#"> <i class="fab fa-brands fa-app-store"></i> App Apple</a>
                <a href="#"><i class="fab fa-brands fa-whatsapp"></i> WhastsApp</a>
                <a href="#"><i class="fab fa-brands fa-instagram"></i> Instagram</a>
            </div>

        </div>

        <div class="box__copyright">
            <hr>
            <p>Todos los derechos reservados © 2023 <b>Juanda-Code</b> <img src="img/código.png" alt="Logo programador"
                    style="width: 3%; border-radius: 50%; "></p>
            <p>Contacto:<b> 300-725-61-49</b> -- E-mail: <b>codigopractico23@gmail.com</b></p>
        </div>
    </footer>

    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>