<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class TemplateController
{

    public function index()
    {
        include "views/template.php";
    }


    static public function path()
    {
        return "http://prueba_bolsa_de_trabajo.com/";
    }
    static public function sendEmail($name, $subject, $email, $message, $url)
    {

        date_default_timezone_set('America/Mexico_City');
        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8';
        $mail->isMail();
        $mail->setFrom('futmipasion@hotmail.com', 'Bolsa de trabajo Multiservices');
        $mail->Subject = 'Hola' . $name . '-' . $subject;
        $mail->addAddress($email);
        $mail->msgHTML(
            '
            <div>
            Hola, ' . $name . ':
            <p>' . $message . '</p>
            <a href="' . $url . '">Click en el enlace para verificar tu cuenta</a>
            Gracias .
            El equipo de Bolsa de trabajo multiservice
            </div>
            '
        );
        $send = $email->Send();
        if (!$send) {
            return $mail->ErrorInfo;
        } else {
            return 'ok';
        }
    }
}
