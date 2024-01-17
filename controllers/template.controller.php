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
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.ionos.mx';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'soporte@multiservices-job.mx';                     //SMTP username
        $mail->Password   = '931125HGryyn04';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;  
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
        $send = $mail->Send();
        if (!$send) {
            return $mail->ErrorInfo;
        } else {
            return 'ok';
        }
    }
}