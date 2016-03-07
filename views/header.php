
<?php
	// Check if a user needs to login or Logout
	if(!isset($_SESSION["type"]) && !isset($_SESSION["id"]))
	{
		$_SESSION["event"] = "LogIn";
	}
	else
		$_SESSION["event"] = "Logout";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Internship web</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../Css/index.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious">
</head>
<body>
	<nav>
		<div>
			<a href="../index.php"><span class="glyphicon glyphicon-home">&nbsp;</span>Home</a> | <a href="./main.php">Internships</a> | <a href="./add_internship.php">Post Internships</a><a href="./prospectives.php">View Prospectives</a> | <a href="../Validations/logoff.php" class="logout"><span class="glyphicon glyphicon-off">&nbsp;</span><?=$_SESSION["event"];?></a>
		</div>
	</nav>	
