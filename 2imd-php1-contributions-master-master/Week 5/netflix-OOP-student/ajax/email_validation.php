<?php

	require_once("../classes/User.class.php");

	if (!empty($_POST)) {
		$email = $_POST["email"];

		try {
			if(User::isAvailable($email)) {
				$result = [
					"status" => "fail",
					"message" => "That account is already taken."
				];
			} else {
				$result = [
					"status" => "success",
					"message" => "The account isn't taken."
				];
			}
		} catch(Throwable $t) {
			$result = [
				"status" => "error",
				"message" => $t->getMessage()
			];
		}

		header('Content-Type: application/json');
		echo json_encode($result);
	}