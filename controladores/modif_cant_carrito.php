<?php
@session_start();
$viDe = $_SESSION['datosU']['vieneDe'];
include('../conexion/conexion.php');


if (isset($_POST['btnModCant'])) {
    $idCar = $_POST['id_carrito'];
    $cantidad = $_POST['cantidad'];

    if (!empty($_POST['id_carrito']) && !empty($_POST['cantidad'])) {

        $update = ("UPDATE carrito SET cantidad ='$cantidad ' WHERE id_carrito ='$idCar' ");
        $result_update = mysqli_query($conexion, $update);


        if ($result_update >= 1) {
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
        }
    }
}
