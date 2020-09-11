<?php
	session_start();
	require_once("functions.inc.php");

	if (isset($_POST["login"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];

		if (canLogin($email, $password)) {
			require_once("database/connection.php");

			$password = pwHash($password);
			$email = $conn->real_escape_string($email);

			$sql = "SELECT * FROM users 
					WHERE email = '$email' 
					AND password = '$password'";
			$result = mysqli_query($conn, $sql);

			if ($result->num_rows > 0) {
				while($row = mysqli_fetch_assoc($result)) {
			        $_SESSION["user"] = $row["email"];
			    }
			    header("Location: index.php");
			} else {
				$_SESSION["errors"] .= "<li>Your email or password is invalid!</li>";
			}

			require_once("database/endConnection.php");
		}
	}
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
		<h1>Log in</h1>
		<div class="loginfb"></div>
		<div class="linel"></div>
		<div class="liner"></div>
		<div id="form">
			<form method="post" action>
				<input name="email" placeholder="Email" type="email" required autofocus /><input name="password" placeholder="Password" type="password" required />
				<h5>
					Remember
				</h5>
				<input class="btn-toggle btn-toggle-round" id="btn-toggle-1" name="remember" type="checkbox" /><label for="btn-toggle-1"></label><input name="login" type="submit" value="Log in" />
			</form>
		</div>
		<div id="footer">
			<a href="register.php">Sign Up</a><br /><a href="#">Forgot Password?</a>
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