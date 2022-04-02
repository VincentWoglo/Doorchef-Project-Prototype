<?php
require("db_conn.php");
$error = array();
if($_SERVER['REQUEST_METHOD'] =="POST"){
    $firstname = s($_REQUEST['firstname']);
    $lastname = s($_REQUEST['lastname']);
    $email= s($_REQUEST['email']);
    $username = s($_REQUEST['username']);
    $password = s($_REQUEST['password']);
    $checkbox = s($_REQUEST['checkbox']);
    //checking if all fields are not empty
    if(empty($firstname)){
        array_push($error, "Your first name can not be left empty");
    }
    if(empty($lastname)){
        array_push($error, "Your last name can not be left empty");

    }
    if(empty($username)){
        array_push($error, "Your username can not be left empty");

    } 
     if(empty($username)){
        array_push($error, "Your username can not be left empty");

    } if(empty($password)){
        array_push($error, "Your password can not be left empty");
    }

    if(empty($checkbox)){

        array_push($error, "Please agree to terms and policy to continue");
    }
    if(count($error)>0){
        foreach($error as $key){
            echo $key; echo "<br>";
            header("Location: signup.php?attempt=1");
            exit();
        }
    }

    elseif(strlen($password)>10){
        array_push($error, "Your password is less than 10 characters");
    }
    $attempt = $_GET['attempt'];
if ($attempt =1) {
  echo "string";
}else{
  
}
//checking if the user doesn't already exist
    /*
    $stmt = $conn -> prepare("SELECT * FROM users WHERE email = :email");
    $stmt ->bind(['email',$email]);
    $stmt->execute();
    if ($stmt) {
        echo "string";
    }else{
        echo "jked";
    }

*/

}
?>