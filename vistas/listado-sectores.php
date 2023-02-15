<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';

//Juego de registros para buscar los sectores registrados
$b_sectores = mysqli_query($conexion, "SELECT id_sector, nombre_sector, observacion FROM sectores ORDER BY nombre_sector");
$row_sectores = mysqli_fetch_assoc($b_sectores);
if ($row_sectores['id_sector'] != '') {
    $ver = '';
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
            <h3 style="color: #177c03; text-align: center;">Listado de sectores</h3>
            <br>
                    <br>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover table-sm">
                    <tbody>
                        <tr align="center" valign="middle" class="thead-dark">
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Observacion</th>
                            <th scope="col">Pedidos</th>
                            <th scope="col">Ventas</th>
                        </tr>
                        <?php do { ?>
                            <tr align="center" valign="middle">
                                <td><?PHP echo $row_sectores['id_sector'];
                                    $id_sector = $row_sectores['id_sector']; ?></td>
                                <td><?PHP echo $row_sectores['nombre_sector'];
                                    $nombre_sector = $row_sectores['nombre_sector']; ?></td>
                                <td><?PHP echo $row_sectores['observacion'];
                                    $observacion = $row_sectores['observacion']; ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php } while ($row_sectores = mysqli_fetch_assoc($b_sectores)); ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <br>
                    <br><br>
                    <br>
    <div class="row">
        <div class="col-md-12">
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar sector</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form name="editar_sector" method="post">
                                <div class="form-group">
                                    <label for="nombre_sector2">Nombre del sector *</label>
                                    <input type=text name="nombre_sector2" class="form-control" required placeholder="Ingrese el nombre del sector" autocomplete="off">
                                </div>
                                <div id="sector" class="rojo"></div>
                                <div class="form-group">
                                    <label for="observacion2">Observacion </label>
                                    <textarea name="observacion2" class="form-control" placeholder="Escriba cualquier observacion respecto al nuevo sector"></textarea>
                                    <input type="hidden" name="id_sector2" />
                                </div>
                                <div class="form-group">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>-->
                    </div>
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