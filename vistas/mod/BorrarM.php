<?php
include('../../conexion/conexion.php');
$id = $_REQUEST['id'];

$delete = ("DELETE FROM marcas WHERE id_marca = '$id'");
$res = mysqli_query($conexion, $delete);
// if($res==false){
//     ?/>
// <script>
// Swal.fire(
//   'oooo noo..!',
//   'Registro eliminado con exito..!',
//   'success'
// );

// </script>
//     <?php
// }
?>