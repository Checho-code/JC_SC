<?php
include '../conexion/conexion.php';


$id_usu = $_SESSION['datosU']['id_usuario'];

//Registro del cierre de caja
if (isset($_POST['clave_maestra'])) {

    $clave = ($_POST['clave_maestra']);
    $clave_admin = $_SESSION['datosU']['clave_admin'];

    $buscar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE id_usuario=$id_usu");
    $row_usuario = mysqli_fetch_assoc($buscar_usuario);

    //Determino que la clave maestra sea correcta para registrar el cierre
    if ($clave_admin == $clave) {

        $b_caja = mysqli_query($conexion, "SELECT SUM(debito) AS ingresos, SUM(credito) AS egresos FROM caja WHERE id_usuario_receptor=$id_usu");
        $row_caja = mysqli_fetch_assoc($b_caja);
        $saldo = $row_caja['ingresos'] - $row_caja['egresos'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $observacion_caja = 'Cierre de caja';

        if ($saldo > 0) {

            mysqli_query($conexion, "INSERT INTO caja (id_usuario_receptor, id_usuario_emisor, fecha, hora, credito, observacion_caja) values ($id_usu, $id_usu, '$fecha', '$hora', $saldo, '$observacion_caja')");
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Muy bien....!',
                    text: 'No tiene saldo pendiente, no se realizó el registro.!',
                    confirmButtonColor: '#177c03',
    
                })
            </script>
    <?php

          
        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La clave es incorrecta, no se realizó el cierre de caja.!',
                confirmButtonColor: '#177c03',

            })
        </script>
<?php

        
    }
}

//Busco los saldos de la caja
$b_caja = mysqli_query($conexion, "SELECT SUM(debito) AS ingresos, SUM(credito) AS egresos FROM caja WHERE id_usuario_receptor=$id_usu");
$row_caja = mysqli_fetch_assoc($b_caja);

?>
