<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
$sql = "SELECT COUNT(*) total FROM pedidos WHERE estado = 0";
$result = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($result);
$pedPendientes = $fila['total'];
error_reporting(0);
//Juego de registros para las solicitudes de remision
//Busco los pedidos que hay nuevos
$ped = '';
$buscar_nuevoss = mysqli_query($conexion, "SELECT * FROM redenciones JOIN usuarios ON redenciones.id_usuario=usuarios.id_usuario JOIN premios ON redenciones.id_producto=premios.id_premio WHERE redenciones.estado=1 ORDER BY redenciones.id_redencion DESC");
$row_redencioness = mysqli_fetch_array($buscar_nuevoss);
//$ped=mysqli_num_rows($buscar_nuevos);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />
    <style>
        .btnCarrito {
            visibility: hidden;
        }
    </style>
    <title>Puntos | Solcomercial </title>

</head>

<body>
    <?php include '../vistas/menuAdmin.php'; ?>


    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">

            <div class="col-sm-12">
                <h2 style="color: #177c03; text-align: center;">Puntos Solcomercial</h2>
                <h2 style="color: red; text-align: center; margin-top: 40px; background-color: black; ">!!! Falta
                    definir su contenido ??????</h2>


                <!---------------- Footer --------------->
                <?php include('footer.php') ?>

                <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
                <script src="js/jquery.js"></script>
                <script src="js/popper.min.js"></script>
</body>

</html>