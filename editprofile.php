<?php
 include_once'header.php';
 include 'includes/config.inc.php';
 include_once'includes/functions.inc.php';
?>
	</div>
</div>

<?php
    if (isset($_POST['save'])){
        $id=$_SESSION['userid'];
        $name = $_SESSION["usersname"];
		$last = $_SESSION["userslastname"];
		$phonenum = $_SESSION["userphonenumber"];
		$email = $_SESSION["usersemail"];
		
   

        $sql = "SELECT * FROM users WHERE usersID = '$id'";
        $result = mysqli_query($connect1,$sql);
        $row = mysqli_fetch_assoc($result);		

        $birthday = $row['birthday'];
        $address = $row['address'];
       
        $usersfname = $_POST['fname'];
        $userslname = $_POST['lname'];
        $usersphone = $_POST['phonenum'];
        $usersemail = $_POST['email'];
        $usersbirthday = $_POST['birthday'];
        $usersaddress = $_POST['address'];


        if(empty($usersfname)){
            $usersfname = $name;
        }
        if(empty($userslname)){
            $userslname = $last;
        }
        if(empty($usersphone)){
            $usersphone = $phonenum;
        }
        if(empty($usersemail)){
            $usersemail = $email;
        }
        if(empty($usersbirthday)){
            $usersbirthday = $birthday;
        }
      
        if(empty($usersaddress)){
            $usersaddress = $address;
        }
       
        $sql = "UPDATE users
        SET usersName = '$usersfname', usersLastname = '$userslname', usersemail = '$usersemail', usersPhonenum = '$usersphone', 
        address = '$usersaddress', birthday = '$usersbirthday'
        WHERE usersID = $id;";
        
        mysqli_query($connect1, $sql);
            echo "<script>alert('Saved..!')</script>";
            echo "<script>window.location = 'editprofile.php'</script>";
       
      
        

        
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

		
            <div class="editprofile-container">
                <div class= upload-container>
				<h2>Profile</h2>
				<hr>
				
				<?php
                $id=$_SESSION['userid'];
				$name = $_SESSION["usersname"];
				$last = $_SESSION["userslastname"];
				$phonenum = $_SESSION["userphonenumber"];
				$email = $_SESSION["usersemail"];
				
                $sql = "SELECT * FROM users WHERE usersID = '$id'";
                $result = mysqli_query($connect1,$sql);
                $row = mysqli_fetch_assoc($result);		

                $birthday = $row['birthday'];
                $address = $row['address'];
				
				$space = '&nbsp';
				$spacer1=str_repeat($space,25);
				$spacer2=str_repeat($space,13);
				$spacer3=str_repeat($space,2);
				$spacer4=str_repeat($space,25);
				$spacer5=str_repeat($space,17);
				$spacer6=str_repeat($space,20);
				$spacer7=str_repeat($space,18);
                echo "<form action=\"editprofile.php\" method=\"post\">";
					echo "<h3>name $spacer1:&nbsp <input type=\"text\" placeholder=\"$name\" name=\"fname\"></h3>";
					echo "<h3>Last Name $spacer2:&nbsp <input type=\"text\" placeholder=\"$last\" name=\"lname\"></h3>";
					echo "<h3>Phone Number $spacer3:&nbsp <input type=\"text\" placeholder=\"$phonenum\" name=\"phonenum\"> </h3>";
					echo "<h3>Email $spacer4:&nbsp <input type=\"text\" placeholder=\"$email\" name=\"email\"></h3>";
					echo "<h3>Birthday $spacer5:&nbsp <input type=\"text\" placeholder=\"$birthday  \" onfocus=\"(this.type='date')\" name= \"birthday\"></h3>";
					echo "<h3>Address $spacer7:&nbsp <input type=\"text\" placeholder=\"$address\" name=\"address\"></h3>";
				    echo "<button class=\"profbtn\" name=\"save\">save</button>";
			
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