<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


error_reporting(0); //No mostrar errores de php.ini

//Load Composer's autoloader
require '../phpMailer/Exception.php';
require '../phpMailer/PHPMailer.php';
require '../phpMailer/SMTP.php';


        $password = $clave;
        $nom = $nombre;
        $correo = $email;

        
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
            $mail->addAddress($correo);

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Bienvenid@ a Solcomercial';
            $mail->Body = 'Cordial saludo de parte del equipo de Solcomercial.<br/><br/>

            Señor(a) <b>' . $nom . '.</b><br/>
                Queremos darte la bienvenida a nuestra tienda virtual, por la cual podrás tener acceso a gran variedad de productos, y así ayudar a fortalecer el trabajo de muchos emprendedores y productores de nuestro país.<br/><br/>

                Tu registro fue exitoso y te recordamos tus datos de acceso, los cuales son:<br/><br/>

                E-mail: <b>' . $correo . '</b><br/>

                Contraseña: <b>' . $password . '</b><br/>

                Ya estás listo para realizar tu primer pedido y empezar a acumular por cada compra que realices,<br/><br/>
                 y redimir entre una gran cantidad de premios y obsequios que tenemos para ti.';


            $mail->send();
?>
            <script>
                Swal.fire({
                    title: 'Solcomercial',
                    text: "Enviamos un correo de bievenida al correo que registraste en nuestra plataforma.!",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continuar!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location = '../vistas/login.php';
                    }
                })
            </script>
        <?php

      
