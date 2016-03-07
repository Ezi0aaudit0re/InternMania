<?php
	session_start();
	require_once("./header.php");
?>
<!--

Login and regestration Page

-->



	<div  class="container LandR">
		<div class="row">
			<!-- Registration -->
			<div id="Registration" class="col-md-4 pull-left">
				
				<h2 style="color: purple">Regestration</h2>
				<form action="../Validations/Registration.php" method="post">
					<input type="email" placeholder="EMAIL ADRESS" name="email">
					<input type="text" placeholder="NAME" name="uname">
					<input type="password" placeholder="PASSWORD" name="pass">
					<input type="password" placeholder="CONFIRM PASSWORD" name="cpass">
					<p>Please select type of User</p>
					<select name="type" style="padding: 10px">
						<option value="employer">Employer</option>
						<option value="Student">Student</option>
					</select><br>
					<input type="Submit" placeholder="Click to Submit" class="btn btn-info">
				</form>	
			</div>
			<?
				if(isset($_SESSION["message"]))
				{
			    ?>
					<div class="col-md-3 centered alert alert-warning" id="badge">
						<h4><?=$_SESSION["message"]?></h4>
					</div>
				<?
				session_destroy();
				}
			?>
			<!-- Login -->
			<div id="Login" class="col-md-4 pull-right">
				<h2>Login</h2>
				<form action="../Validations/Login.php" method="post">
					<input type="email" name="email" placeholder="EMAIL ADRESS">
					<input type="password" name="pass" placeholder="PASSWORD">
					<input type="submit" placeholder="Login" class="btn btn-info">
				</form>
			</div>
		</div>
	</div>
	
		
</body>
</html>