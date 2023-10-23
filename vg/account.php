<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$newname = $_POST['newname'];
		$newpassword = $_POST['newpassword'];
        if(!empty($newname))
        {
            $query = "UPDATE user SET name = '$newname' WHERE ID = '{$user_data['ID']}'";
            $result = mysqli_query($con, $query);
        }
        if(!empty($newpassword))
        {
            $query = "UPDATE user SET pass = '$newpassword' WHERE ID = '{$user_data['ID']}'";
            $result = mysqli_query($con, $query);
        }
        header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Twit</title>
	<link rel="stylesheet" href="template.css">
    <link rel="stylesheet" href="account.css">
</head>
<body>
	<h1>This is the edit account page</h1>
	<div class="editcontainer">
		<!-- <?php echo "Hello, " . $user_data['name']; ?> -->
        <form method="post">
			<input id="text" type="text" name="newname" placeholder="change name">
			<input id="text" type="password" name="newpassword" placeholder="change password">
			<input id="button" type="submit" value="Save changes">
		</form>
		<a href="index.php">Back</a>
	</div>
</body>
</html>