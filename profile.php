<?php 

include "bootstrap/init.php";



if(!isLoggedInUser()){
    $auth = "auth.php";
    header("Location:" . site_url('auth.php'));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post = $_POST;
    $action = $_GET['action'];

    $user_name = $_POST['user_name'] ;
    $full_name = $_POST['full_name'] ;
    $email = $_POST['email'] ;

    if ($action = "update" && !empty($user_name)&& !empty($full_name)&& !empty($email)) {
            $result = updateAdmin($post);
            AdminSuccessMessage("Updated SuccessFully !");
        
    }else{
        AdminErrorMessage("There is a Problem ... Please Fill The Form ! ");
    }
}










include "tpl/tpl-profile.php";