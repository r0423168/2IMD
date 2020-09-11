<?php
	/* VALIDATE REGISTER FORM */
	function canRegister($email, $pw1, $pw2) {
		$_SESSION["errors"] = "";

		if (!emptyFields($email, $pw1, $pw2)) {
			$_SESSION["errors"] .= "<li>All fields are required to fill in!</li>";
		}

		if (!validEmail($email)) {
			$_SESSION["errors"] .= "<li>Your email is not a valid one!</li>";
		}

		if (!emailExists($email)) {
			$_SESSION["errors"] .= "<li>This email is already in use!</li>";
		}

		if (!isPasswordSecure($pw1)) {
			$_SESSION["errors"] .= "<li>Your password needs to contain at least 7 characters!</li>";
		}

		if (!isEqual($pw1, $pw2)) {
			$_SESSION["errors"] .= "<li>Your confirm password doesn't match with your password!</li>";
		}

		if (!containNumber($pw1)) {
	        $_SESSION["errors"] .= "<li>Password must include at least one number!</li>";
	    }

	    if (!containLetter($pw1)) {
	    	$_SESSION["errors"] .= "<li>Password must include at least one letter!</li>";
	    }

	    if (!containUppercase($pw1)) {
	    	$_SESSION["errors"] .= "<li>Password must include at least one uppercase!</li>";
	    }

		if (!empty($_SESSION["errors"])) {
			return false;
		}
		return true;
	}

	function emptyFields($email, $pw1, $pw2) {
		if (empty($email) || empty($pw1) || empty($pw2)) {
			return false;
		}
		return true;
	}

	function validEmail($email) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		return true;
	}

	function emailExists($email) {
		$sql = "SELECT * FROM users
				WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows >= 1) {
			return false;
		}
		return true;
	}

	function isPasswordSecure($pw) {
		if (strlen($pw) < 7) {
			return false;
		}
		return true;
	}

	function isEqual($pw1, $pw2) {
		if ($pw1 != $pw2) {
			return false;
		}
		return true;
	}

	function containNumber($pw) {
		if (!preg_match("#[0-9]+#", $pw)) {
			return false;
		}
		return true;
	}

	function containLetter($pw) {
		if (!preg_match("#[a-zA-Z]+#", $pw)) {
			return false;
	    }
	    return true;
	}

	function containUppercase($pw) {
		if(!preg_match('/[A-Z]/', $pw)){
			return false;
		}
		return true;
	}

	/* TRANSFORM PASSWORD TO HASH */
	function pwHash($pw) {
		$salt = "ds1f5:;ùezff16";
		return sha1($pw . $salt);
	}

	/* VALIDATE LOGIN FORM */
	function canLogin($email, $pw) {
		$_SESSION["errors"] = "";

		if (!emptyFields($email, $pw, "check")) {
			$_SESSION["errors"] .= "<li>All fields are required to fill in!</li>";
		}

		if (!validEmail($email)) {
			$_SESSION["errors"] .= "<li>Your email is not a valid one!</li>";
		}

		if (!empty($_SESSION["errors"])) {
			return false;
		}
		return true;

		/*

		$email = $conn->real_escape_string($email);
		//x' or '1'='1' limit 1;-- ==> sql-injection 
		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pw'";
		$result = mysqli_query($conn, $sql);

		if ($result->num_rows > 0) {
			echo "Welcome";
		} else {
			echo "0 results";
		}*/
	}
?>