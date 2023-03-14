<?php
session_start();
include '../conexion/conexion.php';
$_SESSION['datosU']['vieneDe'] = 'base';
$usuario = $_SESSION['datosU']['nombre_usuario'];
$nombre = $_SESSION['datosU']['nombre_usuario'];
$apellido = $_SESSION['datosU']['apellido_usuario'];
$correo = $_SESSION['datosU']['email'];
$cc = $_SESSION['datosU']['num_doc'];
$rol = $_SESSION['datosU']['nivel'];
$tel = $_SESSION['datosU']['telefono'];
$idUs = $_SESSION['datosU']['id_usuario'];

$buscar_usuario = mysqli_query($conexion, "SELECT carrito.id_carrito, carrito.id_usuario, carrito.idProducto,carrito.cantidad, productos.precio, productos.nom_producto FROM carrito INNER JOIN productos ON carrito.idProducto = productos.id_producto WHERE id_usuario ='$idUs' AND carrito.estado= 0");
$row_usuario = mysqli_fetch_assoc($buscar_usuario);
$num_row = mysqli_num_rows($buscar_usuario);

$queryDpto = ("SELECT id_dpto, nombre_dpto, estado FROM departamentos WHERE estado =1  ORDER BY nombre_dpto ASC");
$resDpto = mysqli_query($conexion, $queryDpto);

//validamos si el cliente esta registrado
$verCli = mysqli_query($conexion, "SELECT * FROM clientes WHERE cedula = '$cc' AND correo = '$correo'");
$row_cli = mysqli_fetch_assoc($verCli);
$num_rowCli = mysqli_num_rows($verCli);
$verCli->close();

