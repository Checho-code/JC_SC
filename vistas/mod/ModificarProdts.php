
<?php
include('../../conexion/conexion.php');

$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$precio = $_REQUEST['precio'];
$unidad = $_REQUEST['unidad'];
$porcentaje = $_REQUEST['porcentaje'];
$descripcion = $_REQUEST['descripcion'];
$estado = $_REQUEST['estado'];
$destacado = $_REQUEST['destacado'];

$update = ("UPDATE productos SET  nom_producto ='$nombre', precio ='$precio', unidad ='$unidad', porcentaje ='$porcentaje', descripcion ='$descripcion', estado ='$estado', destacado ='$destacado' WHERE id_producto='$id'");
$result_update = mysqli_query($conexion, $update);
echo 'alert ("este es el id "'.$id.')';

echo "<script type='text/javascript'>
window.location='../productos_V.php';
</script>";

?>
