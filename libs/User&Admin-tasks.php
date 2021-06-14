<?php defined('SITE_URL')  or die('Permision Denied !');


#================ Register & Login Users =================


function getUsers(){

  global $pdo ;
  $sql = "select * FROM `usertable`";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function register($fullName,$passHash,$emailAddress)
{
    global $pdo;

    $passHash = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO usertable (fullName,password,emailAddress,validation_key) 
            VALUE (:fullName,:password,:emailAddress,:validation_key) ";
            
    $stmt = $pdo->prepare($sql);
    global $token ;
    $stmt->execute([':fullName' => $fullName, ':password' => $passHash,
      ':emailAddress' => $emailAddress, ':validation_key' => $token]);
    return $stmt->rowCount();
}



function getUserByEmail($email){
  global $pdo;
  $sql = "SELECT * FROM `usertable` WHERE emailAddress = :email";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':email' => $email]);
  $records = $stmt->fetchAll(PDO::FETCH_OBJ);
  return $records[0] ?? null;
}

function getUserById($id){
  global $pdo;
  $sql = "SELECT * FROM `usertable` WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':id' => $id]);
  $records = $stmt->fetch(PDO::FETCH_ASSOC);
  return $records;
}


function login($email,$pass){
  $user = getUserByEmail($email);
  if(is_null($user)){
      return false;
  }
  #check the password
  if(password_verify($pass,$user->password)){
      # login is successfull

      $_SESSION['login'] = $user;
      return true;
  }
  return false;
}



// Admin

function registerAdmin($userdata){

  global $pdo;
  $passHash = password_hash($_POST['password']?? null,PASSWORD_BCRYPT);

    $sql = "INSERT INTO admins (full_name,user_name,email,password) VALUE (:full_name,:user_name,:email,:password) ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([ 
      ':full_name' => $userdata['full_name'] ?? null, ':user_name' => $userdata['user_name']?? null, 
      ':email'     => $userdata['email']?? null   , ':password'  => $passHash
    ]);
    return $stmt->rowCount();
}

function getAdmin(){
  global $pdo;
  $sql = "SELECT * FROM admins " ;
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $records = $stmt->fetchAll(PDO::FETCH_OBJ);
  return $records[0] ?? null ;
}

function getAdminByUserName($user_name){
  global $pdo;
  $sql = "SELECT * FROM admins where user_name = :user_name " ;
  $stmt = $pdo->prepare($sql);
  $stmt->execute([':user_name' => $user_name]);
  $records = $stmt->fetchAll(PDO::FETCH_OBJ);
  return $records[0] ?? null ;

}
function loginAdmin($user_name,$pass){

  $admin = getAdminByUserName($user_name);
  if(is_null($admin)){
    return false;
  }
    if(password_verify($pass,$admin->password)){

      $_SESSION['login'] = $admin;
      return true ;
    
    }
    return false;
}


function isLoggedInUser (){
  return isset($_SESSION['login']) ? true : false ;


}
function logOut (){
  unset ($_SESSION['login']) ;

}


#Update Admin info  

function updateAdmin($userData){
global $pdo;


$sql = "UPDATE `admins` SET `full_name`= :fullname ,`user_name`= :user_name ,`email`= :email WHERE id = 4";
$stmt = $pdo->prepare($sql);
$stmt->execute([':fullname'=>$userData['full_name'] , ':user_name' => $userData['user_name'] , ':email' => $userData['email']]);
return $stmt->rowCount();

}

function deleteUser($id){
  global $pdo;

  $sql = "DELETE FROM usertable WHERE id = $id";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $stmt->rowCount();


}

function updateUsers($fullName,$email,$pass,$avatar,$id){
global $pdo ;
$pass = password_hash($_POST['upPass'] , PASSWORD_BCRYPT);

$sql =  " UPDATE usertable SET fullName = :fullName , emailAddress = :email ,
          password=:pass ,Avatar =:avatar WHERE id=$id ";
$stmt = $pdo->prepare($sql );

$stmt->execute([':fullName' => $fullName,':email' => $email,':pass' => $pass,':avatar' => $avatar]);
$stmt->rowCount();
}
