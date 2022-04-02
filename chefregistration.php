<?php
error_reporting(0);
session_set_cookie_params(time()*2,'/','localhost',false,true);
session_start(time()*2,'/','localhost',false,true);
require("navbar.php");
include_once("PHP/db_conn.php");
$error = array();
if($_SERVER['REQUEST_METHOD'] =="POST"){
    $firstname = s($_REQUEST['firstname']);
    $lastname = s($_REQUEST['lastname']);
    $email= s($_REQUEST['email']);
    $username_user = s($_REQUEST['username']);
    $password = s($_REQUEST['password']);
    $checkbox = s($_REQUEST['checkbox']);
    //checking if all fields are not empty
    if(empty($firstname)){
        array_push($error, "Your first name can not be left empty");
    }
    if(empty($lastname)){
        array_push($error, "Your last name can not be left empty");

    }
    if(empty($username_user)){
        array_push($error, "Your username can not be left empty");

    }
     if(empty($email)){
        array_push($error, "Your username can not be left empty");

    } if(empty($password)){
        array_push($error, "Your password can not be left empty");
    }
    if(count($error)>0){
            foreach ($error as $key) {

              echo "<div class='error_reporting'>$key</div>";
            }
    }
    else if($already['email'] == $email){
        echo "User already exist";
      }
    else{

     $stmt = $conn -> prepare("SELECT * FROM users WHERE email = ?");
     $stmt->execute([$email]);
     if($stmt->rowCount()>0){
      echo "User already exist";
     }else{
      // insert user info into database

    $password = s(password_hash($_REQUEST['password'], PASSWORD_BCRYPT, array(
      'cost' => 12
    )));
      $insert = 'INSERT INTO users(sessionid, firstname, lastname, password, email, agreement, username) VALUES (:sessionid,:firstname,:lastname,:password,:email,:agreement,:username)';
      $query = $conn->prepare($insert);
        $query->execute(array(
          ':sessionid' => $email,
          ':firstname' => $firstname,
          ':lastname' => $lastname,
          ':password'=> $password,
          ':email' => $email,
          ':agreement' => $firstname,
          ':username' => $username_user
        ));
        if ($query) {
       $_SESSION['unlisted']=$email;
       if($_SESSION['unlisted']){
        header('Location: https://'.$_SERVER['HTTP_HOST']. '/DoorChef2.0/home.php');
       }else{

       }

        }else{
          echo "There was a problem registering";
        }


  }

   }

}
?>
