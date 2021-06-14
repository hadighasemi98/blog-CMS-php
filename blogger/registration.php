<?php
include "../bootstrap/init.php" ;

MESSAGE;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    $params = $_POST;

    if ($action == 'register') {

      // Validation For FullName
      // $pattern_fN = "/^[a-zA-Z0-9 ]{3,20}$/";
        $fullName = $_POST['fullName'];

        if (strlen($fullName) < 3 ) {
            $errorFN="It must be at least 3 character And space allowed ";

        }else
        {
            // If Full Name Already exist
            $count = already_exist("usertable","fullName", $fullName);
            if ($count == 1) {
                $errorFN=("Full Name Already exist . Choose another one !");
            }
        }

        // Validation For emailAddress
        $pattern_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/";
        $emailAddress = $_POST['emailAddress'];

        if (!preg_match($pattern_email, $emailAddress)) {

            $errorEmail=("Invalid format of email ");
        } else 
        {
            // If E-mail Already exist
            $count = already_exist("usertable","emailAddress", $emailAddress);
            if ($count == 1) {
                $errorEmail=("ایمیل وارد شده تکراری میباشد . لطفا ایمیل جدید وارد کنید");
            }
        } 
        
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
                <a href='{$blog_url}activation-email.php?eid={$email}&token={$token}'> Click here to Verify </a>
            ";
        
            
        // Validation For password
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if ($password == $confirm_password) {
            $pattern_up = "/^.*(?=.{4,56})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
            if (!preg_match($pattern_up, $password)) {
                $errorPass = "Must be at lest 4 character long, 1 upper case, 1 lower case letter and 1 number exist";
            }
        } else 
        {
            $errorPass = "Password dosen't matched";
        }

        // Validation For Captcha
        
        $response_key = $_POST['g-recaptcha-response'];
        recaptcha($response_key);

        if (!($response_key)) {
            $errorCaptcha = "Wrong captcha! Please Try again ";
        }

        

        // Success & Register
        if (!isset($errorFN) && !isset($errorEmail) && !isset($errorPass) && !isset($errorCaptcha) && $mail->send()) {
            $result = register($fullName, $password, $emailAddress);
        }

        // Clear the sign-up form
        if($result ?? null){
            unset($fullName);
	        unset($emailAddress);
        }
    }
    
}

include "tpl/tpl-registration.php" ;

?>
<?php if($result){ ?>
<script>
Swal.fire({
  icon: 'success',
  title: 'Sign-up SuccessFull !',
  text: 'خوش آمدید <?php echo $_POST['fullName']; ?> . لطفا ایمیل خود را چک کنید و حساب خود را فعال کنید',
  footer: '<a href="login.php" >? ورود به سایت  </a>'
});
</script> 
<?php } ?> 