<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="template.css">
	<link rel="stylesheet" href="index.css">
</head>
<body>
	
	<!-- <div class="options"> -->
	<div class="bar">
		<a href="postit.php">+ Post It</a>
		<a href="index.php"><h1>Judito</h1></a>
		<a href="account.php"><?php echo $user_data['name']; ?></a>
	</div>
	
		
		<!-- </div> -->
</body>
</html>