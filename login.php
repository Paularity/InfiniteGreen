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
                            <span>Login</span>
							
							
							<hr id="Indicator">
							
						</div>

                   
						<form action="includes/Login.inc.php" method="post">
							    <input type="text" placeholder="Username" name="uid">
							    <input type="password" placeholder ="Password" name="pwd">
							    <button type="submit" class="btn" name="submit">Login</button>
								<a href = "">Forget Password</a>
					
						    </form>

						

						
					</div>
					<?php
							if (isset($_GET["error"])){
								if($_GET["error"] == "emptyinput"){
									echo "<p>Fill in all fields.</p>";
								}
								else if ($_GET["error"] == "wronglogin"){
									echo "<p>Incorrect Login Information.</p>";
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