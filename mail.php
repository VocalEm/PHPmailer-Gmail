<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

function sendmail($email, $name, $body, $subject, $html = false)
{
    $password = ""; //la contraseña que genero google para tu servicio
    $username = ""; //tu correo
    try {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.gmail.com';
        $phpmailer->SMTPAuth = true;
        $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $phpmailer->Port = 465;
        $phpmailer->Username = $username;
        $phpmailer->Password = $password;

        //Recipients
        $phpmailer->setFrom('', $name);
        $phpmailer->addAddress($email, $name);     //Add a recipient
        //Content
        $phpmailer->isHTML($html);                                  //Set email format to HTML
        $phpmailer->Subject = $subject;
        $phpmailer->Body    = $body;

        $phpmailer->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
    }
}
