<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require("vendor/autoload.php");

function sendMail($subject, $body, $email, $name){
    // config inicial del servidor SMTP
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->SMTPAuth = true;
    $phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $phpmailer->Port = 465;
    $phpmailer->Username = 'magui.alonso.g@gmail.com';
    $phpmailer->Password = 'hxhazrjvpcsybgix';
    // añadir destinatarios
    $phpmailer->setFrom('Magda Enciso');
    $phpmailer->addAddress('magui.alonso.g@gmail.com');
    // añadir contenido
    $phpmailer->isHTML(true);
    $phpmailer->Subject = $subject;
    $phpmailer->Body = $body;
    $phpmailer->AltBody = 'This is the body in plain text for non-HTML mail clients';
    // enviar el email
    if (!$phpmailer->send()) {
        echo 'Mailer Error: ' . $phpmailer->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
    
}

$name = $_POST['nombre'];
$email = $_POST['email'];
$subject = 'Consulta desde Magda Enciso Web';
$msg = $_POST['mensaje'];

$body = '<h2 style="color: #1C4C56">Mensaje enviado desde Magda Enciso Web</h2>
<h3 style="color: #1C4C56">- Nombre:</h3><p>'.$name.'</p>
<h3 style="color: #1C3C56">- Email:</h3><p>'.$email.'</p>
<h3 style="color: #1C4C56">- Mensaje:</h3><p>'.$msg.'</p>';

sendMail($subject, $body, $email, $name);
include 'gracias-por-contactarte.html'; //se debe crear un html que confirma el envío
?>



