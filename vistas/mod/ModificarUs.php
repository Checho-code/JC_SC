
<?php
include('../../conexion/conexion.php');

$id = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$apellido      = $_REQUEST['apellido'];
$tipo     = $_REQUEST['tipo-doc'];
$numero      = $_REQUEST['numero'];
$tel      = $_REQUEST['tel'];
$estado      = $_REQUEST['estado'];
$email      = $_REQUEST['correo'];

$update = ("UPDATE usuarios SET nombre_usuario  ='$nombre', apellido_usuario  ='$apellido', tipo_doc ='$tipo',  num_doc ='$numero', telefono  ='$tel', email ='$email', estado  ='$estado' WHERE id_usuario='$id'");
$result_update = mysqli_query($conexion, $update);

 echo "<script type='text/javascript'>
         window.location='../ver-usuario.php';
    </script>";


?>
