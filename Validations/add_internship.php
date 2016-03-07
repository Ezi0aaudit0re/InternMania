<?php
/*--- This page allows employers to add internship----*/
	session_start();
	require_once("../new-connection.php");

	// additional layer of backup if some student tries adding an internship
	if($_SESSION["type"] == "Student")
		header("Location: ../views/main.php");
	// checks if the information added by user only contains alphabets, to prevent MYSQL injection, and the user is logged in
	if(isset($_POST["description"]) && isset($_POST["title"]))
	{
		if(isset($_SESSION["id"]) && isset($_SESSION["name"])) // check if the session isset
		{
			$query = "INSERT INTO postings ( title, description, created_at, updated_at, user_id) VALUES ('{$_POST["title"]}', '{$_POST["description"]}', NOW(), NOW(), '{$_SESSION["id"]}')";
			
			if(run_mysql_query($query) == FALSE)
			{	
				$_SESSION["message"] = "Something went wrong when trying to add an internship. please try again";
				header("Location: ../views/add_internship.php");
			}
			else
			{
				$_SESSION["message"] = "Intenship sucessfully added";
				header("Location: ../views/main.php");
			}
		}
		else
		{
			$_SESSION["message"] = "You need to be an employer to add a new internship";
			header("Location: ../views/main.php");
		}
	}
	else
	{
		header("Location: ../views/main.php");
	}
?>