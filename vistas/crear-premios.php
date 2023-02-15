<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';

function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 30; $i++) {
        $randstring = @$randstring . @$characters[rand(0, strlen($characters))];
    }
    return $randstring;
}


function codificar()
{
    $characters = '0123456789';
    $codigo = '';
    for ($i = 0; $i <= 11; $i++) {
        $codigo = @$codigo . @$characters[rand(0, strlen($characters))];
    }
    return $codigo;
}

function crearMiniatura($rand, $nombre_archivo)
{
    $nombre_archivo = $rand . "-" . $nombre_archivo;
    $finalWidth = 500;
    $dirFullImage = "img/";
    $dirTumbsImage = "img/miniaturas/";
    $tmpName = $_FILES['imagen']['tmp_name'];
    $finalName = $dirFullImage . $rand . "-" . $_FILES['imagen']['name'];
    //Copiar imagen a la carpeta principal
    copiarImagen($tmpName, $finalName);
    $im = null;
    if (preg_match('/[.](jpg)$/', $nombre_archivo)) {
        $im = imagecreatefromjpeg($finalName);
    } else if (preg_match('/[.](jpeg)$/', $nombre_archivo)) {
        $im = imagecreatefromjpeg($finalName);
    } else if (preg_match('/[.](gif)$/', $nombre_archivo)) {
        $im = imagecreatefromgif($finalName);
    } else if (preg_match('/[.](png)$/', $nombre_archivo)) {
        $im = imagecreatefrompng($finalName);
    }
    $width = round(imagesx($im));
    $height = imagesy($im);

    $minWidth = $finalWidth;
    $minHeight = round($height * ($finalWidth / $width));

    $imageTrueColor = imagecreatetruecolor($minWidth, $minHeight);
    imagecopyresized($imageTrueColor, $im, 0, 0, 0, 0, $minWidth, $minHeight, $width, $height);

    if (!file_exists($dirTumbsImage)) {
        if (!mkdir($dirTumbsImage)) {
            die("Hubo un problema con la miniatura");
        }
    }

    imagejpeg($imageTrueColor, $dirTumbsImage . $nombre_archivo);
    return $nombre_archivo;
}


function copiarImagen($origen, $destino)
{
    $resultado = move_uploaded_file($origen, $destino);
}

//Creo el codigo para registrar el premio
if (isset($_POST['nombre_premio'])) {
    $nombre_premio = ($_POST['nombre_premio']);
    $puntos = ($_POST['puntos']);

    $cargar = '';
    $resultado = false;
    $nombre = $_FILES['imagen']['name'];
    $nombrer = strtolower($nombre);
    //determino que el archivo que se ha subido no tenga mas de una extencion
    $extenciones = substr_count($nombrer, ".");

    if ($extenciones == 1 && ($_FILES["imagen"]["size"] < 10000000)) {
        $rand = RandomString();
        ########################Inicio de los otros formatos #########################################
        //crearMiniatura($rand, $_FILES['imagen']['name']);


        if ($nombre_archivo2 = crearMiniatura($rand, $_FILES['imagen']['name'])) {
            $sql = "INSERT INTO premios (nombre_premio, puntos, imagen) VALUES (?,?,?)";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('sis', $nombre_premio, $puntos, $nombre_archivo2);
            $stmt->execute();
            $stmt->close();
        }
    } else {
        echo "<script type='text/javascript'>
		 alert('El formato no es permitido o es demasiado granden no se ha realizado el registro');
		 </script>";
    }
}

//Juego de registros de los premios creados
$b_premios = mysqli_query($conexion, "SELECT * FROM premios ORDER BY id_premio");
$row_premios = mysqli_fetch_assoc($b_premios);


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

            <div class="col-sm-5">
                <h4 style="color: #177c03; text-align: center;">Crear premio </h4>
                
                <form name="plan_premios" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombre_premio">Nombre del premio *</label>
                        <input type="text" name="nombre_premio" required class="form-control" autocomplete="off" placeholder="Nombre del premio a entregar" />
                    </div>
                    <div class="separar">
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="puntos">Puntos necesarios *</label>
                        <input type="number" name="puntos" class="form-control" required placeholder="Ingrese los puntos que se requieren para ganar el premio" />
                    </div>
                    <div class="separar">
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Seleccione la imagen del producto</label>
                        <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif" lang="es">
                    </div>
                    <div class="separar">
                        <br>
                        <br>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Crear premio" style="background-color: #177c03; color:#ffffff" />
                        <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>
                    
                    </div>
                </form>
            </div>


            <div class="col-md-7">
            <h4 style="color: #177c03; text-align: center;">Premios</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tbody>
                            <tr align="center">
                                <th>Id</th>
                                <th>Premio</th>
                                <th>Puntos</th>
                                <th>Imagen</th>
                                <th>Quitar</th>
                            </tr>
                            <?php do { ?>
                                <tr align="center">
                                    <td><?php echo $row_premios['id_premio']; ?></td>
                                    <td><?php echo $row_premios['nombre_premio']; ?></td>
                                    <td><?php echo number_format($row_premios['puntos']); ?></td>
                                    <td><img src="../img/miniaturas/<?php echo $row_premios['imagen']; ?>" width="100" height="100" /></td>
                                    <td>Quitar</td>
                                </tr>
                            <?php } while ($row_premios = mysqli_fetch_assoc($b_premios)); ?>
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