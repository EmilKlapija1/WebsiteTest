<html>
<head>
<title> Here is a title </title>
</head>
<body>

<?php
include_once 'connection.php';
?>

<form method="post" action="">
	
	<input type="text" placeholder="Name here" required="required" value="" name="name"><br>
	<input type="text" placeholder="Surname here" required="required" value="" name="surname"><br> 
	<input type="email" placeholder="Username/email here" required="required" value="" name="username"><br>
	<input type="password" placeholder="Password here" required="required" value="" name="password"><br>
	<input type="submit" value="Register">

</form>

<?php



?>
</body>
</html>