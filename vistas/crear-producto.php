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



if (isset($_POST['nombre_producto']) && $_POST['nombre_producto'] != '') {
    //$idDepartamento=($_POST['idDepartamento']);
    //$idSubdepartamento=($_POST['idSubdepartamento']);
    $nombre_producto = ($_POST['nombre_producto']);
    $precio = ($_POST['precio']);
    $porcentaje = ($_POST['porcentaje']);
    $descripcion = ($_POST['descripcion']);
    $estado = 1;
    $promocion = ($_POST['promocion']);
    $idDepartamento = ($_POST['idDepartamento']);
    $idSubdepartamento = ($_POST['idSubdepartamento']);
    $unidad = ($_POST['unidad']);


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
            //Creo el departamento si no existe y el subdepartamento
            if ($idDepartamento == 0 && $idSubdepartamento == 0) {

                //Creacion del departamento
                $nombre_departamento = ($_POST['nombre_departamento']);
                $sql_dep = "INSERT INTO departamentos (nombre) VALUES (?)";
                $stmt_dep = $conexion->prepare($sql_dep);
                $stmt_dep->bind_param('s', $nombre_departamento);
                $stmt_dep->execute();
                $stmt_dep->close();

                //Busco el departamento creado
                $sql_ultimo_dep = "SELECT MAX(idDepartamento) AS maximoDepartamento FROM departamentos";
                $ultimo_dep = mysqli_query($conexion, $sql_ultimo_dep);
                $row_ultimo = mysqli_fetch_assoc($ultimo_dep);
                $idDepartamento = $row_ultimo['maximoDepartamento'];


                //ceacion del subdepartamento
                $nombre_subdepartamento = ($_POST['nombre_subdepartamento']);
                $sql_sub = "INSERT INTO subdepartamento (idDepartamento, nombre) VALUES (?,?)";
                $stmt_sub = $conexion->prepare($sql_sub);
                $stmt_sub->bind_param('is', $idDepartamento, $nombre_subdepartamento);
                $stmt_sub->execute();
                $stmt_sub->close();

                //Busco el ultimo subdepartamento creado para registrar el producto
                $sql_ultimo_sub = "SELECT MAX(idSubdepartamento) AS ultimoSub FROM subdepartamento";
                $ultimo_sub = mysqli_query($conexion, $sql_ultimo_sub);
                $row_ultimo_sub = mysqli_fetch_assoc($ultimo_sub);
                $idSubdepartamento = $row_ultimo_sub['ultimoSub'];
            }
            if ($_POST['idDepartamento'] != 0 && $_POST['idSubdepartamento'] == 0) {

                //Creo solo el subdepartamento
                $nombre_subdepartamento = ($_POST['nombre_subdepartamento']);
                $sql_sub = "INSERT INTO subdepartamento (idDepartamento, nombre) VALUES (?,?)";
                $stmt_sub = $conexion->prepare($sql_sub);
                $stmt_sub->bind_param('is', $idDepartamento, $nombre_subdepartamento);
                $stmt_sub->execute();
                $stmt_sub->close();

                //Busco el ultimo subdepartamento creado y registro el producto
                $sql_ultimo_sub = "SELECT MAX(idSubdepartamento) AS ultimoSub FROM subdepartamento";
                $ultimo_sub = mysqli_query($conexion, $sql_ultimo_sub);
                $row_ultimo_sub = mysqli_fetch_assoc($ultimo_sub);
                $idSubdepartamento = $row_ultimo_sub['ultimoSub'];
            }

            $stmt = $conexion->prepare("INSERT INTO productos (idDepartamento, idSubdepartamento, nombre_producto, precio, unidad, porcentaje, descripcion, imagen, estado, promocion) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('iisdsdssii', $idDepartamento, $idSubdepartamento, $nombre_producto, $precio, $unidad, $porcentaje, $descripcion, $nombre_archivo2, $estado, $promocion);
            $stmt->execute();
            $stmt->close();
        }
    } else {
        echo "<script type='text/javascript'>
		 alert('El formato no es permitido o es demasiado granden no se ha realizado el registro');
		 </script>";
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
        function showselect(str) {
            var xmlhttp;

            if (str == 0) {
                document.publicar.nombre_departamento.value = prompt('Ingrese el nombre del nuevo departamento');
            }

            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                document.publicar.nombre_departamento.value = "";
                return;
            }

            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObjet("Microsoft.XMLHTTP");

            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("cliente").innerHTML = xmlhttp.responseText;
                }
            }

            xmlhttp.open("GET", "b_subdepartamento.php?id_departamento=" + str, true);
            xmlhttp.send();
        }

        function cargar() {
            if (document.publicar.idSubdepartamento.value == 0) {
                document.publicar.nombre_subdepartamento.value = prompt('Ingrese el nombre del nuevo subdepartamento');
            }
        }
    </script>
</head>

<body>
    <div class="container-fluid mt-5 mb-5 ">

        <div class="row">

            <div class="col-sm-12">

                <form name="publicar" id="publicar" method="post" enctype="multipart/form-data">
                    <h2 style="color: #177c03; text-align: center;">Crear producto</h2>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="idDepartamento">Departamento*</label>
                        <select name="idDepartamento" id="idDepartamento" class="form-control" onChange="showselect(this.value) ">
                            <option value="">Ninguno</option>
                            <option value="0">Nuevo</option>
                            <?php include('ajx_subdepartamentos.php'); ?>
                        </select>
                    </div>

                    <br>
                    <br>

                    <div class="form-group">
                        <label for="nombre producto">Nombre del producto*</label>
                        <input name="nombre_producto" type="text" required class="form-control" placeholder="Ingrese nombre del producto" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Precio">Precio*</label>
                        <input name="precio" type="text" required class="form-control" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Unidad">Unidad*</label>
                        <input name="unidad" type="text" required class="form-control" placeholder="Ej: libra, kilo, par, unidad">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="porcentaje">Porcentaje*</label>
                        <input name="porcentaje" type="text" required class="form-control" placeholder="Ingrese el porcentaje sin el simbolo % Ej: 10" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea name="descripcion" required class="form-control" placeholder="Ingrese los detalles del producto como presentacion, procedencia, marca etc"></textarea>
                    </div>

                    <br>
                    <br>
                    <div class="form-group">
                        <label for="Promocion">Promocion*</label>
                        <select name="promocion" required class="form-control" id="promocion">
                            <option value="">Ninguno</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        <label for="imagen">Seleccione la imagen del producto</label>
                        <input type="file" name="imagen" class="form-control-file" accept="image/jpeg, image/jpg, image/png, image/gif" lang="es">
                    </div>
                    <br>
                    <br>

                    <div class="form-group">
                        <input type="submit" value="Guardar" class="btn" style="background-color: #177c03; color:#ffffff">
                        <a href="index-base.php"><input type="button" value="Cancelar" class="btn btn-warning"></a>

                    </div>


                </form>
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