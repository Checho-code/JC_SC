<?php
session_start();
$nivel = $_SESSION['datosU']['nivel'];
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../vistas/menuAdmin.php';
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Caja | Frutos del campo</title>

</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">
        <?php include('../controladores/caja_C.php') ?>
        <div class="row">

            <div class="col-sm-12">
                <h3 style="color: #177c03; text-align: center;">Saldo en caja:
                    <?php echo number_format($row_caja['ingresos'] - $row_caja['egresos']);
                    $saldo = $row_caja['ingresos'] - $row_caja['egresos']; ?>
                </h3>
                <h4 style="color: #177c03; text-align: center;">Cierre de caja: </h4>
                <form name="cierre" method="post">
                    <div class="form-group">
                        <label for="fecha">Fecha de cierre: </label>
                        <input type="date" class="form-control" readonly value="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group mt-5 mb-5">
                        <!--<label for="saldo">Saldo en caja: *</label>-->
                        <input type="hidden" class="form-control" required placeholder="ingrese el saldo a cerrar" value="<?php echo $saldo; ?>" name="saldo">
                    </div>

                    <div class="form-group mt-5 mb-5">
                        <label for="saldo">Clave maestra: *</label>
                        <input type="password" class="form-control" required placeholder="ingrese la clave para cierre" name="clave_maestra" autocomplete="off">

                    </div>

                    <div class="form-group mt-5 mb-5">
                        <input type="submit" value="Cerrar caja" class="btn" style="background-color: #177c03; color:#ffffff">
                        <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>

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

    <script type="text/javascript" src="../js/jquery.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/popper.js"></script>
</body>

</html>