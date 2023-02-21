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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Frutos del campo</title>


</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">
        <?php include('../controladores/crear_marca_C.php') ?>
        <div class="row ">
            <div class="col-sm-5">
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

                    <div class="form-group mt-5 mb-5">

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


            <div class="col-md-7 ">
                <h3 style="color: #177c03; text-align: center;">Marcas</h3>

                <div class="table-responsive mt-5">

                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tbody>
                            <tr align="center">
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Logo</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            <?php do { 	?>
                                
                                <tr align="center">
                                    <td><?php echo $row_marca['id_marca']; ?></td>
                                    <td><?php echo $row_marca['nom_marca']; ?></td>
                                    <td><img src="../<?php echo $row_marca['logo']; ?>" width="100" height="100" /></td>
                                    <td><?php $est = $row_marca['estado'];
                                        echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?></td>
                                    <td>
                                        <?php include '../controladores/eliminar-marca_C.php';?>
                                        <form  method="post" enctype="multipart/form-data">
                                    <input  name="id" value="<?php echo $row_marca['id_marca']; ?>">
                                    <input  name="nombre" value="<?php echo $row_marca['nom_marca']; ?>">
                                        <!-- <button type="submit" class="btn btn-danger" name="btnBorraMarca">Borrar</button> -->
                                        <input type="submit" name="btnBorraMarca" value="delete" class="btn" style="background-color: #177c03; color:#ffffff">
                              </form>
                                    </td>
                            </tr>
                                  <?php } while ($row_marca = mysqli_fetch_assoc($b_marca)); ?>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>
 

  
    <br>
    <br>
    <br>
    <br>
    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="../js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>

 


</body>

</html>