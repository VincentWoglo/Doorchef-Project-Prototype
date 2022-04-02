<?php

require("navbar.php");
include_once("PHP/db_conn.php");
$url_title = $_GET['title'];
$url_id = $_GET['id'];
$url_seller = $_GET['seller'];
if (!$url_title && $url_seller && $url_id) {
 header("Location: home.php");
}
$query = $conn->prepare('SELECT * FROM products WHERE id =:id AND title = :url_title AND soldby = :url_seller');
$query ->execute(array(
  ':id' => $url_id,
  ':url_title' => $url_title,
  ':url_seller' => $url_seller
));
if (!$query) {
  die();
}else{
  $row = $query->fetch();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?=$row['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="stylesheet" href="css/product.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="whole">
      <img src="image/<?=$row['image'];?>" class="image" alt="">
      <div class="title-info">
        <p class="title"><?=$row['title'];?></p>
        <p class="location"><?=$row['city'];?>, <?=$row['state'];?></p>
        <p class="soldby">Sold by:</p>
        <p class="soldby-name"><?=$row['soldby'];?></p>
      </div>
      <div class="rest">

        <div class="sub-whole">

<div class="desc">
  <p class="description-title">Description</p>
  <hr class="red-hr">
  <p class="description"><?=$row['description'];?></p>
</div>
<!--select from chefs db based on seller-->
<?php
$select = $conn->prepare('SELECT * FROM chefs WHERE email = ?');
$select -> execute([$url_seller]);
if ($select) {
$search = $select->fetch();
}else{
  echo "There was a problem displaying the user's information";
}
?>
<div class="about-seller">
  <p class="about-sellers">About Seller</p>
  <hr class="red-hr">
  <p class="seller-name"><i class="far fa-user-circle" id="seller-name" aria-hidden="true"></i><?=$search['firstname'];?> <?=$search['lastname'];?></p>
  <p class="seller-number"><i class="fas fa-phone-alt" id="seller-number"></i>303-341-1043</p>
  <p class="seller-email"><i class="far fa-envelope-open" id="seller-email"></i><?=$search['email'];?></p>
  <p><i class="far fa-map" aria-hidden="true" id="seller-location"></i><?=$search['city'];?>, <?=$search['state'];?></p>
  <p><i class="fas fa-school" id="seller-school"></i><?=$search['education'];?></p>
  <p><i class="fas fa-birthday-cake" id="seller-birth"></i><?=$search['birth'];?></p>
  <p><i class="fas fa-tags" id="seller-price"></i><?=$search['price'];?>/hour</p>
</div>
<!--<div class="comments">-->
<?php
/*if (isset($_POST['post_comment'])) {
  $comment = $_REQUEST['comment'];
  if (empty($comment)) {
    echo "Please complete empty field";echo "<br>";
  }
  //elseif(){
//if chef, they will not be allowed to comment
  //}
  elseif(!$_SESSION['users']){

     header('Location: https://'.$_SERVER['HTTP_HOST']. '/DoorChef2.0/signin.php');
  }
  else{

  }
}*/
?>
<!--<form method="POST">
  <textarea name="comment" class="comment-box"rows="8" cols="80"></textarea>
  <input type="submit" class="comment-Btn" name="post_comment" value="Post Comment">
</form>
  <p class="reviews">Review</p>
  <hr class="red-hr">
  <div class="show-comments">
    <p class="user-comment">Vincent Woglo</p>
    <p class="comment-date">February 21, 2020 at 12:01 pm</p>
    <p class="act-comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
  </div>
  <p class="see-all">See all comments</p>
</div>
      </div>
    </div>-->
    <!--select from db based on food type
  <div class="related-item">
      <p class="related">Related Listings</p>
      <hr class="red-hr-">
      <p class="sub-related">Listings you may like</p>
  <?php
  /* $r_query = $conn -> prepare("SELECT * FROM products WHERE foodtype = ? LIMIT 2");
   $r_query -> execute([$row['foodtype']]);

   while ($r_rows = $r_query->fetch()) {?>

      <div class="products">

        <input type="submit" name="" class="list-getorder"value="Get Order">
        <img src="image/<?=$r_rows['image'];?>" class="list-img"alt=""><br>
      <div class="list">
        <input type="submit" name="" class="list-foodtype" value="<?=$r_rows['foodtype'];?>">
        <p class="list-price">$<?=$r_rows['price'];?>.00</p>
         <a href="product.php?title=<?php echo $r_rows['title'];?>&& id=<?php echo $r_rows['id'];?>&&seller=<?php echo $r_rows['soldby'];?>"><p class="list-title"><?=$r_rows['title'];?></a></p>
        <p class="list-location"><i class="far fa-map"></i> <?=$r_rows['city'];?>, <?=$r_rows['state'];?></p>
        <p class="list-soldby">Soldby:</p><p class="list-solby-name"><?=$r_rows['soldby'];?></p>
      </div>

      </div>

      <? }*/
   ?>
    </div>
  </div>
  </body>
</html>
