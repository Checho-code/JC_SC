<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
//Juego de registros para las solicitudes de remision
//Busco los pedidos que hay nuevos
$ped = '';
$buscar_nuevoss = mysqli_query($conexion, "SELECT * FROM redenciones JOIN usuarios ON redenciones.id_usuario=usuarios.id_usuario JOIN premios ON redenciones.id_producto=premios.id_premio WHERE redenciones.estado=1 ORDER BY redenciones.id_redencion DESC");
$row_redencioness = mysqli_fetch_array($buscar_nuevoss);
//$ped=mysqli_num_rows($buscar_nuevos);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <div class="row">

            <div class="col-sm-12">
                <h2 style="color: #177c03; text-align: center;">Premios entregados</h2>
                <br>
                <br>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Producto</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Observacion</th>
                                <th>Despachar</th>

                            </tr>
                            <?php do { ?>
                                <tr>
                                    <td><?php echo $row_redencioness['id_redencion']; ?></td>
                                    <td><?php echo $row_redencioness['nombre_usuario']; ?></td>
                                    <td><?php echo $row_redencioness['nombre_premio']; ?></td>
                                    <td><?php echo $row_redencioness['fecha']; ?></td>
                                    <td><?php echo $row_redencioness['hora']; ?></td>
                                    <td><?php echo number_format($row_redencioness['total']); ?></td>
                                    <td><?php echo $row_redencioness[6]; ?></td>
                                    <td><?php echo $row_redencioness['observacion']; ?></td>
                                    <td><a href="editar_redencion.php?id_redencion=<?php echo $row_redencioness['id_redencion']; ?>" class="btn btn-success btn-sm">Editar</a></td>

                                </tr>
                            <?php } while ($row_redencioness = mysqli_fetch_array($buscar_nuevoss)); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>