<?php 
include "bootstrap/init.php";

if(!isLoggedInUser()){
    $auth = "auth.php";
    header("Location:" . site_url('auth.php'));
}



    // $id = $_GET['id'] ?? null;
    // $name = $_GET['upname'] ?? null;
    
    // var_dump(updateRecord($id,$name));







include "tpl/tpl-categories.php";