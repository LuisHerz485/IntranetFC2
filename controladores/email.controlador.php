<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'google-api-php-client-2.9.1/vendor/autoload.php';

class ControladorEmail
{
    static public function ctrEnviarMail(string $mensaje, string $asunto, string $correoDestino, string $archivoPath = null, string $archivoNombre = null): bool
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        try {
            //Server settings 
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.fccontadores.com';       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = "permisosfcc@fccontadores.com";                             //SMTP username
            $mail->Password   = 'DAbD,1w2q2kH';                             //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            $mail->setFrom("permisosfcc@fccontadores.com", "permisosfcc@fccontadores.com");
            $mail->addAddress($correoDestino);                     //Add a recipient 
            if (isset($archivoPath)) {
                $mail->addAttachment($archivoPath, $archivoNombre);
            }
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $mensaje;
            return $mail->send();
        } catch (Exception $e) {
            echo "<script>
                console.log(`";
            var_dump($e->getMessage());
            echo "`)</script>";
            return false;
        }
    }
}
