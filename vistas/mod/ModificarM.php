
<?php
//include('../../conexion/conexion.php');


if(isset($_POST['btnUpMarca'])){
    $id = $_REQUEST['id'];
    $nombre      = $_REQUEST['nombre_marca'];
    $estado 	 = $_REQUEST['estado'];
    
    $update = ("UPDATE marcas SET nom_marca  ='$nombre', estado  ='$estado' WHERE id_marca='$id'");
    $result_update = mysqli_query($conexion, $update);

    if($result_update>0){
        ?>
        <script>
         window.location.href = "marcas_V.php";   
        </script>
<?php } 

        }
