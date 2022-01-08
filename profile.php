<?php
 include_once'header.php';
 include 'includes/config.inc.php';
 include_once'includes/functions.inc.php';
?>
	</div>
</div>
<?php

$id = $_SESSION["userid"];
$name = $_SESSION["usersname"];
$last = $_SESSION["userslastname"];
$phonenum = $_SESSION["userphonenumber"];
$email = $_SESSION["usersemail"];

$sql = "SELECT * FROM users WHERE usersID = '$id'";
$result = mysqli_query($connect1,$sql);
$row = mysqli_fetch_assoc($result);		

$birthday = $row['birthday'];
$address = $row['address'];

if (isset($_POST['edit'])){
	header("location: ../infinitegreen/editprofile.php");
}
?>
			
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <div class="profile-menu">
		    <div class="image-container">
			    <img src="images/profile.jpg" alt="" class="profile-image">
	    	</div>
			
			<ul>
				
					
				<?php 
					if (isset($_SESSION["usersuid"])){
						echo "<li class=\"active\"><a href=\"profile.php\">". $_SESSION["usersname"] ."</a>";
	
					}
				?>
				
			
				
				
				
				<li class="act"><a href="">Notifications</a></li>
				
				<li class="act"><a href="uploadplants.php">Sell Plants</a></li>

				<li class="act"><a href="upload-auction.php">Auction Plants</a></li>
				
				<li class="act"><a href="includes/logout.inc.php">Logout</a></li>
			</ul>
		
	        </div>  
        </div>
        <div class="col-2">

		
            <div class="profile-container">
                <div class= upload-container>
				<h2>Profile</h2>
				<hr>
				<?php
				
				
				$space = '&nbsp';
				$spacer1=str_repeat($space,25);
				$spacer2=str_repeat($space,13);
				$spacer3=str_repeat($space,2);
				$spacer4=str_repeat($space,25);
				$spacer5=str_repeat($space,17);
				$spacer6=str_repeat($space,20);
				$spacer7=str_repeat($space,18);
				echo "<form action=\"profile.php\" method=\"post\">";
					echo "<h3>name $spacer1:&nbsp $name</h3>";
					echo "<h3>Last Name $spacer2:&nbsp $last</h3>";
					echo "<h3>Phone Number $spacer3:&nbsp $phonenum </h3>";
					echo "<h3>Email $spacer4:&nbsp $email</h3>";
					echo "<h3>Birthday $spacer5:&nbsp $birthday</h3>";
					echo "<h3>Address $spacer7:&nbsp $address</h3>";
				echo"<button class=\"profbtn\" name='edit'>Edit</button>";
				echo "</form>";
				?>
				
                </div>
				</from>
            </div>
        </div>
    </div>
</div>

	

<?php
	include_once'footer.php';
?>
