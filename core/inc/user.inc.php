<?php

// check if a given username exists 
function user_exists($username){

	$link = mysqli_connect('localhost','root','','websitetest');

	// sql injection protection
	$username = mysqli_real_escape_string($link, $username);

	// get the total number of rows where a given username exists
	$total = mysqli_query($link, "SELECT COUNT('ID')
						   		  FROM users
						   		  WHERE username = '$username'");

	return (mysqli_fetch_assoc($total) == '1') ? true : false;
}

// check if a given username and password combination is valid
function valid_credentials($username, $password){

	// sql injection protection
	$username = mysql_real_escape_string($username);

	$total = mysql_query("SELECT COUNT('ID') 
						  FROM users 
						  WHERE username = '$username'
						  AND password = '$password'");

	return (mysql_result($total, 0) == '1') ? true : false;

}

// add a new user 
function add_user($name, $surname, $email, $age, $gender, $number, $username, $password){

	$link = mysqli_connect('localhost','root','','websitetest');

	// sql injection protection
	$username = mysqli_real_escape_string($link, htmlentities($username));
	$password = sha1($password);

	mysqli_query($link, "INSERT INTO users
				('NAME','SURNAME','EMAIL','AGE','GENDER','NUMBER','USERNAME','PASSWORD' ) 
			     VALUES
			    ('{$name}','{$surname}','{$email}','{$age}','{$gender}',
			      '{$number}','{$username}','{$password}')");

}

?>