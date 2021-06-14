<?php 
include "bootstrap/init.php";



if(!isLoggedInUser()){
    $auth = "auth.php";
    header("Location:" . site_url('auth.php'));
}










include "tpl/tpl-dashboard.php";