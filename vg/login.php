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
	<link rel="stylesheet" href="template.css">
</head>
<body>
	<h1>Judito</h1>
	<div class="formbox">
		<h2>Welcome</h2>
		<?php if(!empty($message)) {echo "<div id='alert'>$message</div>";}?>
		<form method="post">
			<input id="text" type="email" name="email" placeholder="email">
			<input id="text" type="password" name="password" placeholder="password">
			<input id="button" type="submit" value="Login">
			<a href="signup.php">Create account</a>
		</form>
	</div>
</body>
</html>