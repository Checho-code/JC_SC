<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
$queryDpto = ("SELECT id_dpto, nombre_dpto, estado FROM departamentos ORDER BY nombre_dpto ASC");
$resDpto = mysqli_query($conexion, $queryDpto);
$cantDpto = mysqli_num_rows($resDpto);

$queryCity = ("SELECT * FROM ciudades");
$resCity = mysqli_query($conexion, $queryCity);
$cantCity = mysqli_num_rows($resCity);


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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
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
        <?php include '../controladores/crear_sector_C.php'; ?>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="row clearfix">

                        <div class="col-12">
                            <!--- Formulario para registrar Marca --->
                            <form method="post">

                                <div class="form-group mt-4 mb-2 p-3" style=" background-color:#f6f6f6; border-radius: 20px; ">
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

                                </div>

                                <div class="form-group mt-4 mb-2 p-3" style=" background-color:#f6f6f6; border-radius: 20px; ">

                                    <h5 class="text-center mb-3" style="color:#177c03">Ciudad</h5>
                                    <div class="" id="cont-ciudad">
                                        <!-- Este campo lo llena la funcion cargar_ciudades.js -->
                                    </div>

                                </div>

                                <div class="form-group mt-4 mb-5 p-3" style=" background-color:#f6f6f6; border-radius: 20px; ">
                                    <h5 class="text-center mb-3" style="color:#177c03">Sector</h5>
                                    <label for="tipo-docs" class="mb-1">Nombre sector</label>
                                    <input class="tip-doc form-control mb-3" name="sector">

                                </div>

                                <div class="form-group mt-5 mb-5">
                                    <input type="submit" name="btnGuardar" value="Guardar" class="btn" style="background-color: #177c03; color:#ffffff">
                                    <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
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
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Id Sector
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Nombre
                                        Sector
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Estado
                                        Sector</th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                if ($cantSect == 0) {
                                    echo '<h6 class="text-light text-center bg-danger"> No hay sectores registrados</h6>';
                                } else {

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
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteSector<?php echo $dataSector['id_sector']; ?>">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>

                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editChildresn<?php echo $dataSector['id_sector']; ?>">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </td>
                                        </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <?php include('mod/ModalEditarSect.php'); ?>

                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('mod/ModalEliminarSect.php'); ?>


                    <?php } while ($dataSector = mysqli_fetch_assoc($b_sector));
                                } ?>



                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- **************************** TABLA DE DEPTOS ********************************* -->
        <hr class="my-5">
        <div class="row text-center" style="background-color: #cecece">

            <div class="col-12">
                <strong>Lista de Departamentos <span style="color: crimson"> ( <?php echo $cantDpto ?>)</span> </strong>
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
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Nombre
                                        Depto
                                    </th>
                                    <th style="background-color: #cecece; font-size: 0.85rem;">Estado
                                        Depto</th>

                                    <th style="background-color: #cecece; font-size: 0.85rem;">Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                $sql = ("SELECT * FROM departamentos ");
                                $dptos = mysqli_query($conexion, $sql);
                                $row_dpto = mysqli_fetch_assoc($dptos);
                                do { ?>
                                    <tr>

                                        <td>
                                            <?php echo $row_dpto['id_dpto']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row_dpto['nombre_dpto']; ?>
                                        </td>
                                        <td>
                                            <?php $estD = $row_dpto['estado'];
                                            echo ($estD === '1') ? '<p style="color:green;font-weight:700; ">Activo</p>' : '<p style="color:red; font-weight:700; ">Inactivo</p>' ?>
                                        </td>


                                        <td>


                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editDpto<?php echo $row_dpto['id_dpto']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </td>
                                    </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <?php include('mod/ModalEditarDpto.php'); ?>




                        <?php } while ($row_dpto = mysqli_fetch_assoc($dptos));

                        ?>





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

                                $sql = ("SELECT * FROM ciudades ");
                                $citys = mysqli_query($conexion, $sql);
                                $row_citys = mysqli_fetch_assoc($citys);

                                do { ?>
                                    <tr>

                                        <td>
                                            <?php echo $row_citys['id_ciudad']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row_citys['nombre_ciudad']; ?>
                                        </td>
                                        <td>
                                            <?php $est = $row_citys['estado'];
                                            echo ($est === '1') ? '<p style="color:green;font-weight:700; ">Activo</p>' : '<p style="color:red; font-weight:700; ">Inactivo</p>' ?>
                                        </td>

                                        <td>


                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editCity<?php echo $row_citys['id_ciudad']; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </td>
                                    </tr>
                            </tbody>


                            <!--Ventana Modal para Actualizar--->
                            <?php include('mod/ModalEditarCity.php'); ?>

                        <?php } while ($row_citys = mysqli_fetch_assoc($citys)); ?>





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


    <!-- Borra para modal Sectores -->
    <script type="text/javascript">
        $(document).ready(function() {

            $('.btnBorrarS').click(function(e) {
                e.preventDefault();
                var id = $(this).attr("id");

                var dataString = 'id=' + id;
                // alert (id + '--' +dataString);
                url = "mod/BorrarSect.php";
                $.ajax({
                    type: "POST",
                    url: url,
                    data: dataString,
                    success: function(data) {
                        alert("Sector eliminado con exito...!");
                        window.location.href = "sectores_V.php";
                        $('#respuesta').html(data);


                    }

                });
                return false;

            });


        });
    </script>



</body>

</html>