<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM categorias WHERE id_categoria = '$id'");
$execute = mysqli_query($conexion, $delete) or die(mysqli_error($conexion));

