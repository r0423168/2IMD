<?php
	require_once("classes/User.class.php");

	if (!empty($_POST)) {
		$user = new User();
		$user->setEmail($_POST["email"]);
		$user->setPassword($_POST["password"]);
		$user->setPasswordConf($_POST["password_confirmation"]);

		if ($user->register()) {
			session_start();
			$_SESSION["email"] = $user->getEmail();
			header("Location: index.php");
		}
	}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>IMDFlix</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="netflixLogin netflixLogin--register">
		<div class="form form--login">
			<form action="" method="post">
				<h2 form__title>Sign up for an account</h2>

				<div class="form__error hidden">
					<p>
						Some error here
					</p>
				</div>

				<div class="form__field">
					<label for="email">Email</label>
					<input type="text" id="email" name="email">
				</div>
				<div class="form__field">
					<label for="password">Password</label>
					<input type="password" id="password" name="password">
				</div>

                <div class="form__field">
					<label for="password_confirmation">Confirm your password</label>
					<input type="password" id="password_confirmation" name="password_confirmation">
				</div>

				<div class="form__field">
					<input type="submit" value="Sign me up!" class="btn btn--primary">	
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		$("#email").keyup(function() {
			var email = $(this).val();

			$.ajax({
				method: "POST",
				url: "ajax/email_validation.php",
				data: {email: email},
				dataType: "json"
			}).done(function(res) {
				if (res.status == "fail") {
					$(".form__error").text(res.message);
					$(".form__error").fadeIn();
				} else {
					$(".form__error").fadeOut();
				}
			});
		});
	</script>
</body>
</html>