<?php
error_reporting(0);
session_start();
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
       $_SESSION['users']=$email;
       if($_SESSION['users']){
        header('Location: https://'.$_SERVER['HTTP_HOST']. '/DoorChef3.0/home.php');
       }else{

       }

        }else{
          echo "There was a problem registering";
        }


  }

   }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/signup.css">
  </head>
  <body>
    <div class="whole">
    <div class="right">
      <p class="welcome">Create a free DoorChef account</p>
      <form class="" method="post">
        <input type="text" name="firstname"  class="firstname" placeholder="First name" value="<?=$firstname;?>"><br>
          <input type="text" name="lastname" class="lastname" placeholder="Last name" value="<?=$lastname;?>"><br>
            <input type="email" name="email" class="email" placeholder="Email" value="<?=$email;?>"><br>
              <input type="text" name="username" class="username" placeholder="Username" value="<?=$username_user;?>"><br>
                <input type="password" name="password" class="password" placeholder="Password" value="<?=$password;?>"><br>
                <input type="checkbox" name="checkbox" class="check" value=""><p class="terms">By checking this button, you agree to our terms of use</p>
                <input type="submit" name="signup" class="signup" value="Sign Up">
      </form>
    </div>
  </div>
  </body>
</html>
