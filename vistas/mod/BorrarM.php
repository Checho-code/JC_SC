<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM marcas WHERE id_marca = '$id'");
$execute = mysqli_query($conexion, $delete) or die(mysqli_error($conexion));

