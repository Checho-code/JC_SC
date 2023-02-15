<?php
session_start();
$usuario = $_SESSION['datosU']['nombre_usuario'];
include '../conexion/conexion.php';
include '../vistas/menuAdmin.php';
error_reporting(0);
$ver = 'nover';
$disabled = "disabled";

if ($_SESSION['nivel'] > 2) {
    $ver = '';
    $disabled = "";
}




//Funciones para la carga de las imagenes
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




//Codigo para registrar la noticia
if (isset($_POST['noticia']) && $_SESSION['nivel'] > 2) {
    $id_usuario = $_SESSION['id_usuario'];
    $titulo = ($_POST['titulo']);
    $noticia = ($_POST['noticia']);
    $fecha_publicacion = date('Y-m-d');

    //Inserto la noticia primero
    mysqli_query($conexion, "INSERT INTO noticias (id_usuario, fecha_publicacion, titulo, noticia) VALUES ($id_usuario, '$fecha_publicacion', '$titulo', '$noticia')");


    $cargar = '';
    $resultado = false;
    $nombre = $_FILES['imagen']['name'];
    $nombrer = strtolower($nombre);
    if ($nombrer != '') {
        //determino que el archivo que se ha subido no tenga mas de una extencion
        $extenciones = substr_count($nombrer, ".");

        if ($extenciones == 1 && ($_FILES["imagen"]["size"] < 10000000)) {
            $rand = RandomString();
            ########################Inicio de los otros formatos #########################################
            //crearMiniatura($rand, $_FILES['imagen']['name']);


            if ($nombre_archivo2 = crearMiniatura($rand, $_FILES['imagen']['name'])) {
                //Busco el registro de la ultima noticia subida y actualizo la imagen
                $b_noticia = mysqli_query($conexion, "SELECT * FROM noticias ORDER BY id_noticia DESC LIMIT 1");
                $row_noticia = mysqli_fetch_assoc($b_noticia);
                $id_noticia = $row_noticia['id_noticia'];

                //Actualizar el registro
                mysqli_query($conexion, "UPDATE noticias SET imagen='$nombre_archivo2' WHERE id_noticia=$id_noticia");
            }
        } else {
            echo "<script type='text/javascript'>
                  alert('El formato no es permitido o es demasiado grande,- no se ha realizado el registro');
                  </script>";
        }
    }
}

//Busco el registro de las noticias 
$buscar_noticias = mysqli_query($conexion, "SELECT * FROM noticias ORDER BY id_noticia DESC");
$row_noticias = mysqli_fetch_assoc($buscar_noticias)

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

    <title>Solcomercial</title>

</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">

            <div class="col-sm-12 <?php echo $ver; ?>">
                <h2 style="color: #177c03; text-align: center;" class="<?php echo $ver; ?>">Noticias</h2>
                <br>
                <br>
                <form name="noticias" method="POST" enctype="multipart/form-data" class="<?php echo $ver; ?>">
                    <div class="form-group">
                        <label for="titulo">Titulo de la noticia *</label>
                        <input type="text" name="titulo" autocomplete="off" class="form-control" required placeholder="Titulo de la noticia" <?php echo $disabled; ?> />
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="noticia">Noticia *</label>
                        <textarea name="noticia" class="form-control" required placeholder="Escriba aquí su publicacion" <?php echo $disabled; ?>></textarea>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="imagen">Seleccione la imagen de la noticia</label>
                        <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif" lang="es" <?php echo $disabled; ?>>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <input type="submit" value="Publicar" class="btn" style="background-color: #177c03; color:#ffffff" <?php echo $disabled; ?> />
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br><br>
        <br>

        <h2 style="color: #177c03; text-align: center;">Las noticias </h2>
        <br>
        <br>
        <!--<div class="embed-responsive embed-responsive-16by9">-->
        <iframe width="560" height="315" src="https://www.youtube.com/embed/x8hEbhePSF4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <!--</div>-->
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <?php do {
                    $ver = 'nover'; ?>

                    <div class="row">

                        <div class="col-md-6">
                            <h2><?php echo @$row_noticias['titulo'];
                                if ($row_noticias['imagen'] != '') {
                                    $ver = '';
                                } ?></h2>
                            <b><?php echo @$row_noticias['fecha_publicacion']; ?></b>
                            <p><?php echo @$row_noticias['noticia']; ?></p>
                        </div>
                        <div class="col-md-6"><img src="img/miniaturas/<?php echo @$row_noticias['imagen']; ?>" width="200" height="200" class="<?php echo $ver; ?>" /></div>
                    </div>



                    <hr>

                <?php } while ($row_noticias = mysqli_fetch_assoc($buscar_noticias)); ?>
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