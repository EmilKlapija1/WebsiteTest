<?php

include('core/init.inc.php');

$errors = array();

if(isset($_POST['username'], $_POST['password'])){

	if(empty($_POST['username'])){
		$errors[] = 'Korisnicko ime ne moze biti prazno';
	}
	if(empty($_POST['password'])){
		$errors[] = 'Password ne moze biti prazan';
	}

	if (valid_credentials($_POST['username'], $_POST['password']) == 0){
		$errors = 'Korisnicno ime i/ili password nisu tacni!';
	}

	if (empty($errors)) {
		$_SESSION['username'] = htmlentities($_POST['username']);

		header('Location: protected.php');
		die();
	}
	
}

?>

<html>
<head>
<link media="all" type="text/css" rel="stylesheet" href="ext/css/style.css">
<link media="all" type="text/css" rel="stylesheet" href="ext/css/demo.css">
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
	<ul style="color: white;">
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
<div class="registration_form">
	<section class = "main">
		<label style="color: white;">Title here</label>
		<div class="form-3">
			<form action="" method="post">
				<label for="login">Korisnicko ime</label>
				<input type="text" placeholder="Korisnicko ime" name="username" value="<?php if(isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" />
				 <label for="login">Password</label>
				<input type="password" placeholder="Lozinka" name="password" />
			    <p class="clearfix">
			        <input type="submit" name="submit" value="Login">
			    </p>
			</form>
		</div>
	</section>
</div>

</body>
</html>