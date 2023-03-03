<?php
//include('../../conexion/conexion.php');

if (isset($_POST['btnUpNot'])) {
    $id = $_REQUEST['id'];
    $titulo = $_REQUEST['titulo'];
    $noticia = $_REQUEST['noticia'];
    $estado = $_REQUEST['estado'];

    $update = ("UPDATE noticias SET titulo  ='$titulo', noticia	 ='$noticia', estado  ='$estado'  WHERE id_noticia='$id'");
    $result_update = mysqli_query($conexion, $update);

    if ($result_update > 0) {
        ?>
        <script>
            window.location.href = "noticias_V.php";
        </script>
    <?php
    }
}