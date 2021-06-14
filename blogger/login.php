<?php

include "../bootstrap/init.php" ;

// function loginn($email, $pass)
// {
//     global $pdo;
//     $sql = "SELECT * FROM `usertable` WHERE emailAddress = :email , password = :pass  " ;
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([':email' => $email ,':pass' => $pass]);
//     $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $records ?? null;
// }
    


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];

    if ($action == 'login') {

        
        $emailAddress = $_POST['emailAddress'];

        $password = $_POST['password'];
        
        $response_key = $_POST['g-recaptcha-response'];
        recaptcha ($response_key);
        
        // if(is_verify(0))
        // $error_not_verify = "ابتدا ایمیل خود را چک کنید و حساب کاربری خود را فعال کنید" ;
        
        if (!($response_key)) {
            $errorCaptcha = "دوباره سعی کنید" ;      
        }
        $result = login($emailAddress , $password);


        if ($result !== true ?? null) {
            $errorLogin = " خطا ! رمز یا ایمیل اشتباه است " ;
        } elseif(is_verify($emailAddress)==0) {
            $errorLogin = " خطا ! حساب خود را فعال نکرده اید" ;
        }else{
            $successLogin = "خوش آمدید لاگین با موفقیت بود تا ثانیه دیگر منتقل میشوید ";
            header("Refresh:2;url=".blog_url());
        }
        
    }
}







include "tpl/tpl-login.php" ;