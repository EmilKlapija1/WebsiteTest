<?php

// check if a given username exists 
function user_exists($username){

	$link = mysqli_connect('localhost','root','','websitetest');

	// sql injection protection
	$username = mysqli_real_escape_string($link, $username);

	// get the total number of rows where a given username exists
	$total = mysqli_query($link, "SELECT username
						   		  FROM users
						   		  WHERE username = '$username'");

	return mysqli_num_rows($total); /* pogledaj samo broj rezultata jer te zanima samo da li postoji user a ne da vrati rez;*/
}

// check if a given username and password combination is valid
function valid_credentials($username, $password){

	$link = mysqli_connect('localhost','root','','websitetest');

	// sql injection protection
	$username = mysqli_real_escape_string($link, $username);

	$total = mysqli_query($link, "SELECT username
						  FROM users 
						  WHERE username = '$username'
						  AND password = '$password'");

	return mysqli_num_rows($total);

}

// add a new user 
function add_user($name, $surname, $email, $age, $gender, $number, $username, $password){

	$link = mysqli_connect('localhost','root','','websitetest');

	// sql injection protection
	$username = mysqli_real_escape_string($link, htmlentities($username, ENT_QUOTES)); /* po defaultu nece konvertovati oba navodna znaka tako da ENT_QUOTES kodira i " i ' */
	$password = sha1($password); /* pogledaj Bcrypt hasiranje passworda sa salt-om ili sha512 */

	mysqli_query($link, "INSERT INTO users SET
				NAME = '$name',
				SURNAME = '$surname',
				EMAIL = '$email',
				AGE = '$age',
				GENDER = '$gender',
				NUMBER = '$number',
				USERNAME = '$username',
				PASSWORD = '$password'");

}

?>