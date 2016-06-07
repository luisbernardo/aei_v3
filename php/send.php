<?php 

echo getcwd(); 

require_once("PHPMailer-master\PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->isSMTP();                                   
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;                 
$mail->Host = 587;
$mail->Username = 'aei2015ptsi@gmail.com';                
$mail->Password = '14789632*';

$mail->From = $_POST['email'];
$mail->FromName = $_POST['name'];
$mail->addAddress($_POST['email'], $_POST['name']);
$mail->addReplyTo($_POST['email'], $_POST['name']);

$mail->Subject = 'Contacto Plataforma AEI de ' . $_POST['name'];
$mail->Body    = $_POST['message'];
$mail->AltBody = $_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>