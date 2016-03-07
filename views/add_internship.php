<?php
	session_start();
	
	//check if user has logged in
	if(!isset($_SESSION["id"]) && !isset($_SESSION["name"]))
	{
		$_SESSION["message"] = "You need to be logged in to post internships";
		header("Location: ../views/LandR.php");
	}	
	else if($_SESSION["type"] == "Student")
	{
		$_SESSION["message"] = "Only employers can post internships"
		header("Location: ../views/main.php");
	}
		

	require_once("./header.php");
?>


	<div class="container add_internship">
		<div class="row">

			<h3><?=$_SESSION["name"];?>, add information about new internship</h3>
		</div>
			
			<?php
				if(isset($_SESSION["message"]))
				{ ?>
					<div class="alert alert-danger">
						<p><?=$_SESSION["message"];?></p>
					</div>
				<?php unset($_SESSION["message"]);	
				}
			?>

			<div id="add_internship_form">
				<form action="../Validations/add_internship.php" method="post">
					<input type="text" name="title" placeholder="TITLE">
					<textarea name="description" cols="30" rows="10" placeholder="DESCRIPTION"></textarea>
					<input type="Submit" placeholder="Add a new Posting" class="btn btn-info">
				</form>
			</div>
		</div>
	</div>
</body>