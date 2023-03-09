<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php'
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
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
    <title>Frutos del campo</title>

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

    <div class="container-fluid mt-5 mb-5 ">

        <div class="row col-12 justify-content-center">

            <div class="col-6">
                <h3 style="color: #177c03; text-align: center;">Cambio de contraseña </h2>
                    <br>
                    <form name="cambio_clave" method="POST">
                        <div class="form-group">
                            <label for="cedula">Cedula del cliente *</label>
                            <input type="text" name="documento" class="form-control"
                                placeholder="ingrese la cedula del cliente" />
                        </div>
                        <br>
                        <br>
                        <?php include('../controladores/cambio-clave_C.php') ?>

                        <div class="form-group">
                            <label for="clave">Nueva Contraseña *</label>
                            <input type="password" name="clave" class="form-control" placeholder="Nueva contraseña" />
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-6 ">
                                <input type="submit" value="Guardar cambios" class="btn" name="btnCambioClave"
                                    style="background-color: #177c03; color:#ffffff;" />
                            </div>
                            <div class="col-6 ">
                                <a href="index-base.php"><input type="button" value="Cancelar"
                                        class="btn btn-warning"></a>
                            </div>
                        </div>
                    </form>
            </div>
        </div>





    </div>

    <br>
    <br>
    <br>
    <br>
    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>