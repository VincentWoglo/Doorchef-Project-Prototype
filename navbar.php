<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/c146f848ba.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
        <script type="text/javascript">
        $(document).ready(function(){
          $('#drop-down').click(function(){
            $('#drop').toggle();
          });
        });
        </script>
    <link rel="stylesheet" href="css/navbar.css">
  </head>
  <body>
    <div class="nav">
      <form class="searching" action="search.php" method="post">
    <a href="home.php">  <p class="logo">DoorChef</p></a>
        <input type="text" class="search" name="search" placeholder="Search chef,food or location"><!--<input type="submit" class="searchBtn" name="" value="Search">-->

        <ul class="right-menu">
          <li class="help"><i class="far fa-question-circle" id="help"></i></li>
       <li class="profile">  <a href="profile.php"> <i class="far fa-user-circle" id="profile"></a></i></li>
          <div class="drop">
          <li class="sort-down"><i class="fas fa-sort-down" id="drop-down"></i></li>
          <div id="drop"class="dropdown">
            <?php

            error_reporting(0);
            session_start();
            if (!$_SESSION['users']) {
              echo "
              <a href='logout.php'> <li class='dashboard-nav'>Sign in</a></li>
                  ";
            }
            elseif ($_SESSION['users']) {

                echo "<li class='dashboard-nav'>Dashboard</li>
              <a href='logout.php'><li class='logout-nav'>Log Out</a></li>
                                          ";

            }else{

            }
?>
          </div>
          </div>
        </ul>
      </form>
    </div>
  </body>
</html>
