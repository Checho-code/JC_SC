<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Productos | Solcomercial</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.3.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
    <style>
        .btnCarrito {
            visibility: hidden;
        }
    </style>

</head>

<body>

    <!---------------- Formulario Registro --------------->

    <div class="container mt-5">
        <h4 style="color: #177c03; text-align: center;" class="mb-3">
            Formulario de registro de productos
        </h4>
        <div class="row text-center mt-5 " style="background-color: #cecece">
            <div class="col-md-12 text-center ">
                <strong>Registrar Nuevo Producto</strong>
            </div>
        </div>
        <a href="listar-producto.php" class="btn btn-warning mt-3 mb-3">Ver Productos</a>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!--- Formulario para registrar Productos --->

                            <form method="post" enctype="multipart/form-data" style="background-color: #f7f7f7;border-radius: 20px; padding: 16px; ">

                                <div class="row justify-content-around mt-3 p-2">

                                    <div class="col-5">
                                        <label for="destacado">Marca *</label>
                                        <select id="marca" class="form-control" name="marca">
                                            <option value="0">Seleccione</option>
                                            <!-- Codigo para llenar select con BD -->
                                            <?php
                                            $sqlM = ("SELECT * FROM marcas");
                                            if ($res = mysqli_query($conexion, $sqlM)) {
                                                $cant = mysqli_num_rows($res);
                                                if ($cant > 0) {
                                                    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
                                                        echo '<option value="' . $row['id_marca'] . '">' . $row['nom_marca'] . '</option>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class="col-5" id="cont-categoria">

                                    </div>

                                </div>

                                <div class="row justify-content-around  mt-3 p-2">
                                    <div class="col-5">
                                        <label for="nombre producto">Nombre producto *</label>
                                        <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre del producto" autocomplete="off" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != '') : ?> value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
                                    </div>

                                    <div class="col-5">
                                        <label for="precios">Precio *</label>
                                        <input type="text" maxlength="6" name="precio" placeholder="Ingrese precio de venta" class="form-control" autocomplete="off" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" <?php if (isset($_REQUEST['precio']) && $_REQUEST['precio'] != '') : ?> value="<?php echo $_REQUEST['precio']; ?>" <?php endif; ?> />
                                    </div>

                                </div>

                                <div class="row justify-content-around  mt-3 p-2">
                                    <div class="col-5">
                                        <label for="unidads">Presentación *</label>
                                        <input name="unidad" type="text" class="form-control" placeholder="Ejm: Kilo, Libra, Unidad....." autocomplete="off" <?php if (isset($_REQUEST['unidad']) && $_REQUEST['unidad'] != '') : ?> value="<?php echo $_REQUEST['unidad']; ?>" <?php endif; ?>>
                                    </div>

                                    <div class="col-5">
                                        <label for="porcentajes">Porcentaje *</label>
                                        <select class="form-control" name="porcentaje">
                                            <option value="Seleccione">Seleccione</option>
                                            <?php for ($i = 10.0; $i >= 0; $i -= 0.5) {
                                                echo '<option value="' . $i . '"> ' . $i . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-around  mt-3 p-2">
                                    <div class="col-5">
                                        <label for="descripcions">Descripción *</label>
                                        <textarea name="descripcion" type="text" class="form-control" placeholder="Ingrese una descripcion corta" autocomplete="off" <?php if (isset($_REQUEST['descripcion']) && $_REQUEST['descripcion'] != '') : ?> value="<?php echo $_REQUEST['descripcion']; ?>" <?php endif; ?>></textarea>
                                    </div>

                                    <div class="col-5">
                                        <label for="estados">Estado *</label>
                                        <select class="form-control" name="estado">
                                            <option value="Seleccione">Seleccione</option>
                                            <option value="Disponible">Disponible</option>
                                            <option value="No disponible">No disponible</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row justify-content-around  mt-3 p-2">
                                    <div class="col-5">
                                        <label for="destacado">Destacar *</label>
                                        <select class="form-control" name="destacado">
                                            <option value="Seleccione">Seleccione</option>
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col-5">
                                        <label for="imagen">Seleccione la imagen del producto</label>
                                        <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif, image/webp" lang="es">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <?php
                                include '../controladores/crear_producto_C.php';
                                ?>
                                <div class="row justify-content-around mt-3 p-2">
                                    <div class="botonera col-5">
                                        <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
                                    </div>
                                    <div class="botonera col-5">

                                        <input type="submit" name="btnSaveProd" value="Guardar" class="btn" style="background-color: #177c03; color:#ffffff">

                                    </div>
                                </div>


                            </form>

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
    <?php include('../vistas/footer.php') ?>

    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/cargar_categorias.js"></script>

</body>

</html>