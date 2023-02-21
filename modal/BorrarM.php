<?php
include('../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM marcas WHERE id_marca = '$id'");
mysqli_query($conexion, $delete);
?>