<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
$sql = "SELECT COUNT(*) total FROM pedidos WHERE estado = 0";
$result = mysqli_query($conexion, $sql);
    $fila = mysqli_fetch_assoc($result);
    $pedPendientes = $fila['total'];

    $los_usuarios = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nivel = 4");
    $row_usuarios = mysqli_fetch_assoc($los_usuarios);
    
    ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />
    <style>
    .btnCarrito {
        visibility: hidden;
    }
    </style>
    <title>Usuarios | Solcomercial</title>

</head>

<body>
    <?php include '../vistas/menuAdmin.php';?>
    <div class="container-fluid mt-5 mb-5 ">
        <div class="row justify-content-center ">
            <div class="col-sm-12">
                <h4 style="color: #177c03; text-align: center;">Listado de Usuarios </h4>
                <br>
                <div class="table-responsive">
                    <table class="table table-bordered  table-hover ">
                        <tbody>
                            <tr>
                                <th style="background-color: #cecece; font-size: 0.85rem;">ID</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Nombre</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Apellido</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Tipo Doc.</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">N??mero</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Tel??fono</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Correo</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Clave</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Estado</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">F.Registro</th>
                                <th style="background-color: #cecece; font-size: 0.85rem;">Acciones</th>
                            </tr>
                            <?PHP do { ?>
                            <tr>
                                <td>
                                    <?php echo $row_usuarios['id_usuario']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['nombre_usuario']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['apellido_usuario']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['tipo_doc']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['num_doc']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['telefono']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['email']; ?>
                                </td>
                                <td>
                                    <?php echo $row_usuarios['rku']; ?>
                                </td>
                                <td>
                                    <?php $est = $row_usuarios['estado'];
                    echo ($est == 1) ? '<p style="color:green;font-weight:700; ">Activo </p>' : '<p style="color:red; font-weight:700; ">Inactivo </p>' ?>
                                </td>

                                </td>
                                <td>
                                    <?php echo $row_usuarios['fecha_registro']; ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteChildresn<?php echo $row_usuarios['id_usuario']; ?>">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#editChildresn<?php echo $row_usuarios['id_usuario']; ?>">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>
                                </td>
                            </tr>

                            <!--Ventana Modal para Actualizar--->
                            <?php include('mod/ModalEditarUs.php'); ?>

                            <!--Ventana Modal para la Alerta de Eliminar--->
                            <?php include('mod/ModalEliminarUs.php'); ?>

                            <?php } while ($row_usuarios = mysqli_fetch_assoc($los_usuarios)); ?>
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
            url = "mod/BorrarUs.php";
            $.ajax({
                type: "POST",
                url: url,
                data: dataString,
                success: function(data) {
                    window.location.href = "ver-usuario.php";
                    $('#respuesta').html(data);
                }

            });
            return false;

        });


    });
    </script>

</body>

</html>