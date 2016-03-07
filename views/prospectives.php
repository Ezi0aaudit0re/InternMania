<?php
	require_once("../Validations/check.php");

	/*Check if the User is Logged In*/

	if(!isset($_SESSION["type"]) && !isset($_SESSION["name"]))
	{
		$_SESSION["message"] = "You need to be sighned in to view this page";
		header("Location: ../views/LandR.php");
	}
	else
	{
		if($_SESSION["type"] != "employer")
			$_SESSION["message"] = "You need to be an employer to view that page";
		else
		{
			$result = getall();
		}
	}
	require_once("./header.php")
?>


	<div class="container application_main">
		<div class="row">
			<div class="col-md-8 pull-left applications">
				<?php
				foreach($result as $user)
				{ ?>
				<div class="single_application">
					<h4><span class="title">Title: <?=$user["title"];?></span></h4>
					<h4>Student Name: <?=$user["user_name"];?></h4>
					<h5>Email Id: <?=$user["email"];?></h5>
					<p>Applied at: <?=$user["applied_at"];?></p>
				</div>


				<?	}
				?>
			</div>
			
		</div>
	</div>	
</body>