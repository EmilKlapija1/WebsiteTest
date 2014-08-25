<?php

session_start();

$exceptions = array('register' , 'signin');

$page_exp = explode('/', $_SERVER['SCRIPT_NAME']);
$page = substr(end($page_exp), 0, -4);

if (in_array($page, $exceptions) === false){

	if(isset($_SESSION['username'])=== false){
		header('Location: index.php');
		die();
	}
}

$link = mysqli_connect('localhost','root','','websitetest');
$db  = mysqli_select_db($link, 'websitetest');
$path = dirname(__FILE__);
include("{$path}/inc/user.inc.php");

?>