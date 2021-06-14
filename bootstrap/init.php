<?php
session_start();

include   "config.php";
include   "constant.php";

# The Connection
try {
  $pdo = new PDO("mysql:dbname=$dbname;host=$host", $user, $pass);
  // echo "success" . '<br>';
} catch (PDOException $e) {
  die('Connection failed: ' . $e->getMessage());
}


# The Functions
include  BASE_PATH . 'vendor/autoload.php' ;
include  BASE_PATH . 'sending-mail/sending-mail.php' ;
include  BASE_PATH . 'libs/task-test.php' ;
include  BASE_PATH . 'libs/tpl-tasks.php' ;
include  BASE_PATH . 'libs/User&Admin-tasks.php' ;
include  BASE_PATH . 'blogger/blog_libs/blog-tasks.php' ;


# Log out the Admin Panel
$action = $_GET['action'] ?? null;
 if($action == 'signout') {
    logOut();
}

