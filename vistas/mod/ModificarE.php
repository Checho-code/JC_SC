
<?php
include('../../conexion/conexion.php');

$id = $_REQUEST['id'];
$nombre      = $_REQUEST['nombre'];
$apellido      = $_REQUEST['apellido'];
$tipo     = $_REQUEST['tipo-doc'];
$numero      = $_REQUEST['numero'];
$tel      = $_REQUEST['tel'];
$email      = $_REQUEST['correo'];
$nivel      = $_REQUEST['nivel'];
$estado      = $_REQUEST['estado'];

$update = ("UPDATE usuarios SET nombre_usuario  ='$nombre', apellido_usuario  ='$apellido', tipo_doc ='$tipo',  num_doc ='$numero', telefono  ='$tel', email ='$email', nivel ='$nivel', estado  ='$estado' WHERE id_usuario='$id'");
$result_update = mysqli_query($conexion, $update);

echo "<script type='text/javascript'>
        window.location='../empleados_V.php';
    </script>";

?>
