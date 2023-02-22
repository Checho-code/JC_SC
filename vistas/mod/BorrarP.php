<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM premios WHERE id_premio = '$id'");
$res = mysqli_query($conexion, $delete);

?>