<?php
//include('../../conexion/conexion.php');

if (isset($_POST['btnUpDpto'])) {

  $id = $_REQUEST['id'];
  $estado    = $_REQUEST['estado'];
  echo $id;
  $update = ("UPDATE departamentos SET  estado  ='$estado' WHERE id_dpto='$id'");
  $result_update = mysqli_query($conexion, $update);

  if ($result_update > 0) {
?>
    <script>
      window.location.href = "sectores_V.php";
    </script>
<?php }
}
