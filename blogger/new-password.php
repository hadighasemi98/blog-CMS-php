<?php

include "../bootstrap/init.php" ;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (isset($_POST['new-pass-submit'])) {

        $newPass = $_POST['new-pass']; 
        $confirmPass = $_POST['confirm-password'];

        if ($confirmPass == $newPass) {
            
            $pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
            if (!preg_match($pattern_up, $newPass)) {
                $errorPass = "Must be at lest 4 character long, 1 upper case, 1 lower case letter and 1 number exist";
                
            }else{
                $email = $_GET['email'];
                newPass($newPass, $email);
                $success =  " رمز شما با موفقیت عوض شد <a href='login.php'>ورود به سایت </a>" ;
            }
            

            

        }else{

            $error =  " رمز های وارد شده برابر نیستند" ;
        }
//         $emailAddress = $_POST['emailAddress'];

//         $password = $_POST['password'];
        
//         $response_key = $_POST['g-recaptcha-response'];
//         recaptcha ($response_key);
//         if (!($response_key)) {
//             $errorCaptcha = "Wrong captcha! Please Try again ";
//         }
//         if (!isset($errorCaptcha) ) {
//            $result = login($emailAddress , $password);
//         }
//         if($result){
//             $success = "خوش آمدید لاگین با موفقیت بود تا ثانیه دیگر منتقل میشوید ";
//             header("Refresh:2;url=".blog_url());

//         }else{
//             $login_error = "ایمیل یا رمز کاربری اشتباه است " ;
//         }
    }
}







include "tpl/tpl-new-password.php" ;