$sql = "SELECT COUNT(*) total FROM pedidos WHERE estado = 0";
$result = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($result);
$pedPendientes = $fila['total'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/realizarPedido.css " />




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






    <!-- Detalles pedido -->
    <h4 class="titDetPed modal-title">Detalles de su pedido</h4>
    <div class="row justify-content-center">
        <div class="col-10">

            <div class="row mt-3">
                <div class="col-12 p-2">

                    <div class="table-responsive">
                        <table class="table  table-hover">
                            <thead>
                                <tr>
                                    <th class="titPro">Producto
                                    </th>
                                    <th class="titPro">Cantidad
                                    </th>
                                    <th class="titPro">Precio Und.
                                    </th>
                                    <th class="titPro">Subtotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bodyTable mt-2 ">
                                <?php
                                do { ?>
                                    <tr class="fw-semibold text-center">

                                        <td class="w-25 ">
                                            <?php echo $row_usuario['nom_producto']; ?>
                                        </td>

                                        <td class="w-0 ">
                                            <?php echo $row_usuario['cantidad']; ?>
                                            <input type="hidden" class="w-50 text-center" name="cantidad" value="<?php echo $row_usuario['cantidad']; ?>">
                                            <input type="hidden" value="<?php echo $row_usuario['id_carrito']; ?>" name="id_carrito">
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
                        <div class="ctTot">
                            <div class="cajaTot">
                                <h5 class="tit5">Total a pagar: <span class="txtotal "><?php echo "$ " . $tot ?></span>
                                </h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- **************************************************************************************************************** -->


    <!--- Formulario datos clientes--->

    <div class="row justify-content-center cliSinReg">
        <h4 class="contar modal-title  text-center ">Datos del cliente</h4>

        <div class="col-10">
            <?php include '../controladores/crear_pedido_C.php' ?>
            <form class="row" method="post">
                <?php
                if ($num_rowCli != 0) {
                    echo '<div class="row justify-content-center "><div class=" align-content-center text-center alert alert-success w-auto h-75">Cliente registrado..!!<br>puede moificar la direccion de entrega</div></div>';
                } else {
                    echo '<div class="row justify-content-center "><div class=" align-content-center text-center alert alert-danger w-auto h-75">Cliente sin registar!!<br> Por favor diligencie el formulario.</div></div>';
                }
                ?>
                <div class="row justify-content-around mt-3 p-2">
                    <input type="hidden" name="rol" value="<?php echo $rol ?>">
                    <input type="hidden" name="idUser" value="<?php echo $idUs ?>">
                    <input type="hidden" name="total" value="<?php echo  $tot ?>">
                    <div class="col-4">
                        <label for="nombres" class="labels">Nombre *</label>
                        <input readonly name="nombre" type="text" value="<?php echo  $nombre ?> " class="form-control">
                    </div>

                    <div class="col-4">
                        <label for="apellidos" class="labels">Apellido *</label>
                        <input readonly name="apellido" type="text" value="<?php echo $apellido  ?>" class="form-control">
                    </div>

                </div>
                <div class="row justify-content-around  mt-3 p-2">

                    <div class="col-4">
                        <label for="correo1s" class="labels">Correo *</label>
                        <input readonly type="email" name="correo" class="form-control " value="<?php echo $correo  ?>">

                    </div>

                    <div class="col-4">
                        <label for="num-docs" class="labels">Num. docuemnto *</label>
                        <input readonly name="numero" type="text" value="<?php echo $cc  ?>" class="form-control">
                    </div>

                </div>

                <div class="row justify-content-around  mt-3 p-2">

                    <div class="col-4">
                        <label for="num-tel" class="labels">Num. telefono *</label>
                        <input readonly name="tel" type="number" class="form-control" value="<?php echo $tel  ?>">
                    </div>

                    <div class="col-4">

                    </div>

                </div>

                <!--********************* Validacion covertura **************************-->
                <div class="contValidCobert  ">
                    <h5 class="contar">Validacion cobertura para domicilios</h5>

                    <div class="contForVali  ">
                        <div class="row justify-content-around  mt-3 p-2">
                            <div class="col-4">
                                <label for="tipo-docs" class="labels">Seleccione un Departamento *</label>
                                <select class="tip-doc form-control mb-3" name="dpto" id="deptos">
                                    <option value="0">Seleccione</option>

                                    <?php

                                    while ($row = mysqli_fetch_array($resDpto, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row['id_dpto'] . '">' . $row['nombre_dpto'] . '</option>';
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label class='labels'>Seleccione una Ciudad *</label>
                                <div id="contCiudad">
                                    <!-- Este campo lo llena la funcion cargar_ciudades.js -->
                                    <p class="advertir">Debes seleccionar el departamento para mostrarte las ciudades
                                    </p>
                                </div>
                            </div>

                        </div>

                        <div class="row justify-content-around  mt-3 mb-5 p-2">
                            <div class="col-4">
                                <label class='labels'>Seleccione un Sector *</label>
                                <div id="contSector">
                                    <!-- Este campo lo llena la funcion cargar_sectores.js -->
                                    <p class="advertir">Debes seleccionar la ciudad para mostrarte los sectores</p>
                                </div>
                            </div>

                            <div class="col-4">

                                <label for="num-docs" class="labels">Direccion *</label>
                                <input required name="direccion" type="text" class="form-control" placeholder="Direccion para el domicilio">

                            </div>

                        </div>
                        <div class="row justify-content-around  mt-3 mb-5 p-2">

                            <div class="col-4 ">
                                <label for="tipo-rol" class="labels">Observaciones *</label>
                                <textarea required class="tipo-rol form-control " name="observaciones"> </textarea>

                            </div>

                        </div>
                        <div class="conInformar">
                            <p class="informar">Si el departamento, la ciudad y el sector suyo no aparecen es
                                porque no hay
                                cobertura para domicilio. </p>
                        </div>
                    </div>
                </div>


                <div class="row ">
                    <div class="row col-6 justify-content-center">
                        <a type="button" href="../vistas/index-base.php" class="btnCancel btn ">Cancelar</a>
                    </div>
                    <div class="row col-6 justify-content-center">
                        <button type="submit" name="btnEnviarPedido" class="btnsePed btn" method="POST">Enviar Pedido
                        </button>
                    </div>

                </div>

            </form>


        </div>
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