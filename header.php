<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head id="header">
	<meta charset="utf-8">
	<title>Infintegreen</title>
	<?php 
		if (isset($_SESSION["usersuid"])){
			echo "<p>Hello there " . $_SESSION["usersuid"] ."</p>";
	
		}
	
		
	?>
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
	<div class="container">
		<div class="navbar">		
			<div class="logo">
				<a href="index1.php"><img src="images/Logo.PNG" width="125px"></a>
			</div>
			<nav>      
				<ul>
					<li><a href="index1.php">Home</a></li>
					<li><a href="">About</a></li>
					<li><a href="auction.php">Auction</a></li>
					<li><a href="allproducts.php">Shop</a></li>
					
                	<?php
                    	if (isset($_SESSION["usersuid"])){
							echo "<li><a href='profile.php'>Profile</a></li>";
                    	    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
							echo "
									<a href=\"cart1.php\"><img src=\"images/cart.PNG\" width=\"30px\"height=\"30px\">
										cart
										
									</a>
									
									";
									
									
                        			
                        }else {
                            echo "<li><a href='register.php'>Register</a></li>";
                            echo "<li><a href='login.php'>Login</a></li>";
							if(isset($_POST['add'])){
							header("location: ../infinitegreen/login.php");
							}
                        
						}
							
					?>
				</ul>
			</nav>

		</div>
		
