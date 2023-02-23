<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
/*Determino si hay parametro para ver los pedidos, si no hay parametros, determino el nivel del usuario para saber que  registros puede ver, si solo los propios o todos en caso de ser el administrador*/
$nivel = $_SESSION['nivel'];
$usuario = $_SESSION['id_usuario'];
if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {
    $id_usuario = ($_GET['id_usuario']);
    $b_pedidos = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id_usuario=$id_usuario ORDER BY idPedido DESC");
    $row_pedidos = mysqli_fetch_assoc($b_pedidos);
} else {
    if ($nivel >= 3) {
        $b_pedidos = mysqli_query($conexion, "SELECT * FROM pedidos ORDER BY idPedido DESC");
        $row_pedidos = mysqli_fetch_assoc($b_pedidos);
    } else {
        $b_pedidos = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id_usuario=$usuario");
        $row_pedidos = mysqli_fetch_assoc($b_pedidos);
    }
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
    <link rel="stylesheet" type="text/css" href="../mis_css/menuPpal.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/productos-destacados.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/marcas.css" />
    <link rel="stylesheet" type="text/css" href="../mis_css/footer.css" />

    <link rel="stylesheet" type="text/css" href="mis_css/productos-destacados.css" />

    <title>Frutos del campo</title>
    <script type="text/javascript">
        function confirmar(idPedido, invitado) {
            var confirmacion = confirm('Seguro que desea eliminar este pedido?');
            if (confirmacion) {
                window.location = "eliminar_pedido.php?idPedido=" + idPedido + "&invitado=" + invitado;
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">

            <div class="col-sm-12">
                <h3 style="color: #177c03; text-align: center;">Listado de pedidos recibidos </h3>
                <br>
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover table-sm">
                        <tbody>
                            <tr class="thead-dark">
                                <th scope="col">Id</th>
                                <th scope="col">Vendedor</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Observacion</th>
                                <th scope="col">Total</th>
                                <th scope="col">Porcentaje</th>
                                <th scope="col">Detalles</th>
                                <th scope="col">Abonos</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Abonar</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                            <?php do { ?>
                                <tr>
                                    <td><?php echo $row_pedidos['idPedido'];
                                        $idPedido = $row_pedidos['idPedido'];
                                        $invit = $row_pedidos['invitado'];
                                        $b_carro = mysqli_query($conexion, "SELECT idProducto, cantidad, precio_costo, porcentaje FROM carrito WHERE idPedido=$idPedido");

                                        ?></td>
                                    <td><?php $id_usuario = $row_pedidos['id_usuario'];
                                        $b_usuario = mysqli_query($conexion, "SELECT nombre_usuario FROM usuarios WHERE id_usuario=$id_usuario");
                                        $row_usu = mysqli_fetch_assoc($b_usuario);
                                        echo $row_usu['nombre_usuario'];
                                        mysqli_free_result($b_usuario);
                                        ?></td>
                                    <td><?php $id_cliente = $row_pedidos['idCliente'];
                                        $b_cliente = mysqli_query($conexion, "SELECT nombre FROM clientes WHERE idCliente=$id_cliente");
                                        $row_cliente = mysqli_fetch_assoc($b_cliente);
                                        echo $row_cliente['nombre'];
                                        mysqli_free_result($b_cliente);
                                        ?></td>
                                    <td><?php echo $row_pedidos['fecha']; ?></td>
                                    <td><?php $estado = $row_pedidos['estado'];
                                        if ($estado == 0) {
                                            echo "No despachado";
                                        } else {
                                            echo "Despachado";
                                        } ?></td>
                                    <td><?php echo $row_pedidos['observacion']; ?></td>
                                    <td><?php
                                        $total = 0;
                                        $subtotal = 0;
                                        $porcentaje = 0;
                                        while ($row_carro = mysqli_fetch_assoc($b_carro)) {
                                            $subtotal = ($row_carro['cantidad'] * $row_carro['precio_costo']);
                                            $total += $subtotal;
                                            $porcentaje += $row_carro['porcentaje'];
                                        }
                                        echo number_format($total);
                                        mysqli_free_result($b_carro);
                                        ?></td>
                                    <td><?php echo number_format($porcentaje); ?></td>
                                    <td><a href="detalle_pedido.php?invitado=<?php echo $row_pedidos['invitado']; ?>" class="btn btn-success btn-sm">Detalles</a></td>
                                    <td><?PHP $b_abonos = mysqli_query($conexion, "SELECT SUM(total) AS suma FROM abono_pedidos WHERE idPedido=$idPedido");
                                        $row_abonos = mysqli_fetch_assoc($b_abonos);
                                        echo number_format($row_abonos['suma']);

                                        ?></td>
                                    <td><?php echo number_format($total - $row_abonos['suma']); ?></td>
                                    <td><a href="abono_pedido.php?idPedido=<?php echo $row_pedidos['idPedido']; ?>" class="btn btn-primary btn-sm">Abonar</a></td>
                                    <td><a href="#" onClick="confirmar(<?php echo $row_pedidos['idPedido']; ?>, '<?php echo $invit; ?>')" class="btn btn-sm btn-danger">QUITAR</a></td>
                                </tr>
                            <?php } while ($row_pedidos = mysqli_fetch_assoc($b_pedidos)); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


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