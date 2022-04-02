<?php
require("navbar.php");
error_reporting(0);
if($_SESSION['users']){
  header('Location: https://'.$_SERVER['HTTP_HOST']. '/DoorChef3.0/home.php');
}else{
}?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="css/signin.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title>Log in - DoorChef</title>
  </head>
  <body>
    <div class="whole">
      <p class="welcome">Sign in</p>
      <div id="error"></div>
      <form id="form" class="" method="POST">
            <input type="email" name="email" class="email" placeholder="Email" value=""><br>
                <input type="password" name="password" class="password" placeholder="Password" value=""><br>
                <input type="submit" name="signin" id="signin" class="signin" value="Sign In">
      </form>
    </div>
  </body>
</html>
<script>
  $('document').ready(function(){
    $('#signin').click(function(e){
        $.ajax({
          type: "POST",
          url: "login.php",
          data: $('#form').serialize(),
          success: function (a){
            $('#error').html(a)
            if(!a){
            location.href = 'home.php'
            }else{
              
            }
          } 
        })
            e.preventDefault();
    })
  })
</script>
