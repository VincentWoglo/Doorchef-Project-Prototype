<?php
require('navbar.php');
include_once("PHP/db_conn.php");
$error = array();
if (isset($_POST['publish'])) {
  $target ="image/".basename($_FILES['image']['name']);
  $image = $_FILES['image']['name'];//validate the image
  $title = $_POST['title'];
  $foodtype = $_POST['foodtype'];
  $price = $_POST['price'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $description = $_POST['description'];
  if (empty($title)) {
    array_push($error, "Title is require");
  }
  if (empty($foodtype)) {
    array_push($error, "Food type is required");
  }
   if (empty($price)) {
    array_push($error, "Priceis required");
  }
   if (empty($city)) {
    array_push($error, "Your city is required");
  }
   if (empty($state)) {
    array_push($error, "Your state is required");
  }
   if (empty($description)) {
    array_push($error, "Description of your listing is required");
  }
  if (count($error)>0) {
    foreach ($error as $key) {
      echo $key;
    }
  }
  else{
     //insert data into the db
        $data = $conn->prepare("INSERT INTO products(title, city, state, price,foodtype, description,image,soldby) VALUES ('$title','$city','$state','$price','$foodtype','$description','$image','chef')" );
        $data -> execute();


            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
          echo 'Gig published successfully';
        }
        else{
           echo 'There was problem publishing your gig';
        }

  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Upload</title>

  <script defer src="image.js"></script>
    <link rel="stylesheet" href="css/upload.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="whole">
      <form class="" method="POST" enctype="multipart/form-data">


      <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<div class="file-upload">
  <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>

  <div class="image-upload-wrap">
    <input class="file-upload-input" name="image" type='file' onchange="readURL(this);" accept="image/*" required="" />
    <div class="drag-text">
      <h3>Drag and drop a file or select add Image</h3>
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" src="#" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>

    </div>
  </div>
    <input type="text" name="title" class="title"placeholder="What are you selling?" value="<?=$title;?>"><br>
    <select class="foodtype" name="foodtype">
      <option value="Food type">Food type</option>
      <option value="Vegan">Vegan</option>
        <option value="Pescaterian">Pescaterian</option>
          <option  value="Meat">Meat</option>
    </select>
    <select type="text" name="price" class="pricetag"placeholder="Price ex: $12">
      <option value="$0">$0</option>
      <option value="$5">$5</option>
    </select>
    <br>
    <input type="text" name="city" class="city"placeholder="City"><input type="text" name="state" class="state"placeholder="State">
    <textarea name="description" class="description"placeholder="Description"></textarea><br>
    <input type="checkbox" class="checkbox"name="agreement"><p class="termofuse">By posting, you confirm that this listing complies with DoorChef's
       Commerce Policies and all applicable laes. Learn More</p>
       <br>
    <input type="submit" name="publish" class="publish" value="Publish Gig">
  </form>
    </div>
  </body>
</html>
