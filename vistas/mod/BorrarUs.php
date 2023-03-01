<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM usuarios WHERE id_usuario = '$id'");
$res = mysqli_query($conexion, $delete);

?>