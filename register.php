
<?php

include('core/init.inc.php');

if (isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['age'],
		  $_POST['gender'], $_POST['number'], $_POST['username'], $_POST['password'],
	  $_POST['repeat_password'])){

	if (empty($_POST['name'])){
		$errors[] = 'Molim Vas unesite Vase ime.';
	}
	if (empty($_POST['surname'])){
		$errors[] = 'Molim Vas unesite Vase prezime.';
	}
	if (empty($_POST['email'])){
		$errors[] = 'Molim Vas unesite Vasu email adresu.';
	}
	if (empty($_POST['age'])){
		$errors[] = 'Molim Vas unesite Vasu dob.';
	}
	if (empty($_POST['gender'])){
		$errors[] = 'Molim Vas unesite Vas spol.';
	}
	if (empty($_POST['number'])){
		$errors[] = 'Molim Vas unesite Vas broj.';
	}
	if (empty($_POST['username'])){
		$errors[] = 'Molim Vas unesite Vase korisnicko ime.';
	}
	if (empty($_POST['password'])){
		$errors[] = 'Molim Vas unesite Vas password.';
	}
	if (empty($_POST['repeat_password'])){
		$errors[] = 'Molim Vas ponovite Vas password.';
	}

	if ($_POST['password'] !== $_POST['repeat_password']) {
		$errors[] = 'Dva pasvorda se ne poklapaju';
	}
	if (user_exists($_POST['username'])) {
		$errors[] = 'Korisnicko ime se vec koristi';
	}

	if (empty($errors) === true){
		add_user($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['age'],
			     $_POST['gender'], $_POST['number'], $_POST['username'], $_POST['password']);

		$_SESSION['username'] = htmlentities($_POST['username']);

		header('Location: protected.php');
		die();
	}
}
?>

<html>
<head>
<title> Registration Form </title>
<link media="all" type="text/css" rel="stylesheet" href="ext/css/style.css">
</head>
<body>
<?php

print_r(($_POST));

if (empty($errors) === false){
	?>
	<ul>
		<?php
	foreach ($errors as $errors => $value) {
		echo "<li>{$errors}</li>";
	}
?>
<ul>
<?php
}

?>
<div class="registration_form">

	
	<form method="post" action="">

		<input type="text" placeholder="Ime" value="" name="name"><br>
		<input type="text" placeholder="Prezime" value="" name="surname"><br>
		<input type="email" placeholder="Email" value="" name="email"><br>
	    <select name="age">
 			<option>10 - 15</option>
  			<option>15 - 20</option>
  			<option>20 - 25</option>
  			<option>25 - 30</option>
  			<option>35 - 40</option>
  			<option>40 - 45</option>
  			<option>45 - 50</option>
  			<option>50 - 55</option>
  			<option>60 - 65</option>
		</select><br>
	    <input type="radio" name="gender" value="Muski"> Muski
		<input type="radio" name="gender" value="Zenski"> Zenski <br>
		<input type="text" placeholder="Broj" value="" name="number"><br> 
		<input type="text" placeholder="Korisnicko Ime" value="" name="username"><br> 
		<input type="password" placeholder="Password" value="" name="password"><br>
		<input type="password" placeholder="Ponovi Password" value="" name="repeat_password"><br>
		<br>
		<input type="submit" value="Zavrsi" name="submit_btn" class="fp_buttons">

	</form>
</div>

</body>
</html>