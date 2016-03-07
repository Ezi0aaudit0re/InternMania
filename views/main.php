<?php
	/*--- This page displays all the internships posted ---*/
	require_once("../Validations/check.php");
	require_once("./header.php");

?>



	<div class="container main_page">
		<div class="row main_info">
			<?php
				if(isset($_SESSION["message"]))
			{ ?>
				<div class="alert alert-success main_center">
					<p><?=$_SESSION["message"];?></p>
				</div>
			<?php 
				unset($_SESSION["message"]);
				}
				
				$result = getInternships();
				if(isset($result));
				{
					echo "<div class='col-md-8 pull-left internships'>";
					foreach ($result as $posting) {
				?>
					<div class="posting">
						<h3><span  class="title"><?=$posting["title"]?></span></h3>
						<h5>Job Description: <?=$posting["description"]?></h5>
						<span style="text-align: left">Posted by <?=$posting["user_name"];?></span>
						<p>Created at <?=$posting["created_at"]?></p>
						<form action="../Validations/apply.php" method="post">
							<input type="submit" class="btn btn-success" value="Apply">
							<input type="hidden" value="<?=$posting["id"]?>" name="posting_id">
						</form>
					</div>
				<?php
					
					}
					echo "</div>";
				} 
				
			?>	
		</div>
		
	</div>
	
</body>
</html>