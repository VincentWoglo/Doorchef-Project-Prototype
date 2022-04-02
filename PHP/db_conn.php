<?php
require("PHP/function.php");
//use PDO for connection
	$localhost = s("localhost");
	$dbname = s("DoorChef");
	$username = s("root");
	$password = s("");
	try{
	$conn = new PDO('mysql:host=localhost;dbname=id12568507_doorchef',$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e){
	//echo "Failed to connect:" .$e->getMessage();
	echo "Failed to connect";
}
//check if there is a (secure) connection 

//if there is no secure connection redirect user to 404.php

//check for potential redirect loop wholes

//prevent sql injection and other type. load in the function.php to help secure

//check for user authorization and such

 ?>