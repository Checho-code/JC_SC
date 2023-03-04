<?php
// require('../conexion/conexion.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require('escape.php');

//capturamos y escapamos todo lo que se envio por el formulario
if (isset($_POST['btnEnviar'])) {


    if (!empty($_POST["nombre"]) and !empty($_POST["correo"]) and ($_POST["tipo"] != "0") and !empty(["mensaje"])) {

        $nom = $_POST["nombre"];
        $em = $_POST["correo"];
        $tip = $_POST["tipo"];
        $msg = $_POST["mensaje"];



        // error_reporting(0); //No mostrar errores de php.ini

        //Load Composer's autoloader
        require '../phpMailer/Exception.php';
        require '../phpMailer/PHPMailer.php';
        require '../phpMailer/SMTP.php';


        $nombre = $nom;
        $correo = $em;
        $tipo = $tip;
        $mensaje = $msg;
        $para = "solucionsolcomercial@gmail.com";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'solucionsolcomercial@gmail.com';
            $mail->Password = 'rcoxzhhydqwryqnq';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //Recipients
            $mail->setFrom('solucionsolcomercial@gmail.com', 'Solcomercial');
            $mail->addAddress($para);

            //Content
            $mail->isHTML(true);
            $mail->Subject = $tipo;
            $mail->Body = 'Hola señores Solcomercial<br><br> 
                                         Mi nombre es: <b>' . $nombre . '.</b><br><br>
                                         Mi correo es: <b> ' . $correo . ' .</b><br><br> 
                                         Este es mi mensaje:<br><br>' . $mensaje . '<br><br><br>
                                         Gracias por su atencion y espero su respuesta.';


            $mail->send();
            ?>
            <script>
                Swal.fire({
                    title: 'El correo ha sido enviado con éxito.!',
                    text: "Gracias por su mensaje, pronto recibirá nuestra respuesta.!",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continuar'
                }).then((result) => {
                    if (result.isConfirmed) {

                    }
                })
            </script>
            <?php
        } catch (Exception $e) {
            ?>
            <script>
                Swal.fire({
                    title: 'Ooopss...!',
                    text: "Lo sentimos, no se pudo enviar el correo, vuelve a intentarlo.!",
                    icon: 'error',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Continuar'
                })
            </script>
            <?php
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else { ?>
        <script>
            Swal.fire({
                title: 'Ooopss...!',
                text: "Lo sentimos, debes completar todos los campos para enviar el correo, vuelve a intentarlo.!",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Continuar'
            })
        </script>
    <?php }
}