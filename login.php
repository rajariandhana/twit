<?php 

session_start();
$message = "";
	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$email = $_POST['email'];
		$password = $_POST['password'];

		if(!empty($email) && !empty($password))
		{
			//read from database
			$query = "select * from user where email = '$email' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['pass'] == $password)
					{
						$_SESSION['ID'] = $user_data['ID'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			$message = "wrong username or password!";
		}else
		{
			$message = "Please enter valid information!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<div>
		halaman login
		<form method="post">
			<p><?php echo $message; ?></p>
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="email" name="email"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>