<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'autoload.php';

// Configuración de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuracion el servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->SMTPAuth = true;
    $mail->Username = 'info@soumgsanarate.com';
    $mail->Password = '+123User';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Configuracion el remitente
    $remitente = $_POST['remitente'];
    $remitenteCorreo = $_POST['remitenteCorreo'];

    // Correo del destinatario
    $mail->setFrom('info@soumgsanarate.com', $remitente);
    $mail->addAddress('info.soumgsanarate@gmail.com', 'UMG Sanarate');

    // Configuracion el asunto y el cuerpo del correo
    $asunto = $_POST['asunto'];
    $cuerpo = $_POST['cuerpo'];
    $cuerpo .= "\n";
    $cuerpo .= "\nEnviado por medio del correo electronico: ". $remitenteCorreo;

    $mail->Subject = $asunto;
    $mail->Body = $cuerpo;

    $mail->send();
    require_once "email_template.php";
    //echo 'El correo ha sido enviado correctamente';
    

} catch (Exception $e) {

    //echo "Error al enviar el correo: {$mail->ErrorInfo}";
    
}