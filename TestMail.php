<?php
// send_email.php
 
// Include PHPMailer library files
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
 
// Create a new PHPMailer instance
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$mail = new PHPMailer(true); // Passing `true` enables exceptions
 
try {
    // Server settings
    $mail->SMTPDebug = false; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host = 'bh-in-15.webhostbox.net'; // Specify main and backup SMTP servers
    $mail->SMTPAuth = true; // Enable SMTP authentication
    $mail->Username = 'clicktabweb@cwltechnology.in'; // SMTP username
    $mail->Password = 'Arun@2608'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to
 
    // Recipients
    $mail->setFrom('clicktabweb@cwltechnology.in', 'Mailer');
    $mail->addAddress('arunkumarg293@gmail.com'); // Add a recipient
    $mail->addReplyTo('testsupport@detectivesanjeev.com', 'Information');
 
    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
    // Send the email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
