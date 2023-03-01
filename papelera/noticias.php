<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="js/jquery.js"></script>
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

    <title>Solcomercial</title>

</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">

            <div class="col-sm-12 ">
                <h2 style="color: #177c03; text-align: center;">Noticias</h2>
                <br>
                <?php include('../controladores/crear_noticia_C.php') ?>
                <br>
                <form name="noticias" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="titulo">Titulo de la noticia *</label>
                        <input type="text" name="titulo" autocomplete="off" class="form-control" placeholder="Titulo de la noticia" />
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="noticia">Noticia *</label>
                        <textarea name="noticia" class="form-control" placeholder="Escriba aquí su publicacion"></textarea>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="imagen">Seleccione la imagen de la noticia</label>
                        <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif" lang="es">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <input type="submit" value="Publicar" class="btn" style="background-color: #177c03; color:#ffffff" name="btnGuardar" />
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <hr>

        <h5 style="color: #177c03; text-align: center;">Video Frutos del campo </h5>
        <br>

        <div class="video">
            <iframe width="860" height="415" src="https://www.youtube.com/embed/x8hEbhePSF4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <br><br>
        <br>

        <h2 style="color: #177c03; text-align: center;">Las noticias </h2>
        <br>

        <div class="row">
            <?php do {
            ?>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../<?php echo @$row_noticias['imagen']; ?>" class="img-fluid rounded-start " style="width: 200px; height:200px;" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">

                                    <h5 class="card-title titulo-noti"><?php echo @$row_noticias['titulo']; ?></h5>

                                    <p class="card-text texto-noti"><?php echo @$row_noticias['noticia']; ?></p>

                                    <p class="card-text fecha-noti"><small><?php echo @$row_noticias['fecha_publicacion']; ?></small></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } while ($row_noticias = mysqli_fetch_assoc($buscar_noticias)); ?>
        </div>

    </div>


    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>