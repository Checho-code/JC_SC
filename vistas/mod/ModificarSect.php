<?php
//include('../../conexion/conexion.php');

if (isset($_POST['btnUpSec'])) {

  $id = $_REQUEST['id'];
  $nombre      = $_REQUEST['nom_sector'];
  $estado    = $_REQUEST['estado'];

  $update = ("UPDATE sectores SET nom_sector  ='$nombre', estado  ='$estado' WHERE id_sector='$id'");
  $result_update = mysqli_query($conexion, $update);

  if ($result_update > 0) {
?>
    <script>
      window.location.href = "sectores_V.php";
    </script>
<?php }
}
