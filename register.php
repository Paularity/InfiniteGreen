
<?php
	include_once'header.php';
?>
		
	</div>
	</div>
	<!-----------acounts------------>
	<div class="account-page">
		<div containter>
			<div class="row">
				<div class="col-2">
					<img src="images/BG1.jpg" width="80%">
				</div>
				
				<div class="col-2">
					<div class="form-container">
						<div class="form-btn">
							<span>Register</span>	
							
							
							<hr id="Indicator">
							
						</div>
						
                            <form action="includes/signup.inc.php" method="post">
							    <input type="text" placeholder="Firtname" name="fname">
							    <input type="text" placeholder="Lastname" name="lname">
							    <input type="text" placeholder="Username" name="uname">
							    <input type="email" placeholder="Email" name="email">
							    <input type="text" placeholder="PhoneNumber" name="pnumber">
							    <input type="password" placeholder ="Password" name="pass">
								<input type="password" placeholder ="Repeat Password" name="repeatpass">
							    <button type="submit" class="btn" name="submit">Register</button>
					
						    </form>
						
					

						
					</div>

					<?php
							if (isset($_GET["error"])){
								if($_GET["error"] == "emptyinput"){
									echo "<p>Fill in all fields.</p>";
								}
								else if ($_GET["error"] == "invaliduname"){
									echo "<p>Use other username.</p>";
								}
								else if ($_GET["error"] == "invalidemail"){
									echo "<p>Use other email.</p>";
								}
								else if ($_GET["error"] == "passworddontmatch"){
									echo "<p>Passwords does not match.</p>";
								}
								else if ($_GET["error"] == "stmtfailed"){
									echo "<p>Something went wrong, try agian.</p>";
								}
								else if ($_GET["error"] == "usernameexist"){
									echo "<p>Username is already taken.</p>";
								}
								else if ($_GET["error"] == "none"){
									echo "<p>Registered Successfully.</p>";
								}
							}	
					?>

				</div>
			</div>
		</div>
	</div>
	<?php
		include_once 'footer.php';

	?>