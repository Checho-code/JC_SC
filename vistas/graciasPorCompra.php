<?php
session_start();
include '../conexion/conexion.php';

$_SESSION['datosU']['vieneDe'] = 'base';
$usuario = $_SESSION['datosU']['nombre_usuario'];
$nombre = $_SESSION['datosU']['nombre_usuario'];
$apellido = $_SESSION['datosU']['apellido_usuario'];
$correo = $_SESSION['datosU']['email'];
$cc = $_SESSION['datosU']['num_doc'];
$rol = $_SESSION['datosU']['nivel'];
$tel = $_SESSION['datosU']['telefono'];
$idUs = $_SESSION['datosU']['id_usuario'];




$buscar_usuario = mysqli_query($conexion, "SELECT * FROM carrito");
$row_usuario = mysqli_fetch_assoc($buscar_usuario);
$num_row = mysqli_num_rows($buscar_usuario);




?>

<!DOCTYPE html>
<html lang="es">

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
    <link rel="stylesheet" type="text/css" href="../mis_css/realizarPedido.css " />

    <style>
    .btnCarrito {
        visibility: hidden;
    }
    </style>
    <title>Detalles Compra | Solcomercial</title>

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

    <h2 class="mt-5 mb-5 text-center" style="color:#177c03;">¡¡¡ Gracias por su compra !!!</h2>



    <div class="container w-75 ">
        <div class="row col-12 justify-content-center">
            <a class="text-decoration-none text-success text-center bg-warning w-25" href=" index-base.php">Ir a <i
                    class="fa-solid fa-house-chimney"></i></a>
        </div>
    </div>


    <!-- Detalles pedido -->
    <h4 class="titDetPed modal-title">Detalles del cliente</h4>
    <div class="container">
        <div class="row col-12 ">
            <div class="row  justify-content-center">

                <div class="row col-4 ">
                    <label>Nombre Cliente</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['nombre_usuario']  ?>
                    </p>
                </div>
                <div class="row col-4 ">
                    <label>Apellido Cliente</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['apellido_usuario']; ?>
                    </p>
                </div>
                <div class="row col-4 ">
                    <label>Telefono Cliente</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['telefono']  ?>
                    </p>
                </div>
            </div>
            <div class="row  justify-content-center">

                <div class="row col-4 ">
                    <label>Numero Documento</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['nombre_usuario']  ?>
                    </p>
                </div>
                <div class="row col-4 ">
                    <label>Correo</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['apellido_usuario']; ?>
                    </p>
                </div>
                <div class="row col-4 ">
                    <label>Departamento</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['telefono']  ?>
                    </p>
                </div>
            </div>
            <div class="row  justify-content-center">

                <div class="row col-4 ">
                    <label>Ciudad</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['nombre_usuario']  ?>
                    </p>
                </div>
                <div class="row col-4 ">
                    <label>Sector</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['apellido_usuario']; ?>
                    </p>
                </div>
                <div class="row col-4 ">
                    <label>Direccion</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['telefono']  ?>
                    </p>
                </div>
            </div>
            <div class="row  justify-content-center">

                <div class="row col-4 ">
                    <label>Observaciones</label>
                    <p class="">
                        <?php echo  $_SESSION['datosU']['nombre_usuario']  ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- **************************************************************************************************************** -->


    <!-- Detalles pedido -->
    <h4 class="titDetPed modal-title">Detalles de su pedido</h4>
    <div class="row justify-content-center">
        <div class="col-10">

            <div class="row mt-3">
                <div class="col-12 p-2">

                    <div class="table-responsive">
                        <table class="table  table-hover">
                            <thead>
                                <tr>
                                    <th class="titPro">Producto
                                    </th>
                                    <th class="titPro">Presentacion
                                    </th>
                                    <th class="titPro">Cantidad
                                    </th>
                                    <th class="titPro">Precio Und.
                                    </th>
                                    <th class="titPro">Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bodyTable mt-2 ">
                                </?php do { ?>
                                <tr class="fw-semibold text-center">

                                    <td class="w-25 ">1
                                        </?php echo $row_usuario['nom_producto']; ?>
                                    </td>

                                    <td class="w-0 ">2
                                        </?php echo $row_usuario['cantidad']; ?>
                                        <input type="hidden" class="w-50 text-center" name="cantidad"
                                            value="</?php echo $row_usuario['cantidad']; ?>">
                                        <input type="hidden" value="</?php echo $row_usuario['id_carrito']; ?>"
                                            name="id_carrito">
                                    </td>

                                    <td class="w-25 ">3
                                        </?php echo "$ " . $row_usuario['precio']; ?>
                                    </td>
                                    <td class="w-25 ">4
                                        </?php echo "$ " . $row_usuario['precio']; ?>
                                    </td>
                                    <td class="subtotal w-25">5
                                        </?php $subt=$row_usuario['cantidad'] * $row_usuario['precio']; echo "$ " .
                                            $subt; ?>
                                        <input type="hidden" value="</?php echo  $tot = $tot + $subt;  ?>">
                                    </td>
                                </tr>
                            </tbody>

                            </?php } while ($row_usuario=mysqli_fetch_assoc($buscar_usuario)); ?>

                        </table>
                        <div class="ctTot">
                            <div class="cajaTot">
                                <h5 class="tit5">Total a pagar: <span class="txtotal "></?php echo "$ " . $tot ?>
                                    </span>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>

<!-- 
  </body>
</html> -->