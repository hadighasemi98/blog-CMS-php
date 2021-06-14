<?php
// include "../bootstrap/init.php";
include  BASE_PATH . 'vendor/autoload.php' ;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "587";
    $mail->SMTPSecure = "tls";

    // $mail->SMTPDebug = 2;

    $mail->Username = "hadiwebtest@gmail.com";
    $mail->Password  = "hadi2352";

    $mail->setFrom("hadiwebtest@gmail.com", 'OTP Verification');
    $mail->addReplyTo("no-reply@barikbuddy.com");
    $mail->isHTML(true);
