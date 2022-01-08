	
<?php
	include_once'header.php';
	
	
    require_once("includes/components.inc.php");

   

	if (isset($_POST['add'])){
		/// print_r($_POST['product_id']);
		if(isset($_SESSION['cart'])){
	
			$item_array_id = array_column($_SESSION['cart'], "product_id");
	
			if(in_array($_POST['product_id'], $item_array_id)){
				echo "<script>alert('Product is already added in the cart..!')</script>";
				echo "<script>window.location = 'productdetails.php'</script>";
			}else{
	
				$count = count($_SESSION['cart']);
				$item_array = array(
					'product_id' => $_POST['product_id']);
				$_SESSION['cart'][$count] = $item_array;
				echo "<script>alert('Product is successfully added in the cart..!')</script>";
				echo "<script>window.location = 'allproducts.php'</script>";
				}	
	
		}else{
	
			$item_array = array(
					'product_id' => $_POST['product_id']
			);
	
			// Create new session variable
			$_SESSION['cart'][0] = $item_array;
			
		}
	}

?>

	</div>
	</div>
	
	<!---------- single product details-------->
		<?php 
			
			$id = $_SESSION['productid'];
			include 'includes/config.inc.php';
       		$sql = "SELECT * FROM producttb";
        	$result = mysqli_query($connect,$sql);
                while ($row = mysqli_fetch_assoc($result)){
                
                    if ($row['product_id'] == $id){
                        productdetail($row['product_image'], $row['product_name'],$row['product_price'], $row['product_id'], $row['product_description']);
					}    
				}
                

		?>
	<!----------------Title------------>
<br>		
<br>
<br>
<?php
	require_once'footer.php';
?>