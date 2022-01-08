
<?php
	
	require_once'header.php';


  	include_once'includes/components.inc.php';
  
	

	if(isset($_SESSION["usersuid"])){
		if (isset($_POST['add'])){
		   $_SESSION['productid']=$_POST['product_id'];
		   $id = $_SESSION['productid'];
		   $buyer = $_SESSION['usersuid'];
			   include 'includes/config.inc.php';
				  $sql = "SELECT exists(select * from cart where product_id = '$id' and product_buyer='$buyer') AS Output;";
				   $result = mysqli_query($connect,$sql);
			   if($row = mysqli_fetch_assoc($result)){
		   
				   if($row['Output']==0){
					   $sql = "SELECT * FROM producttb where product_id = $id";
					   $result = mysqli_query($connect,$sql);
					   $row = mysqli_fetch_assoc($result);

					   $sqli = "INSERT INTO cart (product_id, product_name, product_price, product_image, product_buyer, product_seller) 
					   VALUES ('$id', '".$row['product_name']."','".$row['product_price']."','".$row['product_image']."', '$buyer','".$row['seller']."')";
					   $result = mysqli_query($connect,$sqli);
					   echo "<script>alert('Product is added in the cart..!')</script>";
					   echo "<script>window.location = 'allproducts.php'</script>";
				   }else{
					   echo "<script>alert('Product is already added in the cart..!')</script>";
					   echo "<script>window.location = 'allproducts.php'</script>";
				   }
			   }		
		}
	}
	if (isset($_POST['view'])){
		$_SESSION['productid']=$_POST['product_id'];
		header("location: ../infinitegreen/productdetails.php");
	}
	
?>
	</div>
	</div>
	
	<div class="small-container">
		
	<br>
	<h2 class="title">ALL Plants</h2>	

		<div class="row">
			
			<?php
				 if (isset($_SESSION["usersuid"])){
					$seller = $_SESSION["usersuid"];
				
				
					include 'includes/config.inc.php';
		
					$sql = "SELECT * FROM producttb WHERE NOT seller = '$seller'";
					$result = mysqli_query($connect,$sql);
		
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							components($row['product_name'], $row['product_price'], $row['product_image'], $row['product_id']);
						}
					}else{
						echo 'No Posts';
					}
				}else{
					include 'includes/config.inc.php';
		
					$sql = "SELECT * FROM producttb";
					$result = mysqli_query($connect,$sql);
		
					if(mysqli_num_rows($result)>0){
						while($row = mysqli_fetch_assoc($result)){
							components($row['product_name'], $row['product_price'], $row['product_image'], $row['product_id']);
						}
					}else{
						echo 'No Posts';
					}
				}
		
        	?>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<?php
		include_once 'footer.php';

	?>