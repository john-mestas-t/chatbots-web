<?php

require './mail/vendor/autoload.php';

if (isset($_POST['email']))
{
    $email_from = $_POST['email'];
    $email_to = "sumatecperu@gmail.com";
    $email_subject = $email_from . " - SOLICITUD DE INFORMES";

    echo $email_from . ', ';


    //A partir de aqui se contruye el cuerpo del mensaje tal y como llegar� al correo
    $email_message = "Contenido del Mensaje.\n\n";
    $email_message .= "Email de procedencia: " . $email_from . "\n";


    $mail = new PHPMailer();
    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'sumatecperu@gmail.com'; // SMTP username
    $mail->Password = 'nomeacuerdo21'; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    $mail->setFrom($email_from, $email_from);
    $mail->addAddress($email_to, 'Sumatec'); // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    ///$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $email_subject;
    $mail->Body = $email_message;
    $mail->AltBody = $email_message;


    if (!$mail->send())
    {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else
    {
        echo 'gracias!. Nos pondremos en contacto contigo a la brevedad.';
	header("Location: http://www.sumatec.org");
	exit;
    }
}
