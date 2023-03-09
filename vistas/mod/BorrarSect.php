<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM sectores WHERE id_sector = '$id'");
$execute = mysqli_query($conexion, $delete) or die(mysqli_error($conexion));
