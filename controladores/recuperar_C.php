<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require('../conexion/conexion.php');

error_reporting(0);//No mostrar errores de php.ini

//Load Composer's autoloader
require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';

//Busco el registro  del usuario 
if (!empty($_POST["enviar"])) {

    if (!empty($_POST['num-doc'])) {

        $datos = '';
        $doc = $_POST['num-doc'];

        $buscar_usuario = mysqli_query($conexion, "SELECT nombre_usuario,email,rku FROM usuarios WHERE num_doc ='$doc'");
        $row_usuario = mysqli_fetch_assoc($buscar_usuario);
        $password = $row_usuario['rku'];
        $nom = $row_usuario['nombre_usuario'];
        $correo = $row_usuario['email'];

        if ($row_usuario >= 1) {
            $mail = new PHPMailer(true);

           
                //Server settings
               // $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'frrutosdelcampoandes@gmail.com';
                $mail->Password = 'ntbctqrnqpxfjzxf';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                //Recipients
                $mail->setFrom('frrutosdelcampoandes@gmail.com', 'Solcomercial');
                $mail->addAddress("$correo");

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Recuperacion datos cuenta Solcomcial';
                $mail->Body = 'Cordial saludo Señor(a) <b>' . $nom . '</b> de parte del equipo de Solcomercial.<br><br> 
                
                Detectamos una solicitud de recuperación de tu información para el acceso a tu cuenta de compras en nuestra plataforma.<br><br> 
                
                A continuación encontraras tus datos de acceso:<br><br>

                E-mail: <b>' . $correo . '</b><br><br>

                Contraseña: <b>' . $password . '</b><br><br>

                Recuerda guardar tus datos en un lugar seguro, y estamos prestos a solucionar cualquier inquietud que tengas.
                <br><br><br><br>

                
                Feliz día.';

                $mail->send();
                ?>
                <script>
                    Swal.fire({
                        title: 'Muy bien',
                        text: "Enviamos un correo con tus datos de acceso al correo que registraste en nuestra plataforma.!",
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Continuar!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            window.location ='../vistas/login.php';
                        }
                    })
                </script>
    <?php
            
        } else { ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Documento no encontrado',
                    confirmButtonColor: '#177c03',

                })
            </script>
        <?php

        }
    } else { ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Campo vacio, por favor verifica!',
                confirmButtonColor: '#177c03',

            })
        </script>
<?php


    }
}
