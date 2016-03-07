<?php
	session_start();
	require_once("../new-connection.php");

	// checks if the student has already applied for an internship
	function check()
	{
		$query = "SELECT * FROM users WHERE id={$_SESSION["id"]} and user_name='{$_SESSION["name"]}'";
		$result = fetch($query);
		$_SESSION["applied"] = $result[0]["applied"];
	}
	
	// Updates the databasae if the student has applied for an internship
	function update()
	{
		$query = "UPDATE users SET applied='TRUE' WHERE id = '{$_SESSION["id"]}' and user_name = '{$_SESSION["name"]}'";
		$result = run_mysql_query($query);
	}	

	// Gets the internships a person has applied for
	function getInternships()
	{
		$query = "SELECT * FROM postings LEFT JOIN users ON users.id = postings.user_id";
		return fetch($query);
	}

	// Gets all the students who have applied for an internship
	function getall()
	{
		$query = "SELECT * FROM users LEFT JOIN internships ON users.id = internships.user_id
					LEFT JOIN postings ON postings.id = internships.posting_id
					WHERE postings.user_id = {$_SESSION["id"]}"; 
		return fetch($query);
	}
?>