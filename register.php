
<?php

include('core/init.inc.php');

$errors = array();

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
	$asd = user_exists($_POST['username']);
	if ($asd) {
		var_dump($asd);
		$errors[] = 'Korisnicko ime vec postoji';
	}

	if (empty($errors)){
		print_r($_POST);
		add_user($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['age'], $_POST['gender'], $_POST['number'], $_POST['username'], $_POST['password']);

		$_SESSION['username'] = htmlentities($_POST['username']);

		header('Location: protected.php');
		die();
	}
}
?>

<html>
<head>
<title> Registration Form </title>
<link media="all" type="text/css" rel="stylesheet" href="ext/css/style.css">\<link media="all" type="text/css" rel="stylesheet" href="ext/css/demo.css">
<link media="all" type="text/css" rel="stylesheet" href="ext/css/font-awesome.css">
	<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			body {
				background: #563c55 url(ext/img/blurred.jpg) no-repeat center top;
				-webkit-background-size: cover;
				-moz-background-size: cover;
				background-size: cover;
			}
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
	</style>
</head>
<body>
<div>
<?php

if (empty($errors) == false){
	?>
	<ul style="color: white">
		<?php
	foreach ($errors as $error) {
		echo "<li>{$error}</li>";
	}
		?>
</ul>
<?php
}

?>
</div>

<div class="registration_form2">
	<section class = "main">
		<label style="color: white;">Title here</label>
		<div class="form-3">	
	<form method="post" action="">
		<label for="login">Ime</label>
		<input type="text" placeholder="Ime" value="<?php if(isset($_POST['name'])) echo htmlentities($_POST['name']); ?>" name="name"/><br/>
		<label for="login">Prezime</label>
		<input type="text" placeholder="Prezime" value="<?php if(isset($_POST['surname'])) echo htmlentities($_POST['surname']); ?>" name="surname"/><br/>
		<label for="login">Email</label>
		<input type="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlentities($_POST['email']); ?>" name="email"/><br/>
		<label for="login">Godine</label>
		<input type="text" placeholder="Godine" value="<?php if(isset($_POST['age'])) echo htmlentities($_POST['age']); ?>" name="age"/><br/>
	    <label for="login">Spol</label>
	    <input type="text" placeholder="Spol" value="<?php if(isset($_POST['gender'])) echo htmlentities($_POST['gender']); ?>" name="gender"/><br/>
		<label for="login">Broj</label>
		<input type="text" placeholder="Broj" value="<?php if(isset($_POST['number'])) echo htmlentities($_POST['number']); ?>" name="number"/><br/>
		<label for="login">Korisnicko Ime</label>
		<input type="text" placeholder="Korisnicko Ime" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" name="username"/><br/> 
		<label for="login">Lozinka</label>
		<input type="password" placeholder="Lozinka" value="<?php if(isset($_POST['password'])) echo htmlentities($_POST['password']); ?>" name="password"/><br/>
		<label for="login">Ponovi Lozinku</label>
		<input type="password" placeholder="Ponovi Lozinku" value="<?php if(isset($_POST['password'])) echo htmlentities($_POST['password']); ?>" name="repeat_password"/><br/>
		<br/>
		<input type="submit" value="Zavrsi"/>
	</form>
	</div>
	</section>
</div>

</body>
</html>