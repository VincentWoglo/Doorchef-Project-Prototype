<?php
session_start();
error_reporting(1);
session_start();
include_once("PHP/db_conn.php");
$error = array();
if($_SERVER['REQUEST_METHOD'] =='POST'){

    $email= s($_REQUEST['email']);
    $password = s($_REQUEST['password']);
    if (empty($email)) {
        array_push($error, "Your email can not be left empty");
    }
    if (empty($password)) {
        array_push($error, "Your password can not be left empty");
    }
      $query = $conn-> prepare("SELECT * FROM users WHERE email = :email");
      $query -> execute(array(
        ':email'=>$email));
      $result =$query -> fetch();
      $db_password = password_verify($password , $result['password']);

    if (count($error)>0) {
      foreach ($error as $key) {
              echo "<div class='error_reporting'>$key</div>";
      }
    }
    else if($query -> rowCount()<0){
        echo "User doesn't exist";
      }
      else{
        if($email = $result['email'] && $password = $db_password){

          session_regenerate_id(true);
         $_SESSION['users'] = $email;
         if($_SESSION['users']){

         }else{

         }
        }else{
          echo "Please check our email or password";
        }
      }
}


?>