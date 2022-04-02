<?php
include_once('PHP/register.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <title></title>
  </head>
  <body>
    <nav>
      <div class="logo">
        <p class="doorchef">DoorChef</p>
      </div>
      <ul class="right-menu">
        <li class="w">What We Do</li>
        <li class="login">Sign In</li>
        <input type="submit" name="" class="chef" value="Become A Chef">
      </ul>
    </nav>
    <div class="whole">
    <div class="left">
      <p class="hire">Hire a chef near you free of cost!</p>
      <p class="all-chef">All chefs on this site are all professionally certified</p>
      <input type="submit" name="" class="become" value="Become a chef">
    </div>
    <div class="right">
      <p class="welcome">Create a free DoorChef account</p>
      <form class="" method="post">
        <input type="text" name="firstname"  class="firstname" placeholder="First name"><br>
          <input type="text" name="lastname" class="lastname" placeholder="Last name"><br>
            <input type="email" name="email" class="email" placeholder="Email"><br>
              <input type="text" name="username" class="username" placeholder="Username"><br>
                <input type="password" name="password" class="password" placeholder="Password"><br>
                <input type="checkbox" name="checkbox" class="check" value=""><p class="terms">By checking this button, you agree to our terms of use</p>
                <input type="submit" name="signup" class="signup" value="Sign Up">
      </form>
    </div>
  </div>
  </body>
</html>
