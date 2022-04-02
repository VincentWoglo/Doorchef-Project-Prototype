<?php
session_start();

unset($_SESSION['users']);
if (!isset($_SESSION['users'])) {
    header('Location: https://'.$_SERVER['HTTP_HOST']. '/DoorChef3.0/signin.php');
}else{
	die('There was a problem logging you out');
}
?>