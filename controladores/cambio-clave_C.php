<?php

include '../conexion/conexion.php';

if (isset($_POST['btnCambioClave'])) {

    if (!empty($_POST['documento']) && !empty($_POST['clave'])) {

        $doc = ($_POST['documento']);
        $clave1 = ($_POST['clave']);
        $clave = password_hash($clave1, PASSWORD_DEFAULT);

        $buscar_cliente = mysqli_query($conexion, "SELECT * FROM usuarios WHERE num_doc='$doc'");
        $row_usuario = mysqli_fetch_assoc($buscar_cliente);

        if ($row_usuario > 0) {

            $actualizar = mysqli_query($conexion, "UPDATE usuarios SET clave='$clave', rku = '$clave1' WHERE num_doc='$doc'");


            if ($actualizar != 0) {
?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Muy bien...!',
                        text: 'El cambio de contraseña se realizó correctamente!',
                        confirmButtonColor: '#177c03',

                    })
                </script>
            <?php

            } else {
            ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...!',
                        text: 'Hubo un error, no se hizo cambios!',
                        confirmButtonColor: '#177c03',

                    })
                </script>
            <?php

            }
        } else {
            ?>
            <script>
                Swal.fire({
                    icon: 'question',
                    title: 'Hooo no!',
                    text: 'Documento no registrado, por favor verificar!',
                    confirmButtonColor: '#177c03',

                })
            </script>
        <?php

        }
    } else {
        ?>
        <script>
            Swal.fire({
                icon: 'question',
                title: 'Cuidado..!',
                text: 'Hay campos vacios, por favor verificar!',
                confirmButtonColor: '#177c03',

            })
        </script>
<?php

    }
}
