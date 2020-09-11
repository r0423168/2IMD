<?php
	const servername_db = "localhost";
	const username_db = "root";
	const password_db = "";
	const database_db = "spotify_faker";

	$conn = mysqli_connect(servername_db, username_db, password_db, database_db);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	$conn->set_charset("utf8");
?>