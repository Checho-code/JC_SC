<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
$sql = "SELECT COUNT(*) total FROM pedidos WHERE estado = 0";
$result = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($result);
$pedPendientes = $fila['total'];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
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
    <?php include '../vistas/menuAdmin.php'; ?>

    <div class="container mt-5 ">


        <h4 style="color: #177c03; text-align: center;" class="mb-5">
            Formulario de Registro de Empleados
        </h4>
        <a type="button" href="lista_empleados.php" class="btn btn-warning">Lista Empleados</a>
        <div class="row text-center mt-5" style="background-color: #cecece">
            <div class="col-md-12 text-center">
                <strong>Registrar Nuevo Empleado</strong>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body">
                    <div class="row clearfix">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <!--- Formulario para registrar Empleados --->
                            <?php include('../controladores/crear_empleado_C.php') ?>

                            <form class="row form_regis needs-validation" novalidate method="post" id="registro">

                                <div class="row justify-content-around mt-3 p-2">

                                    <div class="col-5">
                                        <label for="nombres" class="label">Nombre *</label>
                                        <input name="nombre" type="text" autofocus="autofocus" class="form-control" <?php if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != '') : ?> value="<?php echo $_REQUEST['nombre']; ?>" <?php endif; ?>>
                                    </div>

                                    <div class="col-5">
                                        <label for="apellidos" class="label">Apellido *</label>
                                        <input required name="apellido" type="text" class="form-control" <?php if (isset($_REQUEST['apellido']) && $_REQUEST['apellido'] != '') : ?> value="<?php echo $_REQUEST['apellido']; ?>" <?php endif; ?>>
                                    </div>
                                </div>


                                <div class="row justify-content-around  mt-3 p-2">

                                    <div class="col-5">
                                        <label for="tipo-docs" class="label">Tipo documento *</label>
                                        <input class="tip-doc form-control " readonly name="tipo-doc" value="Id Empleado">
                                    </div>

                                    <div class="col-5">
                                        <label for="num-docs" class="label">Num. docuemnto *</label>
                                        <input required name="numero" type="text" class="form-control" <?php if (isset($_REQUEST['numero']) && $_REQUEST['numero'] != '') : ?> value="<?php echo $_REQUEST['numero']; ?>" <?php endif; ?>>
                                    </div>

                                </div>

                                <div class="row justify-content-around  mt-3 p-2">

                                    <div class="col-5">
                                        <label for="num-tel" class="label">Num. telefono *</label>
                                        <input required name="tel" type="number" class="form-control" <?php if (isset($_REQUEST['tel']) && $_REQUEST['tel'] != '') : ?> value="<?php echo $_REQUEST['tel']; ?>" <?php endif; ?>>
                                    </div>

                                    <div class="col-5">
                                        <label for="tipo-rol" class="label">Rol *</label>
                                        <select required class="tipo-rol form-control " name="nivel">
                                            <option value="Seleccione">Seleccione</option>
                                            <option value="1">Repartidor</option>
                                            <option value="2">Vendedor</option>
                                            <option value="3">Administrador</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="row justify-content-around mt-3 p-2">

                                    <div class="col-5">
                                        <label for="correo1s" class="label">Correo *</label>
                                        <input required type="email" name="correo1" class="form-control " <?php if (isset($_REQUEST['correo1']) && $_REQUEST['correo1'] != '') : ?> value="<?php echo $_REQUEST['correo1']; ?>" <?php endif; ?>>
                                    </div>

                                    <div class="col-5">
                                        <label for="correo2s" class="label">Repetir correo *</label>
                                        <input required type="email" name="correo2" class="form-control " <?php if (isset($_REQUEST['correo2']) && $_REQUEST['correo2'] != '') : ?> value="<?php echo $_REQUEST['correo2']; ?>" <?php endif; ?>>
                                    </div>

                                </div>


                                <div class="row justify-content-around mt-3 p-2">

                                    <div class="col-5">
                                        <label for="clave1s" class="label">Contraseña *</label>
                                        <div class="input-group ">
                                            <input required type="password" class="form-control" name="clave1" id="password" <?php if (isset($_REQUEST['clave1']) && $_REQUEST['clave1'] != '') : ?> value="<?php echo $_REQUEST['clave1']; ?>" <?php endif; ?>>

                                        </div>
                                    </div>

                                    <div class="col-5">
                                        <label for="clave2s" class="label">Repetir Contraseña *</label>
                                        <div class="input-group ">
                                            <input required type="password" class="form-control" name="clave2" id="password1" <?php if (isset($_REQUEST['clave2']) && $_REQUEST['clave2'] != '') : ?> value="<?php echo $_REQUEST['clave2']; ?>" <?php endif; ?>>

                                        </div>
                                    </div>

                                </div>


                                <div class="row justify-content-around mt-3 p-2">
                                    <div class="botonera col-5">
                                        <a href="index-base.php" class="btn-cancel">Cancelar</a>
                                    </div>
                                    <div class="botonera col-5">
                                        <input type="submit" class="btn-reg" name="btnRegistrar" value="Registrar">
                                    </div>
                                </div>

                            </form>

                        </div>
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


</body>

</html>