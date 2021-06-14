<?php 

include "../bootstrap/init.php";



// Email Verification 

if (isset($_GET['eid']) && isset($_GET['token']) ){

    $email = urldecode(base64_decode($_GET['eid']));
    $validation_key = $_GET['token'];
    
        // Verify & Update Email
        global $pdo ;
        $sql = "UPDATE usertable SET is_active = 1 WHERE emailAddress = '$email' AND validation_key = '$validation_key'";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->rowCount();

        if ($result > 0) {
            echo" 
                <div class='alert alert-success' style=' text-align: center; width: 50%; margin-right: 23%; ' >
                 Email ($email) <strong> Verified SuccessFully.</strong>
                 You need to Login .<strong> <a href='login.php' > Click here . </a></strong>
                </div>";
        }
        else
        {

            // If Email Already Verified
            global $pdo ;
            $selectSql= "SELECT * FROM usertable WHERE emailAddress='$email' AND validation_key='$validation_key' ";
            $stmt1 = $pdo->prepare($selectSql);
            $stmt1->execute();
            $select_result = $stmt1->rowCount();

            if ($select_result == 1) {
               echo" 
                <div class='alert alert-info' style=' text-align: center; width: 50%; margin-right: 23%; ' >
                Email ($email) <strong> Already Verified .</strong><br>
                 You need to Login .<strong> <a href='login.php' > Click here . </a></strong>

                </div>";
            }
        }
    

}







include "tpl/tpl-index.php";