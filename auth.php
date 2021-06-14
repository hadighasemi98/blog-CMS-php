<?php 
include "bootstrap/init.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    if ($action == 'login') {
        $result = loginAdmin($_POST['user_name'], $_POST['password']);

        if (!$result) {
            Messages("Error: email or password is Incorrect!");
        } else {
            header("Location:".site_url());
        }
    }
}




include "tpl/tpl-auth.php"; 
