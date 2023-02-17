<?php

include '../conexion/conexion.php';

function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 30; $i++) {
        $randstring = @$randstring . @$characters[rand(0, strlen($characters))];
    }
    return $randstring;
}



//Creo el codigo para registrar el premio
if (isset($_POST['btnGuardarPremio'])) {

    if (!empty($_POST['nombre_premio']) && !empty($_POST['puntos']) && ($_FILES['imagen']['name'] != null)) {
        $rand = RandomString();
        $nombre_premio = ($_POST['nombre_premio']);
        $puntos = ($_POST['puntos']);
        $imagen = $_FILES['imagen']['name'];
        $temporal = $_FILES['imagen']['tmp_name'];
        $nombrer = strtolower($imagen);
        $nom_img = $rand . '-' . $nombrer;
        $carpeta = 'img/premios';
        $ruta = $carpeta . '/' . $nom_img;
        move_uploaded_file($temporal, '../' . $carpeta . '/' . $nom_img);


        $sql = "INSERT INTO premios (nombre_premio, puntos, imagen) VALUES ('$nombre_premio', '$puntos', '$nom_img')";
        $execute = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));

        if ($execute > 0) {

    ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Muy bien...!',
                    text: 'El premio se ha guardado con exito!',
                    confirmButtonColor: '#177c03',

                })
            </script>
        <?php


        } else {
        ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...!',
                    text: 'No se pudo registrar el premio!',
                    confirmButtonColor: '#177c03',

                })
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Hay campos vacios, por favor intente de nuevo.!',
                confirmButtonColor: '#177c03',

            })
        </script>
<?php
    }
}

//Juego de registros de los premios creados
$b_premios = mysqli_query($conexion, "SELECT * FROM premios ORDER BY id_premio");
$row_premios = mysqli_fetch_assoc($b_premios);


?>