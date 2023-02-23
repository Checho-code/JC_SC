<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM noticias WHERE id_noticia = '$id'");
$res = mysqli_query($conexion, $delete);

?>