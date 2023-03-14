<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../controladores/crear_producto_C.php';
$sql = "SELECT COUNT(*) total FROM pedidos WHERE estado = 0";
$result = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($result);
    $pedPendientes = $fila['total'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

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
    <?php include '../vistas/menuAdmin.php';?>
    <?php
  include '../conexion/conexion.php';
  

  $sqlProd = ("SELECT * FROM productos ORDER BY id_producto");
  $queryProd = mysqli_query($conexion, $sqlProd);
  $cantidad = mysqli_num_rows($queryProd);
  ?>


    <!---------------- Formulario Registro --------------->

    <h4 style="color: #177c03; text-align: center;" class="mb-3">
        Listado de Productos
    </h4>

    <!-------------- Tabla de registros --------------->
    <div class="container mt-5">

        <div class="row text-center mt-2" style="background-color: #cecece">
            <div class="col-md-12">
                <strong> Productos listados <span style="color: crimson"> (
                        <?php echo $cantidad; ?> )
                    </span> </strong>
            </div>
        </div>
        <a href="productos_V.php" class="btn btn-success mt-3">Reg. Productos</a>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row mt-3">
                <div class="col-md-12 p-2">


                    <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Id</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Nombre</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Precio</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Unidad</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">%</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Descripcion</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Imagen</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Estado</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Destacar</th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                do { ?>
                                <tr>
                                    <td>
                                        <?php echo $dataProduct['id_producto']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataProduct['nom_producto']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataProduct['precio']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataProduct['unidad']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataProduct['porcentaje']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataProduct['descripcion']; ?>
                                    </td>
                                    <td><img src="../images/img_productos/<?php echo $dataProduct['imagen']; ?>"
                                            width="100" height="100" />
                                    </td>
                                    <td>
                                        <?php $est = $dataProduct['estado'];
                      echo ($est === 'Disponible') ? '<p style="color:green;font-weight:700; ">' . $est . '</p>' : '<p style="color:red; font-weight:700; ">' . $est . '</p>' ?>
                                    </td>

                                    <td>
                                        <?php $est = $dataProduct['destacado'];
                      echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Si </p>' : '<p style="color:red; font-weight:700; ">No</p>' ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteChildresn<?php echo $dataProduct['id_producto']; ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editChildresn<?php echo $dataProduct['id_producto']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <?php include('mod/ModalEditarProdts.php'); ?>

                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('mod/ModalEliminarProdts.php'); ?>


                            <?php } while ($dataProduct = mysqli_fetch_assoc($b_productos)); ?>

                        </table>
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

    <script type="text/javascript">
    $(document).ready(function() {

        $('.btnBorrar').click(function(e) {
            e.preventDefault();
            var id = $(this).attr("id");

            var dataString = 'id=' + id;
            // alert (id + '--' +dataString);
            url = "mod/BorrarProdts.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "listar-producto.php";
                    $('#respuesta').html(data);
                }

            });
            return false;

        });


    });
    </script>

</body>

</html>