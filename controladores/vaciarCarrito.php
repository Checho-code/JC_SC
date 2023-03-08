<?php
@session_start();
$viDe = $_SESSION['datosU']['vieneDe'];
include('../conexion/conexion.php');


if (isset($_POST['btnVaciar'])) {
    $us = $_POST['idUs'];

    $update = ("DELETE FROM carrito WHERE id_usuario = '$us' AND estado=0");
    $result_update = mysqli_query($conexion, $update);


    if ($result_update) {
        echo "eliminado";
        if ($viDe == 'frutos') {
?>
            <script>
                window.location.href = '../vistas/index-frutos.php';
            </script>
        <?php
        } elseif ($viDe == 'fonda') {
        ?>
            <script>
                window.location.href = '../vistas/index-fonda.php';
            </script>
        <?php

        } else {
        ?>
            <script>
                window.location.href = '../vistas/index-base.php';
            </script>
<?php
        }
    } else {
        echo "sin eliminar";
    }
}
