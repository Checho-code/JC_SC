<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM productos WHERE id_producto = '$id'");
$res = mysqli_query($conexion, $delete);

?>