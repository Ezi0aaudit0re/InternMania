<?php
	session_start();
	require_once("../new-connection.php");
	if(isset($_POST["email"]) && isset($_POST["pass"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == TRUE)
	{
		$query = "SELECT * FROM users WHERE email='{$_POST["email"]}' and password='{$_POST["pass"]}'";
		$result = fetch($query);
		if($result != NULL)
		{
			if(isset($_SESSION["name"]) && $_SESSION["name"] != NULL)
				header("Location: ../views/main.php");
			else
			{
				$_SESSION["name"] = $result[0]["user_name"];
				$_SESSION["type"] = $result[0]["type"];
				$_SESSION["id"] = $result[0]["id"];
				header("Location: ../views/main.php");
			}
		}
		else
		{
			$_SESSION["message"] = "User doesnot exist";
			header("Location: ../views/LandR.php");
		}
	}
	else
	{
		$_SESSION["message"] = "User doesnot exist";
		header("Location: ../views/LandR.php");
	}
?>