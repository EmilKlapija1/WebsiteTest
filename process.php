<html>
<head>
<title> Here is a title </title>
</head>
<body>

<?php
	$user_ip = $_SERVER['REMOTE_ADDR'];

	$name = $_POST ["name"];
	echo 'Hello,' . $name;

	
	function get_ip() {
	
		global $user_ip;
		$string = 'Your IP is: '. $user_ip;
		
	}
	
	get_ip();
	
?>

</body>
</html>