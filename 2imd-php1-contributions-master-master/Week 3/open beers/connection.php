<?php
	$servername = "localhost";
	$username = "root";
	$password_db = "";
	$database = "open_beers";

	$conn = mysqli_connect($servername, $username, $password_db, $database);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$conn->set_charset("utf8");
?>