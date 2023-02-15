<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';

if (isset($_POST['correo_usuario'])) {
    $correo_usuario = ($_POST['correo_usuario']);
    $nombre_usuario = ($_POST['nombre_usuario']);
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);
    $nivel = ($_POST['nivel']);
    $fecha_registro = date('Y-m-d');
    $sql = "INSERT INTO usuarios (correo_usuario, nombre_usuario, clave, nivel, fecha_registro) VALUES (?,?,?,?,?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('sssis', $correo_usuario, $nombre_usuario, $clave, $nivel, $fecha_registro);
    $stmt->execute();
    $stmt->close();
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
    <script type="text/javascript">
        function validar() {
            var clave = document.registrar.clave.value;
            var clave2 = document.registrar.clave2.value;
            if (clave != clave2) {
                alert('Las contraseñas no coinsiden');
                document.registrar.clave.value = '';
                document.registrar.clave2.value = '';
                return false;
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">

            <div class="col-sm-12">
                <h3 style="color: #177c03; text-align: center;">Registrar vendedor</h3>
                <br>
                    <br>
                <form name="registrar" method="post" onSubmit="return validar()">
                    <div class="form-group">
                        <label for="correo_usuario">Cedula del usuario *</label>
                        <input type="number" name="correo_usuario" autocomplete="off" class="form-control" required placeholder="Ingrese la cedula del cliente" />
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="nombre_suaurio">Nombre del vendedor *</label>
                        <input type="text" name="nombre_usuario" autocomplete="off" class="form-control" required placeholder="Ingrese el nombre del vendedor" />
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="clave">Contraseña *</label>
                        <input type="password" name="clave" autocomplete="off" class="form-control" required placeholder="Ingrese una contraseña" />
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <label for="clave2">Contraseña *</label>
                        <input type="password" name="clave2" autocomplete="off" class="form-control" required placeholder="Repita la contraseña" />
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="nivel">Rol *</label>
                        <select name="nivel" required="required" class="form-control">
                            <option value="">Ninguno</option>
                            <option value="3">Administrador</option>
                            <option value="2">Vendedor</option>
                            <option value="1">Repartidor</option>
                            <option value="0">Empacador</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn" style="background-color: #177c03; color:#ffffff" value="Registrar">
                        <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <br>
                    <br><br>
                    <br>
    <!---------------- Footer --------------->
    <?php include('footer.php') ?>

    <script src="js/js_bootstrap/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
</body>

</html>