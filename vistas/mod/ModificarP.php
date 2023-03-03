<?php
// include('../../conexion/conexion.php');

if (isset($_POST['btnUpPre'])) {

    $id = $_REQUEST['id'];
    $nombre = $_REQUEST['nombre_premio'];
    $estado = $_REQUEST['estado'];
    $puntos = $_REQUEST['puntos'];

    $update = ("UPDATE premios SET  nombre_premio ='$nombre', puntos ='$puntos', estado ='$estado' WHERE id_premio='$id'");
    $result_update = mysqli_query($conexion, $update);

    if ($result_update > 0) {
        ?>
        <script>
            window.location.href = "premios_V.php";
        </script>

    <?php }
}