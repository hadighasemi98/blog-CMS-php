<?php

include "../bootstrap/init.php" ;


if (isset($_POST['sub'])) {
    $fullName= $_POST['full_name'];
    $email   = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $post_id = $_GET['post-id'];

    $result = addComment($fullName, $email, $subject, $message, $post_id);
    if ($result) {
        $error = "یکبار دیگر تلاش کنید ! ";
    }else{
        $success = " کامنت شما ثبت شد  ";
    }

}






include "tpl/tpl-fullPost.php" ;
