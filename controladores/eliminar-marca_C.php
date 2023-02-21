<?php
include '../conexion/conexion.php';

if (!empty($_POST['btnBorraMarca'])) {
    if (!empty($_POST["id"]) && !empty($_POST["nombre"])) {
?>
        <script>
            let res = confirm('¿esta seguro de eliminar?');
            if (res) {
                <?php
                $id = ($_POST["id"]);
                $sql = "DELETE FROM marcas WHERE id_marca = '$id'";
                $sentencia =  $conexion->query($sql);
	
    
                ?>
            }
        </script>
<?php


    }
}
// header ("../vistas/crear_marcas.php");