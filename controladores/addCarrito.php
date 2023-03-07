<?php
session_start();

include('../conexion/conexion.php');

if (isset($_POST['btnAddCar'])) {

    $idUser = $_POST['idUser'];

    $buscar_usuario = mysqli_query($conexion, "SELECT id_marca FROM carrito WHERE id_usuario ='$idUser' AND estado = 'No enviado'");
    $num_row = mysqli_num_rows($buscar_usuario);
    $row_usuario = mysqli_fetch_assoc($buscar_usuario);
    $id_mark = $row_usuario['id_marca'];

    if ($num_row == 0) {
        $idUser = $_POST['idUser'];
        $idProd = $_POST['idProd'];
        $idMarca = $_POST['idMarca'];
        $fecha = date('Y-m-d');
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        $sql = $conexion->query("INSERT INTO carrito (id_usuario, idProducto, id_marca, fecha, cantidad, precio_costo) VALUES ('$idUser', '$idProd','$idMarca','$fecha','$cantidad','$precio')");
        if ($sql) {
            header("location:" . $_SERVER['HTTP_REFERER'] . "");
        }
    }

    $Marca = $_POST['idMarca'];
    if ($id_mark != $Marca) {
        $idUser = $_POST['idUser'];
        $idProd = $_POST['idProd'];
        $idMarca = $_POST['idMarca'];
        $fecha = date('Y-m-d');
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];

        $sql = $conexion->query("INSERT INTO carrito (id_usuario, idProducto, id_marca, fecha, cantidad, precio_costo) VALUES ('$idUser', '$idProd','$idMarca','$fecha','$cantidad','$precio')");
        if ($sql) {
            header("location:" . $_SERVER['HTTP_REFERER'] . "");

        }

    } else {
        ?>
<script>
Swal.fire({
    icon: 'question',
    title: 'Opps...!',
    text: 'Para agregar a vcarrito debe terminar compra!',
    confirmButtonColor: '#177c03',

})
</script>
<?php
    }

}