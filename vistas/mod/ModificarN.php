
<?php
include('../../conexion/conexion.php');

$id = $_REQUEST['id'];
$titulo      = $_REQUEST['titulo'];
$noticia	 = $_REQUEST['noticia'];
$estado	 = $_REQUEST['estado'];

$update = ("UPDATE noticias SET titulo  ='$titulo', noticia	 ='$noticia', estado  ='$estado'  WHERE id_noticia='$id'");
$result_update = mysqli_query($conexion, $update);

echo "<script type='text/javascript'>
        window.location='../noticias_V.php';
    </script>";

?>
