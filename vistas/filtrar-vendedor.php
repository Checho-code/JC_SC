<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
//Busqueda de los registros segun fecha
if (isset($_POST['desde'])) {
    $desde = ($_POST['desde']);
    $hasta = ($_POST['hasta']);
    $los_usuarios = mysqli_query($conexion, "SELECT * FROM usuarios WHERE fecha_registro>='$desde' AND fecha_registro<='$hasta'");
    $row_usuarios = mysqli_fetch_assoc($los_usuarios);
}


$usuario = $_SESSION['id_usuario'];
/*if($nivel>=3){
	$los_usuarios=mysqli_query($conexion, "SELECT * FROM usuarios");
$row_usuarios=mysqli_fetch_assoc($los_usuarios);
}
else{
	$los_usuarios=mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuario=$usuario");
$row_usuarios=mysqli_fetch_assoc($los_usuarios);
}*/


/*$ver='nover';
if($row_usuarios['id_usuario'] !=''){
	$ver='';
}*/
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
        function validar_pass() {
            var clave = document.registrar.clave.value;
            var clave2 = document.registrar.clave2.value;
            if (clave != clave2) {
                alert('Las contraseñas no coinciden');
                document.registrar.clave.value = '';
                document.registrar.clave2.value = '';
                return false;
            }
        }

        function nivelar() {
            var id_municipio = document.registrar.id_municipio.value;
            var nivel = document.registrar.nivel.value;
            if (nivel > 1 && id_municipio != 0) {
                alert('Para un socio el municipio debe ser 0');
                document.registrar.id_municipio.value = 0;
            }
            if (nivel == 1 && id_municipio == 0) {
                alert('Debe elegir un municipio para el administradpr de sede');
                document.registrar.id_municipio.value = '';
            }

        }

        function confirmacion(id_usuario) {
            var confirmar = confirm('Seguro que desea eliminar este usuario?. Esta accion no se puede deshacer');
            if (confirmar) {
                window.location = 'eliminar_usuario.php?id_usuario=' + id_usuario;
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">
        <div class="row">
            <div class="col-md-12">
                <h5 style="color: #177c03; text-align: center;">Buscar por fecha</h5>
                <br>

                <form name="filtrar" method="POST">
                    <div class="table-responsive <?php echo $ver; ?>">
                        <table class="table table-bordered table-striped table-hover table-sm">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group"><label for="desde">Ingrese la fecha inicial *</label>
                                            <input type="date" class="form-control" required name="desde" />
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group"><label for="hasta">Ingrese la fecha final *</label>
                                            <input type="date" class="form-control" required name="hasta" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group" style="margin-top: 35px;">
                                            <input type="submit" value="Buscar" class="btn btn-primary btn-sm" />
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>

        <div class="row">


            <div class="col-sm-12">
                <h3 style="color: #177c03; text-align: center;">Listado de Vendedores </h3>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm <?php echo $ver; ?>">
                        <tbody>
                            <tr align="center" valign="middle" class="thead-dark">
                                <th scope="col">ID</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Pedidos</th>
                                <th scope="col">Puntos</th>
                                <th scope="col"><dfn title="Pagos realizados de las comisiones">Puntos pagados</dfn></th>
                                <th scope="col">Puntos disponibles</th>
                                <th scope="col">Recaudos</th>
                                <th scope="col">Pagado</th>
                                <th scope="col">Saldo recaudos</th>
                                <th scope="col">Fecha registro</th>
                                <th scope="col">Pagar comisiones</th>
                                <th scope="col">Recibir</th>
                            </tr>
                            <?PHP do { ?>
                                <tr align="center" valign="middle">
                                    <td><?php echo @$row_usuarios['id_usuario'];
                                        $id_usu = @$row_usuarios['id_usuario']; ?></td>
                                    <td><?php echo @$row_usuarios['correo_usuario']; ?></td>
                                    <td><?php echo @$row_usuarios['nombre_usuario']; ?></td>
                                    <td><a href="ver_pedidos.php?id_usuario=<?php echo @$row_usuarios['id_usuario']; ?>" class="btn btn-warning btn-sm">Pedidos</a></td>
                                    <td><?php
                                        $porcentaje = 0;
                                        $b_carro = mysqli_query($conexion, "SELECT * FROM carrito WHERE id_usuario='$id_usu'");
                                        while ($row_carro = @mysqli_fetch_assoc($b_carro)) {
                                            $porcentaje += $row_carro['porcentaje'];
                                        }
                                        echo number_format($porcentaje);
                                        ?></td>
                                    <td><?php $b_pagos = mysqli_query($conexion, "SELECT SUM(total) AS total_suma FROM abono_comision WHERE id_usuario='$id_usu'");
                                        $row_pagos = @mysqli_fetch_assoc($b_pagos);

                                        ?><a href="comisiones_pagadas.php?id_usuario=<?php echo @$row_usuarios['id_usuario']; ?>"><dfn title="Click para ver todos los pagos de comisiones realizados"><?php echo number_format(@$row_pagos['total_suma']); ?></dfn></a></td>
                                    <td><?php echo number_format($porcentaje - @$row_pagos['total_suma']); ?></td>
                                    <td><?php $total_recaudos = 0;
                                        $abonos_recaudos = 0;
                                        $saldo_recaudos = 0;
                                        $pagos = 0;
                                        $saldo_rec = 0;
                                        $b_recaudos = @mysqli_query($conexion, "SELECT * FROM recaudos WHERE id_usuario='$id_usu'");
                                        while ($row_recaudos = @mysqli_fetch_assoc($b_recaudos)) {
                                            $total_recaudos += @$row_recaudos['total_recaudo'];
                                            $abonos_recaudos += @$row_recaudos['abono_recaudo'];
                                            $pagos += @$row_recaudos['abono_recaudo'];
                                        }
                                        echo number_format($total_recaudos);
                                        ?></td>
                                    <td><a href="ver_recaudos.php?id_usuario=<?php echo @$row_usuarios['id_usuario']; ?>"><dfn title="Click para ver todos los recaudos del usuario"><?php echo number_format($pagos); ?></dfn></a></td>
                                    <td><?php $saldo_rec = $total_recaudos - $pagos;
                                        echo number_format($saldo_rec); ?></td>
                                    <td><?php echo @$row_usuarios['fecha_registro']; ?></td>
                                    <td><a href="pagar_comision.php?id_usuario=<?php echo @$row_usuarios['id_usuario']; ?>" class="btn btn-success btn-sm">Pagar comision</a></td>
                                    <td><a href="recaudar.php?id_usuario=<?php echo @$row_usuarios['id_usuario']; ?>" class="btn btn-sm btn-info">Recibir recaudo</a></td>
                                </tr>
                            <?php } while ($row_usuarios = @mysqli_fetch_assoc($los_usuarios)); ?>
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