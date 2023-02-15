<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
/*Capturo el parametro para mostrar solo los clientes de este vendedor, si no hay parametro me guio por el nivel de la sesion */
$nivel = $_SESSION['nivel'];
if ($nivel >= 3) {
    $b_clientes = mysqli_query($conexion, "SELECT * FROM clientes ORDER BY nombre");
    $row_clientes = mysqli_fetch_assoc($b_clientes);
} else {
    echo "<script type='text/javascript'>
	alert('No tiene permiso para visualizar este archivo');
	window.location='index.php';
	</script>";
}
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
    <link rel="stylesheet" type="text/css" href="../mis_css/menuAdmin.css" />
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
                <h3 style="color: #177c03; text-align: center;" >Lista de clientes</h3>
                <br>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover table-sm">
                        <tbody>
                            <tr class="thead-dark">
                                <th scope="col">Id</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Observacion</th>
                                <th scope="col">Compras</th>
                                <th scope="col">Saldo</th>

                                <?php do { ?>
                            <tr align="center" valign="middle">
                                <td><?php echo $row_clientes['idCliente'];
                                    $idCliente = $row_clientes['idCliente']; ?></td>
                                <td><?php echo $row_clientes['correo']; ?></td>
                                <td><?php echo $row_clientes['cedula']; ?></td>
                                <td><?php echo $row_clientes['nombre']; ?></td>
                                <td><?php echo $row_clientes['telefono']; ?></td>
                                <td><?php echo $row_clientes['observacion']; ?></td>
                                <td><?php $total = 0;
                                    $b_compras = mysqli_query($conexion, "SELECT cantidad, precio_costo FROM carrito WHERE idCliente=$idCliente");
                                    while ($row_compras = mysqli_fetch_assoc($b_compras)) {
                                        $total += ($row_compras['cantidad'] * $row_compras['precio_costo']);
                                    }
                                    echo number_format($total);
                                    mysqli_free_result($b_compras);
                                    $total_abonos = 0;
                                    $b_abonos = mysqli_query($conexion, "SELECT SUM(total) AS total FROM abono_pedidos WHERE idCliente=$idCliente");
                                    $row_abonos = mysqli_fetch_assoc($b_abonos);
                                    $saldo = $total - $row_abonos['total'];
                                    $color = '';
                                    if ($saldo > 0) {
                                        $color = 'rojo';
                                    }
                                    ?></td>
                                <td class="<?php echo $color; ?>"><?php
                                                                    echo number_format($saldo);
                                                                    //mysqli_free_result($b_abonos);
                                                                    ?></td>

                            </tr>
                        <?php } while ($row_clientes = mysqli_fetch_assoc($b_clientes)); ?>
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

    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>