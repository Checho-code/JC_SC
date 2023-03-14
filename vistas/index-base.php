<?php
session_start();
$_SESSION['datosU']['vieneDe'] = 'base';
$usuario = $_SESSION['datosU']['nombre_usuario'];
$idUs = $_SESSION['datosU']['id_usuario'];
include '../conexion/conexion.php';

$buscar_usuario = mysqli_query($conexion, "SELECT carrito.id_carrito, carrito.id_usuario, carrito.idProducto,carrito.cantidad, productos.precio, productos.nom_producto FROM carrito INNER JOIN productos ON carrito.idProducto = productos.id_producto WHERE id_usuario ='$idUs' AND carrito.estado= 0");
$row_usuario = mysqli_fetch_assoc($buscar_usuario);
$num_row = mysqli_num_rows($buscar_usuario);

$sql = "SELECT COUNT(*) total FROM pedidos WHERE estado = 0";
$result = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($result);
$pedPendientes = $fila['total'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/push.min.js"></script>


    <style>

    </style>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />

    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/ver_prodct.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/carrito.css" />

    <title>
        <?php
        $nivel = $_SESSION['datosU']['nivel'];
        switch ($nivel) {
            case '1':
                echo ('Repartidor');
                break;
            case '2':
                echo ('Vendedor');
                break;
            case '3':
                echo ('Admin');
                break;
            case '4':
                echo ('Cliente');
                break;
        }

        ?> | Solcomercial
    </title>

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


    <!---------------- Marcas ----------------->


    <?php include 'mostrar_marcas.php'; ?>





    <!--------------------- Productos Destacados -------------------->

    <?php include('../controladores/addCarrito2.php'); ?>
    <?php include('../controladores/modif_cant_carrito.php'); ?>
    <?php include('../controladores/vaciarCarrito.php'); ?>

    <?php include 'mostrar_prod_destacados.php'; ?>


    <br>
    <br>
    <br>


    <script>
    Push.create("Hola Admin", {
        body: "Acabas de recibir un pedido nuevo, porfavor verifica...!!!",
        icon: '../img/sistema/logo.png',
        timeout: 5000,
        onClick: function() {
            window.location.href = 'mostrarNoticias.php';
            this.close();
        }
    });
    </script>


    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/validar_numeroNegativo_input.js"></script>




</body>

</html>