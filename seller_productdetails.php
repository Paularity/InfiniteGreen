<?php
	include_once'header.php';
    require_once("includes/components.inc.php");

?>
</div>
</div>
<br>
<h2 class="title">Plant Post Info</h2>
<?php 
			
			$id = $_SESSION['productid'];
			include 'includes/config.inc.php';
       		$sql = "SELECT * FROM producttb";
        	$result = mysqli_query($connect,$sql);
                while ($row = mysqli_fetch_assoc($result)){
                
                    if ($row['product_id'] == $id){
                        seller_productdetail($row['product_image'], $row['product_name'],$row['product_price'],  $row['product_description']);
					}    
				}
                

?>
<?php
	require_once'footer.php';
?>