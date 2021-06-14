<?php 

include "bootstrap/init.php";


if(!isLoggedInUser()){
    $auth = "auth.php";
    header("Location:" . site_url('auth.php'));
}

if (isset($_POST['addSub'])) {
    $user_name = $_POST['fullName'];
    $email     = $_POST['emailAddress'];
    $password  = $_POST['password'];
    $validation = getToken(32);
    // $Avatar   = $_FILES["Avatar"]["name"] ?? null;

    register ($user_name, $password, $email, $validation) ;
    // uploadImages("Avatar");
}

if (isset($_POST['upSub'])) {

    $fullname = $_POST['upName'];
    $email    = $_POST['upEmail'];
    $pass     = $_POST['upPass'];
    // $Avatar   = $_FILES["upAvatar"]["name"] ;
    $id       = $_POST['upid'];
  
    updateUsers($fullname,$email,$pass,$validation,$id);
    // uploadImages("upAvatar");
    $successUserEdit = "User Updated SuccessFully";

  }
include "tpl/tpl-users.php";