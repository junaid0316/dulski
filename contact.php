<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];

    $mail->SMTPDebug = 0;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'Your Email';                 // SMTP username
    $mail->Password = 'Your App Password';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('Your Email', 'Dulski');
    $mail->addAddress('Your Email');     // Add a recipient
    $mail->addReplyto($_POST['email']);

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Message For Website';
    $mail->Body    = "<h3>Name: $fname $lname".".<br></br>Email: ".$email.".<br></br>Phone: ".$phone.".<br></br>Message: ".$msg.".</h3>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    
    $secretKey = "6Lf12qIfAAAAAEGIwJNxMSx0OFzp9GmGBauaC0W3";
        $responseKey = $_POST['g-recaptcha-response'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
    
        $response = file_get_contents($url);
        $response = json_decode($response);
    if($response->success) {
        $mail->send();
        $successmsg= "<h2>Message Sent Successfully.</h2>";
        echo ($successmsg);
    }else {
        $failedmsg= "<h2>Message Not Sent Successfully.</h2>";
        echo ($failedmsg);
        exit();
    }
}
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}