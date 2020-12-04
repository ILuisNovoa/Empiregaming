<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'providers/mails/Exception.php';
require 'providers/mails/PHPMailer.php';
require 'providers/mails/SMTP.php';

class CorreoController
{ 

public function email(){ 

   $correo = $_REQUEST['em'] ;
   $nickname    = $_REQUEST['nk'];
   $password = $_REQUEST['ps'];




//enviar mensaje
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                     // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'luisensenapsw@gmail.com';                     // SMTP username
    $mail->Password   = '1006978784Luispp';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('luisensenapsw@gmail.com', 'EmpireGaming');
    $mail->addAddress($correo);  

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Bienvenido a Empire Gaming Torneos';
    $mail->Body    = '<h1><center> Hola. Gracias por registrarse en el sistema de gention de torneos de la empresa Empire Gaiming <br>
         a continuacion su Apodo y  Clave  de usuario para ingresar al sistema <br><br> 
         APODO : '.$nickname.'  <br><br> 
         CLAVE : '.$password.' </h1> ';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   header('Location: ?controller=login');
    
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

}


?>