
<?php
include '../conexion/conexion.php';

$eliminar = $_GET['id_premio'];

$sentencia =  $conexion->query("DELETE FROM premios WHERE id_premio ='$eliminar'");
?>