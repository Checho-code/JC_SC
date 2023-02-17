<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuAdmin.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Frutos del campo</title>

</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">
        <?php include('../controladores/crear_marca.php') ?>
        <div class="row ">
            <div class="col-sm-12">
                <form method="post" enctype="multipart/form-data">
                    <h3 style="color: #177c03; text-align: center;">Agregar marca </h3>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="nombre producto">Nombre marca *</label>
                        <input name="nombre_marca" type="text" class="form-control" placeholder="Ingrese nombre de la marca" autocomplete="off">
                    </div>

                    <div class="form-group mt-5 mb-5">
                        <label for="imagen">Seleccione la imagen de la marca</label>
                        <input type="file" name="foto" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" lang="es">
                    </div>
                    
                    <div class="form-group mt-5 mb-5"">
			
						<label for="tipo-docs">Estado *</label>
						<select class="tip-doc form-control" name="estado">
							<option value="ver">Activo</option>
							<option value="nover">Inactivo</option>
						</select>
			</div>
                    <div class="form-group mt-5 mb-5">
                        <input type="submit" name="btnGuardar" value="Guardar" class="btn" style="background-color: #177c03; color:#ffffff">
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

    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>