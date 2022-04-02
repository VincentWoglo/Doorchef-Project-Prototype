<?php
error_reporting(1);
session_start();
 require('navbar.php');
   include_once("PHP/db_conn.php");
 if (isset($_POST['register'])) {
       $firstname = s($_REQUEST['firstname']);
       $lastname = s($_REQUEST['lastname']);
       $email= s($_REQUEST['email']);
       $username_user = s($_REQUEST['username']);
       $password = s($_REQUEST['password']);
       $re_password = s($_REQUEST['re_password']);
       $checkbox = s($_REQUEST['checkbox']);
       $gender = $_REQUEST['gender'];
       $job = $_REQUEST['job'];
       $price = $_REQUEST['price'];
       $country = $_REQUEST['country'];
       $description = $_REQUEST['description'];
       if (empty($firstname) || empty($lastname) || empty($email) || empty($username_user) ||
        empty($password) || empty($re_password)||empty($gender) || empty($job)||empty($price) ||
         empty($country)||empty($description || empty($checkbox))) {
         echo "Please complete all empty fields";
       }else{

       }
 }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/chefregis.css">
  </head>
  <body>
    <div class="whole">
      <p class="header-title">Create a free chef account!</p>
      <form class="" method="post">
        <input type="text" name="" class="firstname" placeholder="First name" value="<?=$firstname;?>">
          <input type="text" name="" class="lastname"placeholder="Last name" value="<?=$lastname;?>"><br>
            <input type="text" name="" class="email"placeholder="E-mail" value="<?=$email;?>"><br>
              <input type="text" name="" class="password" placeholder="Password" value="<?=$password;?>">
                <input type="text" name="" class="re_password"placeholder="Re-password" value="<?=$re_password;?>"><br>
                  <input type="text" name="" class="username"placeholder="Username" value="<?=$username_user;?>"><br>
                    <select class="gender" name="">
                      <option value="">Gender</option>
                      <option value="">Female</option>
                      <option value="">Male</option>
                    </select>
                              <select class="country" name="">
                                <option value="">Country</option>
                                <option value="">United State</option>
                              </select><br>
                                  <input type="text" name="" class="job" placeholder="Job Position" value="<?=$job?>">
                                    <select value="" class="price">
                                      <option value="">$5</option>
                                      <option value="">$10</option>
                                      <option value="">$15</option>
                                      <option value="">$20</option>
                                      <option value="">$25</option>
                                      <option value="">$30</option>
                                      <option value="">$35</option>
                                      <option value="">$40</option>
                                      <option value="">$45</option>
                                      <option value="">$50</option>
                                      <option value="">$55</option>
                                      <option value="">$60</option>
                                    </select> <br>
                                        <textarea name="name" class="description" placeholder="Description"></textarea><br>
                                        <p>Upload your resume to apply</p>
                                        <input type="file" name="" value=""><br>
                                        <input type="checkbox" class="agreementn" name="" value="">
                                        <p class="agreed">By clicking sign up, you have agree that you've read our chef Terms Of Use and Privacy Policy</p><br>
                                        <input type="submit" name="register" class="register"value="Register">
      </form>
    </div>
  </body>
</html>
