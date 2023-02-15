<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
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
    <script type="text/javascript">
        function actualizar(idPedido, contador, invitado, cedula) {
            var xmlhttp;

            if (idPedido == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObjet("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //subtotal=cantidad*costo;
                    //subtotal=new Intl.NumberFormat().format(subtotal);
                    //document.getElementById("total").innerHTML=xmlhttp.responseText;
                    document.getElementById("despacho" + contador).innerHTML = "Despachado";

                }
            }


            xmlhttp.open("GET", "actualizar_despacho.php?idPedido=" + idPedido + "&contador=" + contador + "&invitado=" + invitado + "&cedula=" + cedula, true);
            xmlhttp.send();


        }
    </script>
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
    <?php
    $estado = 0;
    $mensaje = 'Listado de pedidos nuevos';
    $b_pedidos = mysqli_query($conexion, "SELECT idPedido, id_usuario, idCliente, invitado, fecha, estado, observacion FROM pedidos WHERE estado=0 ORDER BY idPedido DESC");
    $row_pedidos = mysqli_fetch_assoc($b_pedidos);
    if (@$row_pedidos['idPedido'] == '') {
        $mensaje = 'No hay pedidos nuevos';
    }
    ?>

    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">
            <div class="col-md-12">
                <div id="txtHint"></div>
                <h3 style="color: #177c03; text-align: center;"><?php echo $mensaje; ?></h3>
                <div class="table-responsive">
                    <form name="pedidos" method="get">
                        <table border="1" class="table table-bordered table-sm">
                            <tbody>
                                <tr class="thead-dark">
                                    <th scope="col">CEDULA</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">TELEFONO</th>
                                    <th scope="col">FECHA</th>
                                    <th scope="col">OBSERVACION</th>
                                    <th scope="col">DETALLES</th>
                                    <th scope="col">DESPACHADO</th>
                                    <th scope="col">ELIMINAR</th>
                                </tr>
                                <?PHP $contador = 1;
                                do { ?>
                                    <tr align="center" valign="middle" <?php $cajon = '';
                                                                        $leido = '';
                                                                        if ($row_pedidos['estado'] == 1) {
                                                                            $cajon = 'nover';
                                                                        }
                                                                        if ($row_pedidos['estado'] == 0) {
                                                                            $leido = 'noleido';
                                                                        } ?> class="<?php echo $leido; ?>">

                                        <td><?php /*echo $row_pedidos['idCliente'];*/ $idCliente = $row_pedidos['idCliente'];
                                            $buscar_cliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE idCliente=$idCliente");
                                            $row_cliente = mysqli_fetch_assoc($buscar_cliente);
                                            $cedula = $row_cliente['cedula'];
                                            $nombre = $row_cliente['nombre'];
                                            echo $cedula;
                                            ?></td>

                                        <td><?php $buscar_cliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE idCliente=$idCliente");
                                            $row_cliente = mysqli_fetch_assoc($buscar_cliente);
                                            $cedula = $row_cliente['cedula'];
                                            $nombre = $row_cliente['nombre'];
                                            echo $nombre;
                                            //mysqli_free_result($buscar_cliente);
                                            ?></td>

                                        <td><?php echo $row_cliente['telefono'];  ?></td>
                                        <td><?php echo $row_pedidos['fecha']; ?></td>
                                        <td><?php echo $row_pedidos['observacion'];
                                            $inv = $row_pedidos['invitado'];
                                            $invit = $row_pedidos['invitado'] ?></td>
                                        <td><a href="detalle_pedido.php?invitado=<?php echo $row_pedidos['invitado']; ?>" class="btn btn-sm " style=" color:white; background-color:#177c03;">Ver detalles</a></td>
                                        <td id="despacho<?php echo $contador; ?>"><input type="checkbox" class="form-control <?php echo $cajon; ?> <?php echo $leido; ?>" name="despacho<?php echo $contador; ?>" onClick="actualizar(<?php echo $row_pedidos['idPedido']; ?>, <?php echo $contador; ?>, '<?php echo $inv; ?>', '<?php echo $cedula; ?>')"></td>
                                        <td id="despacho<?php echo $contador; ?>"><a href="#" onClick="confirmar(<?php echo $row_pedidos['idPedido']; ?>, '<?php echo $invit; ?>')" class="btn btn-sm btn-danger">QUITAR</a></td>
                                    </tr>
                                <?php $contador++;
                                } while ($row_pedidos = mysqli_fetch_assoc($b_pedidos));
                                ?>
                            </tbody>
                        </table>
                    </form>
                    <div class="row">
                        <div class="col-md-12 mt-3 mb-3" align="center">
                            <a href="imp_pedidos.php" class="btn" style="background-color:#ffbb00;" target="_blank">Imprimir</a>
                        </div>
                    </div>

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