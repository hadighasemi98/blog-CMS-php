<?php

include "../bootstrap/init.php" ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $action = $_GET['action'];

    if (isset($_POST['forget-pass-submit'])) {
        
        $email = $_POST['emailAddress'];
        $exist_email = already_exist("usertable","emailAddress","$email");

        $response_key = $_POST['g-recaptcha-response'];
        recaptcha($response_key);

        if (!($response_key)) {
            $errorCaptcha = "Wrong captcha! Please Try again ";
        }

        if ($exist_email) {
            // Verify Email
            $token = getToken(32);
            $blog_url = BLOG_URL ;
            $email = base64_encode(urlencode($_POST['emailAddress']));

            // recipient
            $mail->addAddress($_POST['emailAddress']);
            $mail->Subject = "Verify your E-Mail";
            $mail->Body =
            "
                <h2>Thanks for sign-up</h2>
                <a href='{$blog_url}new-password.php?email={$_POST['emailAddress']}'> Click here to submit new password </a>
            ";

            
            $mail->send();
            
            
            $success_send =  "برای ایجاد رمز جدید لطفا ایمیل خود را چک کنید " ;

        }else{
            $error =  " ایمیل شما یافت نشد . " ;
        }

    }
}







include "tpl/tpl-forgetPass.php" ;