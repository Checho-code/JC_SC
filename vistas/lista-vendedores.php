<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
$nivel = $_SESSION['datosU']['nivel'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/754bcf2a5e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="../css/css_bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Empleados | Frutos del campo</title>

</head>

<body>
    <!-- Tabla buscar -->
    <div class="container mt-5">

        <form action="lista-vendedores.php" method="POST" id="formBuscar">
            <div class="col-11">

                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr class="filter">
                            <th>
                                <div class="container text-center">
                                    <div class="row align-items-start">
                                        <div class="col">

                                            <h6>Buscar por Nombre</h6>
                                            <input type="text" name="buscaNombre" id="buscaNombre"
                                                style="border-radius: 10px;">

                                        </div>
                                    </div>
                                </div>
                            </th>

                            <th>
                                <div class="container text-center">
                                    <div class="row align-items-start">
                                        <div class="col">

                                            <h6>Buscar por Rol</h6>
                                            <select name="buscaRol" id="buscaRol" style="border-radius: 10px;">
                                                <option></option>
                                                <option value="1">Repartidor</option>
                                                <option value="2">Vendedor</option>
                                                <option value="3">Admin</option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </th>

                            <th>
                                <div class="container text-center">
                                    <div class="row align-items-start">
                                        <div class="col">
                                            <input type="submit" class="btn btn-info" value="Buscar"
                                                style="margin-bottom: 5px;">
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
    </div>

    <?php

    if (empty($_POST['buscaNombre']) && empty($_POST['buscaRol'])) {
        $sql = ("SELECT * FROM usuarios WHERE nivel != 4");
        $los_usuarios = mysqli_query($conexion, $sql);
        $row_usuarios = mysqli_fetch_assoc($los_usuarios);
    } elseif (!empty($_POST['buscaNombre']) && empty($_POST['buscaRol'])) {
        $nom = $_POST['buscaNombre'];
        $sql = ("SELECT * FROM usuarios WHERE nombre_usuario = '$nom'");
        $los_usuarios = mysqli_query($conexion, $sql);
        $row_usuarios = mysqli_fetch_assoc($los_usuarios);

    } elseif (empty($_POST['buscaNombre']) && !empty($_POST['buscaRol'])) {
        $rol = $_POST['buscaRol'];
        echo "este es el nivel  $rol";

        $sql = ("SELECT * FROM usuarios WHERE nivel = '$rol'");
        $los_usuarios = mysqli_query($conexion, $sql);
        $row_usuarios = mysqli_fetch_assoc($los_usuarios);
    } else {
        $nom = $_POST['buscaNombre'];
        $rol = $_POST['buscaRol'];


        $sql = ("SELECT * FROM usuarios WHERE nombre_usuario = '$nom' AND nivel = '$rol'");
        $los_usuarios = mysqli_query($conexion, $sql);
        $row_usuarios = mysqli_fetch_assoc($los_usuarios);

    }



    ?>



    <!-- Tabla resultados -->


    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">


            <div class="col-sm-12">
                <h3 style="color: #177c03; text-align: center;">Listado de Empleados </h3><br>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover table-sm">

                        <tbody>
                            <tr align="center" valign="middle" class="thead-dark">
                                <th scope="col">ID</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Pedidos</th>
                                <th scope="col">Recaudos</th>
                                <th scope="col">Pagado</th>
                                <th scope="col">Saldo recaudos</th>
                                <th scope="col">Fecha registro</th>
                                <th scope="col">Pagar comisiones</th>
                                <th scope="col">Recibir</th>
                            </tr>
                            <?PHP
                            if($row_usuarios>0){
                            do { ?>
                                <tr align="center" valign="middle">
                                    <td>
                                        <?php echo $row_usuarios['id_usuario'];
                                        $id_usu = $row_usuarios['id_usuario']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_usuarios['num_doc']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row_usuarios['nombre_usuario']; ?>
                                    </td>
                                    <td><a href="ver_pedidos.php?id_usuario=<?php echo $row_usuarios['id_usuario']; ?>"
                                            class="btn btn-warning btn-sm">Pedidos</a></td>

                                    <td>
                                        <?php $total_recaudos = 0;
                                        $abonos_recaudos = 0;
                                        $saldo_recaudos = 0;
                                        $pagos = 0;
                                        $saldo_rec = 0;
                                        $b_recaudos = mysqli_query($conexion, "SELECT * FROM recaudos WHERE id_usuario=$id_usu");
                                        while ($row_recaudos = mysqli_fetch_assoc($b_recaudos)) {
                                            $total_recaudos += $row_recaudos['total_recaudo'];
                                            $abonos_recaudos += $row_recaudos['abono_recaudo'];
                                            $pagos += $row_recaudos['abono_recaudo'];
                                        }
                                        echo number_format($total_recaudos);
                                        ?>
                                    </td>
                                    <td><a href="ver_recaudos.php?id_usuario=<?php echo $row_usuarios['id_usuario']; ?>"><dfn
                                                title="Click para ver todos los recaudos del usuario">
                                                <?php echo number_format($pagos); ?>
                                            </dfn></a></td>
                                    <td>
                                        <?php $saldo_rec = $total_recaudos - $pagos;
                                        echo number_format($saldo_rec); ?>
                                    </td>
                                    <td>
                                        <?php echo $row_usuarios['fecha_registro']; ?>
                                    </td>
                                    <td><a href="pagar_comision.php?id_usuario=<?php echo $row_usuarios['id_usuario']; ?>"
                                            class="btn btn-success btn-sm">Pagar comision</a></td>
                                    <td><a href="recaudar.php?id_usuario=<?php echo $row_usuarios['id_usuario']; ?>"
                                            class="btn btn-sm btn-info">Recibir recaudo</a></td>
                                </tr>
                            <?php } while ($row_usuarios = mysqli_fetch_assoc($los_usuarios));
                            }else{
                                ?>
                                <script>
                                    Swal.fire({
                                        title: 'Ooopss...!',
                                        text: "Lo sentimos, ese empleado no existe, vuelve a intentarlo.!",
                                        icon: 'error',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'Continuar'
                                    })
                                </script>
                        <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                <a href="index-base.php"><input type="button" value="Salir" class="btn"
                        style=" color:white; background-color:red;"></a>

            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>