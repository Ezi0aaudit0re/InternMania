<?
	require_once("./check.php");
	
	//check if user is logged in 
	if(isset($_SESSION["name"]) && isset($_SESSION["type"]) && isset($_SESSION["id"]))
	{
		if($_SESSION["type"] == "employer")
			$_SESSION["message"] = "Only students can apply for internships";

		else
		{
			check(); // check if user already has applied for an internship
			if(isset($_SESSION["applied"]) && $_SESSION["applied"] == "TRUE")
				$_SESSION["message"] = "You can only apply for one internship at a time";

			else
			{
				$query = "INSERT INTO internships (user_id, posting_id, applied_at) VALUES ('{$_SESSION["id"]}', '{$_POST["posting_id"]}', NOW())";
				if(run_mysql_query($query) == false)
					$_SESSION["message"] = "Something Went Wrong when trying to update";
				else
				{	
					update();
					$_SESSION["message"] = "You have sucessfully applied";
				}
			}
			
		}
		header("Location: ../views/main.php");
	}
	else
	{
		$_SESSION["message"] = "You should be logged in to apply for an internship";
		header("Location: ../views/LandR.php");
	}
	
	
?>