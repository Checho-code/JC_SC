<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
include '../controladores/crear_sector_C.php';
$queryDpto = ("SELECT id_dpto, nombre_dpto, estado FROM departamentos ORDER BY nombre_dpto ASC");
$resDpto = mysqli_query($conexion, $queryDpto);
$cantDpto = mysqli_num_rows($resDpto);

$Dpto = ("SELECT * FROM departamentos ORDER BY id_dpto ASC");
$rDpto = mysqli_query($conexion, $Dpto);
$dataD = mysqli_fetch_assoc($rDpto);

$queryCity = ("SELECT * FROM ciudades");
$resCity = mysqli_query($conexion, $queryCity);
$cantCity = mysqli_num_rows($resCity);
$dataCity = mysqli_fetch_assoc($resCity);

$querySect = ("SELECT * FROM sectores");
$resSect = mysqli_query($conexion, $querySect);
$cantSect = mysqli_num_rows($resSect);

// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Sectores | Solcomercial</title>
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



</head>

<body>

    <div class="container mt-5 ">

        <h4 style="color: #177c03; text-align: center; margin-bottom: 30px; ">
            Formulario de manejo de sectores
        </h4>

        <div class="row text-center" style="background-color: #cecece">
            <div class="col-12">
                <strong>Registrar Nuevo Sector</strong>
            </div>

        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="row clearfix">

                        <div class="col-12">
                            <!--- Formulario para registrar Marca --->
                            <form method="post" action="#">

                                <div class="form-group mt-4 mb-2 p-3"
                                    style=" background-color:#f6f6f6; border-radius: 20px; ">
                                    <h5 class="text-center mb-3" style="color:#177c03">Departamento</h5>
                                    <label for="tipo-docs" class="mb-1">Seleccione un Departamento</label>
                                    <select class="tip-doc form-control mb-3" name="dpto" id="deptos">
                                        <option value="0">Seleccione</option>

                                        <?php

                                        while ($row = mysqli_fetch_array($resDpto, MYSQLI_ASSOC)) {
                                            echo '<option value="' . $row['id_dpto'] . '">' . $row['nombre_dpto'] . '</option>';
                                        }

                                        ?>
                                    </select>
                                    <label for="tipo-docs" class="mb-1">Seleccione su estado </label>
                                    <select class="tip-doc form-control" name="estadoDepto">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>

                                <div class="form-group mt-4 mb-2 p-3"
                                    style=" background-color:#f6f6f6; border-radius: 20px; ">

                                    <h5 class="text-center mb-3" style="color:#177c03">Ciudad</h5>
                                    <div class="" id="cont-ciudad">
                                        <!-- Este campo lo llena la funcion cargar_ciudades.js -->
                                    </div>

                                    <div class="mt-3 ">
                                        <label for="tipo-docs" class="mb-1">Seleccione su estado </label>
                                        <select class="tip-doc form-control" name="estadoCiudad">
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-4 mb-5 p-3"
                                    style=" background-color:#f6f6f6; border-radius: 20px; ">
                                    <h5 class="text-center mb-3" style="color:#177c03">Sector</h5>
                                    <label for="tipo-docs" class="mb-1">Nombre sector</label>
                                    <input class="tip-doc form-control mb-3" name="sector">

                                    <label for="tipo-docs" class="mb-1">Seleccione su estado </label>
                                    <select class="tip-doc form-control" name="estadoSector">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <input type="submit" name="btnGuardar" value="Guardar" class="btn"
                                        style="background-color: #177c03; color:#ffffff">
                                    <a href="index-base.php"><input type="button" value="Cancelar"
                                            class="btn btn-warning"></a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- **************************** TABLA DE SECTORES ********************************* -->
        <hr class="my-5">
        <div class="row text-center" style="background-color: #cecece">

            <div class="col-12">
                <strong>Lista de Sectores <span style="color: crimson"> (<?php echo $cantSect ?>)</span> </strong>
            </div>
        </div>
        <div class="col-12">
            <div class="row mt-3">
                <div class="col-12 p-2">


                    <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Id Sect
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Nom.
                                        Sector
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Est.
                                        Sector</th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                do { ?>
                                <tr>
                                    <td>
                                        <?php echo $dataSector['id_sector']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataSector['nom_sector']; ?>
                                    </td>
                                    <td>
                                        <?php $est = $dataSector['estado'];
                                            echo ($est === '1') ? '<p style="color:green;font-weight:700; ">Activo</p>' : '<p style="color:red; font-weight:700; ">Inactivo</p>' ?>
                                    </td>



                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteChildresn<?php echo $dataSector['id_sector']; ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editChildresn<?php echo $dataSector['id_sector']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <!-- </?php include('mod/ModalEditarProdts.php'); ?> -->

                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <!-- </?php include('mod/ModalEliminarProdts.php'); ?> -->


                            <?php } while ($dataSector = mysqli_fetch_assoc($b_sector)); ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- **************************** TABLA DE DEPTOS ********************************* -->
        <hr class="my-5">
        <div class="row text-center" style="background-color: #cecece">

            <div class="col-12">
                <strong>Lista de Deptos <span style="color: crimson"> ( <?php echo $cantDpto ?>)</span> </strong>
            </div>
        </div>
        <div class="col-12">
            <div class="row mt-3">
                <div class="col-12 p-2">


                    <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Id Depto
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Nom.
                                        Depto
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Est.
                                        Depto</th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                do { ?>
                                <tr>

                                    <td>
                                        <?php echo $dataD['id_dpto']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataD['nombre_dpto']; ?>
                                    </td>
                                    <td>
                                        <?php $estD = $dataD['estado'];
                                            echo ($estD === '1') ? '<p style="color:green;font-weight:700; ">Activo</p>' : '<p style="color:red; font-weight:700; ">Inactivo</p>' ?>
                                    </td>


                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteChildresn<?php echo $dataD['id_dpto']; ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editChildresn<?php echo $dataD['id_dpto']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <!-- </?php include('mod/ModalEditarProdts.php'); ?> -->

                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <!-- </?php include('mod/ModalEliminarProdts.php'); ?> -->


                            <?php } while ($dataD = mysqli_fetch_assoc($rDpto)); ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- **************************** TABLA DE CIUDADES ********************************* -->
        <hr class="my-5">
        <div class="row text-center" style="background-color: #cecece">

            <div class="col-12">
                <strong>Lista de Ciudades <span style="color: crimson"> (<?php echo $cantCity ?> )</span> </strong>
            </div>
        </div>
        <div class="col-12">
            <div class="row mt-3">
                <div class="col-12 p-2">


                    <div class="table-responsive">
                        <table class="table table-bordered  table-hover">
                            <thead>
                                <tr>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Id Ciudad
                                    </th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Nom.
                                        Ciudad
                                    </th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Est.
                                        Ciudad</th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                do { ?>
                                <tr>

                                    <td>
                                        <?php echo $dataCity['id_ciudad']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dataCity['nombre_ciudad']; ?>
                                    </td>
                                    <td>
                                        <?php $est = $dataCity['estado'];
                                            echo ($est === '1') ? '<p style="color:green;font-weight:700; ">Activo</p>' : '<p style="color:red; font-weight:700; ">Inactivo</p>' ?>
                                    </td>

                                    <td>
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#deleteChildresn<?php echo $dataCity['id_ciudad']; ?>">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>

                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#editChildresn<?php echo $dataCity['id_ciudad']; ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <!-- </?php include('mod/ModalEditarProdts.php'); ?> -->

                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <!-- </?php include('mod/ModalEliminarProdts.php'); ?> -->


                            <?php } while ($dataCity = mysqli_fetch_assoc($resCity)); ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <br>
    <br>
    <br>
    <br>
    <!---------------- Footer --------------->
    <?php include('../vistas/footer.php') ?>

    <script src="../js/jquery-3.6.3.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/cargar_ciudades.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {

        $('.btnBorrar').click(function(e) {
            e.preventDefault();
            var id = $(this).attr("id");

            var dataString = 'id=' + id;
            // alert (id + '--' +dataString);
            url = "mod/BorrarM.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "marcas_V.php";
                    $('#respuesta').html(data);
                }

            });
            return false;

        });


    });
    </script>

</body>

</html>