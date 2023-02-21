
<?php
include('../conexion/conexion.php');

$id = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre_marca'];
$estado 	 = $_REQUEST['estado'];

$update = ("UPDATE marcas SET nom_marca  ='$nombre', estado  ='$estado' WHERE id_marca='$id'");
$result_update = mysqli_query($conexion, $update);

echo "<script type='text/javascript'>
        window.location='marcas_V.php';
    </script>";

?>
