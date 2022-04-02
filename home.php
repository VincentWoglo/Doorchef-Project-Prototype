<?php
require("navbar.php");
include_once("PHP/db_conn.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <title>DoorChef</title>
  </head>
  <body>
    <div class="whole">
      <div class="container">
      <?php
      session_start();
//$s = $conn -> prepare("SELECT * FROM users WHERE email = :email ");
//$s -> execute([$_SESSION['users']]);
//$r = $s->fetch();
//echo $r['email'];

$select = $conn ->prepare("SELECT * FROM products LIMIT 12");
$select ->execute();

while ($row=$select->fetch()){?>
      <div class="products">

        <a href="product.php?title=<?php echo $row['title'];?>&& id=<?php echo $row['id'];?>&&seller=<?php echo $row['soldby'];?>"><input type="submit" name="" class="list-getorder"value="Get Order"></a>
        <img src="image/<?=$row['image'];?>" class="list-img"alt=""><br>
      <div class="list">
        <input type="submit" name="" class="list-foodtype" value="<?=$row['foodtype'];?>">
        <p class="list-price">$<?=$row['price'];?>.00</p>
        <a href="product.php?title=<?php echo $row['title'];?>&& id=<?php echo $row['id'];?>&&seller=<?php echo $row['soldby'];?>"><p class="list-title"><?=$row['title'];?></a></p>
        <p class="list-description"><?=$row['description'];?></p>
        <p class="list-location"><i class="far fa-map"></i> <?=$row['city'];?>, <?=$row['state'];?></p>
        <p class="list-soldby">Soldby:</p><p class="list-solby-name"><?=$row['soldby'];?></p>
      </div>
      </div>
<?php }?>
</div>
    </div>
  </div>
  </body>
</html>
