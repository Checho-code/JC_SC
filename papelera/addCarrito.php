<?php

include('../conexion/conexion.php');


if (isset($_POST['btnAddCar'])) {

    $idUser = $_POST['idUser'];
    $idProd = $_POST['idProd'];
    $idMarca = $_POST['idMarca'];
    $fecha = date('Y-m-d');
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];


    $buscar_usuario = mysqli_query($conexion, "SELECT id_marca FROM carrito WHERE id_usuario ='$idUser' AND estado = 'No enviado'");
    $row_usuario = mysqli_fetch_assoc($buscar_usuario);
    $num_row = mysqli_num_rows($buscar_usuario);
    $id_MK = $row_usuario['id_marca'];

    if ($id_MK === $idMarca || $num_row = 0) {
        $sql = $conexion->query("INSERT INTO carrito (id_usuario, idProducto, id_marca, fecha, cantidad, precio_costo) VALUES ('$idUser', '$idProd','$idMarca','$fecha','$cantidad','$precio')");
?>
        <script>
            Swal.fire({
                title: 'Muy Bien!',
                text: "Añadido al carrito.!",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Continuar'
            })
        </script>
    <?php

        header("location: " . $_SERVER['HTTP_REFERER'] . "");
    } else {
    ?>
        <script>
            Swal.fire({
                title: 'Ooopss...!',
                text: "Debe terminar la compra de esta marca para poder pedir de otra marca.!",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Continuar'
            })
        </script>
<?php

        header("location: " . $_SERVER['HTTP_REFERER'] . "");
    }
}
