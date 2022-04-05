<?php
include_once("PHP/db_conn.php");
 require('navbar.php');
if ($_SERVER['REQUEST_METHOD']=='POST') {
$search = $_REQUEST['search'];
$query = $conn ->prepare("SELECT * FROM products WHERE title LIKE '%".$search."%' OR foodtype LIKE '%".$search."%' OR description LIKE '%".$search."%' OR city LIKE '%".$search."%'  OR state LIKE '%".$search."%'");
$query -> execute();
}else{
  if (empty($_POST['search'])) {

  echo "PLEASE SEARCH SOMETHING";
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/search.css?v=<?php echo time();?>">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <div class="whole">
        <div class="results">
            <p class="number-results">About <?php echo $query->rowCount();?> results for "<?=$search;?>"</p>

            <div class="container">

                <?php while($row = $query->fetch()){?>
                <div class="products">
                    <img src="./image/<?=$row['image'];?>" class="list-img" alt=""><br>
                    <div class="list">
                        <div class="pricing">
                            <span type="submit" name="" class="list-foodtype"><?=$row['foodtype'];?></span>
                            <p class="list-price">$<?=$row['price'];?>.00</p>
                        </div>
                        <a
                            href="product.php?title=<?php echo $row['title'];?>&& id=<?php echo $row['id'];?>&&seller=<?php echo $row['soldby'];?>">
                            <p class="list-title"><?=$row['title'];?>
                        </a></p>
                        <p class="list-description"><?=$row['description'];?></p>
                        <div class="sold-by">
                        <p class="list-soldby">Soldby:</p>
                        <p class="list-solby-name"><?=$row['soldby'];?></p>
                        </div>
                        <a
                            href="product.php?title=<?php echo $row['title'];?>&& id=<?php echo $row['id'];?>&&seller=<?php echo $row['soldby'];?>"><input
                                type="submit" name="" class="list-getorder" value="Get Order"></a>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    </div>
</body>

</html>