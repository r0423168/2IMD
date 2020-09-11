<?php
	session_start();
	require_once("database/connection.php");
	require_once("functions.inc.php");

	if (isset($_POST["register"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$passwordConf = $_POST["password_conf"];

		if (canRegister($email, $password, $passwordConf)) {
			$password = pwHash($password);

			$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				header("Location: index.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
	require_once("database/endConnection.php");
?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div id="header">
		<div class="logo"></div>
	</div>
	<div id="main">
		<h1>Register</h1>
		<div class="loginfb"></div>
		<div class="linel"></div>
		<div class="liner"></div>
		<div id="form">
			<form method="post" action>
				<input name="email" placeholder="Email" type="email" required autofocus /><input name="password" placeholder="Password" type="password" required /><input name="password_conf" placeholder="Confirm Password" type="password" required />
				<h5>
					Remember
				</h5>
				<input class="btn-toggle btn-toggle-round" id="btn-toggle-1" name="remember" type="checkbox" /><label for="btn-toggle-1"></label><input name="register" type="submit" value="Register" />
			</form>
		</div>
		<div id="footer">
			<a href="login.php">Sign In</a><br /><a href="#">Forgot Password?</a>
		</div>
	</div>

	<?php 
		if (!empty($_SESSION["errors"])):
	?>
		<div class="user-messages-area">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<ul>
					<?php echo $_SESSION["errors"]; ?>
				</ul>
			</div>
		</div>
	<?php 
		endif; 
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>