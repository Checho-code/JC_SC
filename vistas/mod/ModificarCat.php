
<?php
//include('../../conexion/conexion.php');


if(isset($_POST['btnUpCat'])){
    $id = $_REQUEST['id'];
    $nombre      = $_REQUEST['nombre'];
    
    $update = ("UPDATE categorias SET nom_categoria  ='$nombre' WHERE id_categoria='$id'");
    $result_update = mysqli_query($conexion, $update);

    if($result_update>0){
        ?>
        <script>
         window.location.href = "categorias_V.php";   
        </script>
<?php } 

        }
