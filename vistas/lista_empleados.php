<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
include('mod/ModificarE.php');
// error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/logo-mywebsite-urian-viera.svg" />
    <title>Empleados | Solcomercial</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
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
    <link rel="stylesheet" href="../mis_css/registroEmpl.css">
    <style>
    .btnCarrito {
        visibility: hidden;
    }
    </style>
</head>

<body>

    <div class="container mt-5  ">
        <h4 style="color: #177c03; text-align: center;" class="mb-5">
            Listado Empleados Solcomercial
        </h4>
        <a type="button" href="empleados_V.php" class="btn btn-success">Registrar Empleado</a>
    </div>
    <!-------------- Tabla de registros --------------->
    <?php

    $sqlEmpleado = ("SELECT * FROM usuarios WHERE nivel != 4 ORDER BY id_usuario ");
    $queryEmpleado = mysqli_query($conexion, $sqlEmpleado);
    $cantidad = mysqli_num_rows($queryEmpleado);
    $dataEmp = mysqli_fetch_assoc($queryEmpleado);
    ?>

    <div class="container mt-5  ">

        <div class="row text-center mt-5 mb-4" style="background-color: #cecece">
            <div class="col-md-12">
                <strong>Numero de Empleados <span style="color: crimson"> (
                        <?php echo $cantidad; ?> )
                    </span> </strong>
            </div>
        </div>

        <div class="col-md-12 p-2">


            <div class="col-10">
                <table class="table table-bordered  table-hover">
                    <thead>
                        <tr>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Id</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Nombre</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Apellido</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Tip.Doc</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Num.Doc</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Tel</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">E-mail</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Rol</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Estado</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Fech.Reg</th>
                            <th style="font-size: 0.85em;  background-color:#cecece;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        do { ?>
                        <tr>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['id_usuario']; ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['nombre_usuario']; ?>
                            </td style="font-size: 0.85em;">
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['apellido_usuario']; ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['tipo_doc']; ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['num_doc']; ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['telefono']; ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['email']; ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php $niv = $dataEmp['nivel'];
                                    switch ($niv) {
                                        case 1:
                                            echo '<p>Repartidor</p>';
                                            break;
                                        case 2:
                                            echo '<p>Vendedor</p>';
                                            break;
                                        case 3:
                                            echo '<p>Admin</p>';
                                            break;
                                        default:
                                            echo '<p>Sin definir</p>';
                                            break;
                                    }
                                    ?>
                            </td>

                            <td style="font-size: 0.85em;">
                                <?php $est = $dataEmp['estado'];
                                    echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?>
                            </td>
                            <td style="font-size: 0.85em;">
                                <?php echo $dataEmp['fecha_registro']; ?>
                            </td>

                            <td style="font-size: 0.85em; text-align:center; ">
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteChildresn<?php echo $dataEmp['id_usuario']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                                <br>
                                <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#editChildresn<?php echo $dataEmp['id_usuario']; ?>">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>


                    <!--Ventana Modal para Actualizar--->
                    <?php include('mod/ModalEditarE.php'); ?>

                    <!--Ventana Modal para la Alerta de Eliminar--->
                    <?php include('mod/ModalEliminarE.php'); ?>


                    <?php } while ($dataEmp = mysqli_fetch_assoc($queryEmpleado)); ?>

                </table>
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

    <script type="text/javascript">
    $(document).ready(function() {

        $('.btnBorrar').click(function(e) {
            e.preventDefault();
            var id = $(this).attr("id");

            var dataString = 'id=' + id;
            // alert (id + '--' +dataString);
            url = "mod/BorrarE.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "lista_empleados.php";
                    $('#respuesta').html(data);
                }

            });
            return false;

        });


    });
    </script>

</body>

</html>