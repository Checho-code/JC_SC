
<?php
include('../../conexion/conexion.php');

$id = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre_premio'];
$estado 	 = $_REQUEST['estado'];
$puntos 	 = $_REQUEST['puntos'];

$update = ("UPDATE premios SET  nombre_premio ='$nombre', puntos ='$puntos', estado ='$estado' WHERE id_premio='$id'");
$result_update = mysqli_query($conexion, $update);

echo "<script type='text/javascript'>
        window.location='../premios_V.php';
    </script>";

?>
