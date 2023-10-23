<?php 
session_start();
$message = "";
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($name) && !empty($email) && !empty($password))
		{
			$query1 = "SELECT * FROM user WHERE email = '$email'";
			$result1 = $con->query($query1);

			if($result1->num_rows > 0)
			{
				// echo "<script> alert('Email is already taken'); </script>";
				// echo "<p>Email is already taken!</p>";
				$message = "Email is already taken!";
			}
			else
			{
				//save to database
				$query2 = "insert into user (name,email,pass) values ('$name,$email','$password')";
				mysqli_query($con, $query2);
				header("Location: login.php");
				die;
			}
		}else
		{
			// echo "<script> alert('Please enter valid information'); </script>";
			// echo "<p>Please enter valid information!</p>";
			$message = "Please enter valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>
	<div>
		<form method="post">
			Signup
			<p><?php echo $message; ?></p>
			<input id="text" type="text" name="name"><br><br>
			<input id="text" type="email" name="email"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>