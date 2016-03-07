<?php
	session_start();
	require_once("../new-connection.php"); // make connection to the database
	//Validation for Registration
	if(isset($_POST["email"]) && isset($_POST["uname"]) && isset($_POST["pass"]) && isset($_POST["cpass"]) && isset($_POST["type"]) )
	{
		if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) == TRUE && $_POST["pass"] == $_POST["cpass"])
		{	
			// check if user already exists
			$query = "SELECT * FROM users WHERE email = '{$_POST["email"]}'";
			$result = fetch($query);
			if($result != Null)
			{
				$_SESSION["message"] = "User already exists";
				header("Location: ../views/LandR.php");
			}
			else
			{
				// add to the database
				$query = "INSERT INTO users (email, user_name, password, created_at, updated_at, type, applied ) VALUES ('{$_POST["email"]}', '{$_POST["uname"]}', '{$_POST["pass"]}', NOW(), NOW(), '{$_POST["type"]}', 'FALSE')";
				if(run_mysql_query($query) != false)
				{
					$_SESSION["message"] = "You are registered!! Please Login";
					header("Location: ../views/LandR.php");

				}
				else
				{
					$_SESSION["message"] = "There was a problem regestering please try again!!";
					header("Location: ../views/LandR.php");
				}
			}
			
		}
		else
		{
			$_SESSION["message"] = "Please enter valid Information";
			header("Location: ../views/LandR.php");
		}
	}
	else
	{
		$_SESSION["message"] = "Please enter valid Information";
		header("Location: ../views/LandR.php");
	}
		
		
?>