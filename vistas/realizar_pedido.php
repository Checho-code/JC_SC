<?php
session_start();
include '../conexion/conexion.php';
$_SESSION['datosU']['vieneDe'] = 'base';
$usuario = $_SESSION['datosU']['nombre_usuario'];
$correo = $_SESSION['datosU']['email'];
$cc = $_SESSION['datosU']['num_doc'];
$rol = $_SESSION['datosU']['nivel'];
$nombre = $_SESSION['datosU']['nombre_usuario'];
$apellido = $_SESSION['datosU']['apellido_usuario'];
$tel = $_SESSION['datosU']['telefono'];
$idUs = $_SESSION['datosU']['id_usuario'];

$buscar_usuario = mysqli_query($conexion, "SELECT carrito.id_carrito, carrito.id_usuario, carrito.idProducto,carrito.cantidad, productos.precio, productos.nom_producto FROM carrito INNER JOIN productos ON carrito.idProducto = productos.id_producto WHERE id_usuario ='$idUs' AND carrito.estado= 0");
$row_usuario = mysqli_fetch_assoc($buscar_usuario);
$num_row = mysqli_num_rows($buscar_usuario);

$queryDpto = ("SELECT id_dpto, nombre_dpto, estado FROM departamentos WHERE estado =1  ORDER BY nombre_dpto ASC");
$resDpto = mysqli_query($conexion, $queryDpto);

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

    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/ver_prodct.css" />





    <style>
    .btnCarrito {
        visibility: hidden;
    }
    </style>

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
    ?>




    <div class="container-fluid">

        <!-- </?php include '../controladores/crear_pedido_C.php'; ?> -->
        <h4 class="modal-title  text-center ">Detalles de su pedido</h4>
        <div class="row">
            <div class="col-12">

                <div class="row mt-3">
                    <div class="col-12 p-2">

                        <div class="table-responsive">
                            <table class="table  table-hover">
                                <thead>
                                    <tr>
                                        <th class="bg-success-subtle " style="font-size: 0.8rem;">Producto
                                        </th>
                                        <th class="bg-success-subtle" style="font-size: 0.8rem;">Cantidad
                                        </th>
                                        <th class="bg-success-subtle" style="font-size: 0.8rem;">Precio Und.
                                        </th>
                                        <th class="bg-success-subtle" style=" font-size: 0.8rem;">Subtotal
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bodyTable mt-2">
                                    <?php
                                    do { ?>
                                    <tr>

                                        <td class="w-25 ">
                                            <?php echo $row_usuario['nom_producto']; ?>
                                        </td>

                                        <td class="w-0 ">
                                            <?php echo $row_usuario['cantidad']; ?>
                                            <input type="hidden" class="w-50 text-center" name="cantidad"
                                                value="<?php echo $row_usuario['cantidad']; ?>">
                                            <input type="hidden" value="<?php echo $row_usuario['id_carrito']; ?>"
                                                name="id_carrito">
                                        </td>

                                        <td class="w-25 ">
                                            <?php echo "$ " . $row_usuario['precio']; ?>
                                        </td>
                                        <td class="subtotal w-25">
                                            <?php $subt = $row_usuario['cantidad'] * $row_usuario['precio'];
                                                echo "$ " . $subt; ?>
                                            <input type="hidden" value="<?php echo  $tot = $tot + $subt;  ?>">
                                        </td>
                                    </tr>
                                </tbody>

                                <?php } while ($row_usuario = mysqli_fetch_assoc($buscar_usuario)); ?>

                            </table>

                            <div class="contTotal col-12 mt-3 p-3">
                                <h5>Total a pagar: <span
                                        class="total fw-bold text-light bg-success mt-4 w-75 p-2 mx-5"><?php echo "$ " . $tot ?></span>
                                </h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <!--- Formulario datos clientes --->
        <h4 class="modal-title  text-center ">Datos del cliente</h4>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- </?php include('../controladores/crear_empleado_C.php') ?> -->

            <form class="row" action="../controladores/crear_pedido_C.php" method="post">

                <div class="row justify-content-around mt-3 p-2">
                    <input type="text" name="rol" value="<?php echo $rol ?>">
                    <input type="text" name="idUser" value="<?php echo  $idUs ?>">
                    <input type="text" name="total" value="<?php echo  $tot ?>">
                    <div class="col-5">
                        <label for="nombres" class="label">Nombre *</label>
                        <input readonly name="nombre" type="text" value="<?php echo $nombre ?> " class="form-control">
                    </div>

                    <div class="col-5">
                        <label for="apellidos" class="label">Apellido *</label>
                        <input readonly name="apellido" type="text" value="<?php echo $apellido ?>"
                            class="form-control">
                    </div>
                </div>


                <div class="row justify-content-around  mt-3 p-2">

                    <div class="col-5">
                        <label for="correo1s" class="label">Correo *</label>
                        <input readonly type="email" name="correo" class="form-control " value="<?php echo $correo ?>">

                    </div>

                    <div class="col-5">
                        <label for="num-docs" class="label">Num. docuemnto *</label>
                        <input readonly name="numero" type="text" value="<?php echo $cc ?>" class="form-control">
                    </div>

                </div>

                <div class="row justify-content-around  mt-3 p-2">

                    <div class="col-5">
                        <label for="num-tel" class="label">Num. telefono *</label>
                        <input readonly name="tel" type="number" class="form-control" value="<?php echo $tel ?>">
                    </div>

                    <div class="col-5">
                        <label for="num-docs" class="label">Direccion *</label>
                        <input required name="direccion" type="text" class="form-control">
                    </div>

                </div>

                <div class="row justify-content-around  mt-3 p-2">
                    <div class="col-3">
                        <label for="tipo-docs" class="label">Seleccione un Departamento *</label>
                        <select class="tip-doc form-control mb-3" name="dpto" id="deptos">
                            <option value="0">Seleccione</option>

                            <?php

                            while ($row = mysqli_fetch_array($resDpto, MYSQLI_ASSOC)) {
                                echo '<option value="' . $row['id_dpto'] . '">' . $row['nombre_dpto'] . '</option>';
                            }

                            ?>
                        </select>
                    </div>

                    <div class="col-3">
                        <label class='label'>Seleccione una Ciudad *</label>
                        <div id="contCiudad">
                            <!-- Este campo lo llena la funcion cargar_ciudades.js -->
                        </div>
                    </div>
                    <div class="col-3">
                        <label class='label'>Seleccione un Sector *</label>
                        <div id="contSector">
                            <!-- Este campo lo llena la funcion cargar_sectores.js -->
                        </div>
                    </div>
                </div>

                <div class="row justify-content-around  mt-3 mb-5 p-2">


                    <div class="col-5 ">
                        <label for="tipo-rol" class="label">Observaciones *</label>
                        <textarea required class="tipo-rol form-control " name="observaciones"> </textarea>

                    </div>

                </div>


                <div class="row justify-content-center">
                    <div class="col-2">
                        <a type="button" href="../vistas/index-base.php" class="btn btn-warning w-50">Cancelar</a>
                    </div>
                    <div class="col-2">
                        <button type="submit" name="btnEnviarPedido" class="btn btn-success w-75" method="POST">Enviar
                            pedido
                        </button>
                    </div>

                </div>

            </form>


        </div>


        <br>
        <br>
        <br>


        <!---------------- Footer --------------->
        <?php include('footer.php') ?>


        <script src="../js/jquery-3.6.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/cargar_ciudades.js"></script>
        <script type="text/javascript" src="../js/cargar_sectores.js"></script>



</body>

</html>