<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




class TemplateController
{

    public function index()
    {
        include "views/template.php";
    }


    static public function path()
    {
        if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
            return "https://localhost/frontend_bolsa_trabajo/";
        } else {
            return "http://prueba_bolsa_de_trabajo.com/";
        }
    }

    static public function sendEmail($name, $subject, $email, $message, $url)
    {


        date_default_timezone_set('America/Mexico_City');
        $mail = new PHPMailer();
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.ionos.mx';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'soporte@multiservices-job.mx';
        $mail->Password   = 'job2024#Dent';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 587;
        $mail->CharSet = 'UTF-8';
        $mail->isMail();
        $mail->setFrom('soporte@multiservices-job.mx', 'Multiservices Job Bolsa de trabajo');
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
        $send = $mail->Send();
        if (!$send) {
            return $mail->ErrorInfo;
        } else {
            return 'ok';
        }
    }
}
