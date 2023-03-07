<?php
@session_start();
$viDe = $_SESSION['datosU']['vieneDe'];
include('../conexion/conexion.php');


if (isset($_POST['btnAddCar'])) {

    $idUser = $_POST['idUser'];
    $idProd = $_POST['idProd'];
    $idMarca = $_POST['idMarca'];
    $fecha = date('Y-m-d');
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];


    $num_row = '';
    $id_MK = '';
    $buscar_usuario = mysqli_query($conexion, "SELECT id_marca FROM carrito WHERE id_usuario ='$idUser' AND estado = 'No enviado'");
    $row_usuario = mysqli_fetch_assoc($buscar_usuario);
    $num_row = mysqli_num_rows($buscar_usuario);
    $id_MK = $row_usuario['id_marca'];

    if (@$num_row == 0) {
        $sql = $conexion->query("INSERT INTO carrito (id_usuario, idProducto, id_marca, fecha, cantidad, precio_costo) VALUES ('$idUser', '$idProd','$idMarca','$fecha','$cantidad','$precio')");
        if ($viDe == 'frutos') {
?>
            <script>
                window.location.href = '../vistas/index-frutos.php';
            </script>
        <?php
        } elseif ($viDe == 'fonda') {
        ?>
            <script>
                window.location.href = '../vistas/index-fonda.php';
            </script>
        <?php

        } else {
        ?>
            <script>
                window.location.href = '../vistas/index-base.php';
            </script>
        <?php

        }
    } elseif ($num_row > 0 && $id_MK === $idMarca) {

        $sql = $conexion->query("INSERT INTO carrito (id_usuario, idProducto, id_marca, fecha, cantidad, precio_costo) VALUES ('$idUser', '$idProd','$idMarca','$fecha','$cantidad','$precio')");

        if ($viDe == 'frutos') {
        ?>
            <script>
                window.location.href = '../vistas/index-frutos.php';
            </script>
        <?php
        } elseif ($viDe == 'fonda') {
        ?>
            <script>
                window.location.href = '../vistas/index-fonda.php';
            </script>
        <?php

        } else {
        ?>
            <script>
                window.location.href = '../vistas/index-base.php';
            </script>
        <?php

        }
    } else {

        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Ooopss...!',
                text: "Debe terminar esta compra para poder seleccionar productos de otra marca.!",
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Continuar'
            });
        </script>
<?php

        @header("location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}
