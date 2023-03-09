<?php
@session_start();
$viDe = $_SESSION['datosU']['vieneDe'];
$user = $_SESSION['datosU']['id_usuario'];
include('../conexion/conexion.php');


if (isset($_POST['btnDelProdCar'])) {

    $prod = $_POST['id_carrito'];

    $update = ("DELETE FROM carrito WHERE id_usuario = '$user' AND id_carrito = '$prod' AND estado=0");
    $result_update = mysqli_query($conexion, $update);



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



if (isset($_POST['btnVaciarCar'])) {

    $update = ("DELETE FROM carrito WHERE id_usuario = '$user' AND estado=0");
    $result_update = mysqli_query($conexion, $update);


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
}
