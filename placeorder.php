<?php
	include_once'header.php';

    include 'includes/config.inc.php';
    require_once("includes/CreateDb.php");
    require_once("includes/components.inc.php");
    
    if(isset($_SESSION["usersuid"])){
        
            $productId = $_SESSION['productid'];
		    $buyer = $_SESSION['usersuid'];
            include 'includes/config.inc.php';
            $sql = "SELECT * FROM cart where  product_buyer = '$buyer'";
             $result = mysqli_query($connect,$sql);
                while ($row = mysqli_fetch_assoc($result)){
             
                    if ($row['product_id'] == $productId){
                        placeorder($row['product_image'], $row['product_name'],$row['product_price'], $row['product_id']);
                    }    
                }
                
        
    }
    if(isset($_POST['order'])){
        
		header("location: ../infinitegreen/payment.php");
    }

?>
<div class="col-2">
            <?php 
            
            
            
            $id=$_SESSION['userid'];
            $name = $_SESSION["usersname"];
		    $last = $_SESSION["userslastname"];
		    $phonenum = $_SESSION["userphonenumber"];
		    
		
   

            $sqlUser = "SELECT * FROM users WHERE usersID = '$id'";
            $resultUser = mysqli_query($connect,$sqlUser);
            $rowUser = mysqli_fetch_assoc($resultUser);	
            	
            $address = $rowProd['address'];
       
            $sqlProd = "SELECT * FROM producttb WHERE product_id = '$productId'";
            $resultProd = mysqli_query($connect,$sqlProd);
            $rowProd = mysqli_fetch_assoc($resultProd);            
            
            if(isset($id)){
                $price = $rowProd['product_price'];                
            }

            $_SESSION['current_product_price'] = $rowProd['product_price'];
            $_SESSION['current_product_name'] = $rowProd['product_name'];
            $_SESSION['current_product_id'] = $rowProd['product_id'];
            
            echo"<h3>Delivery Address</h3>
            <p>$name $last | $phonenum <a class=\"edit\" href=\"editprofile.php\">Edit</a></p>
            <p>$address</p>
            <hr>
            <br>
            <h3>Quantity :
            <form action=\"placeorder.php\ method=\"post\">
                
                <input type=\"number\" name=\"quantity\" min=\"1\" max=\"5\" value = \"1\">
                
                
            </form>
            </h3>
            <br>
            <h3>Order:</h3>
            <div class=\"row price-details\">
                    <div class=\"col-md-6\">
                        <h3>Price (items 1)</h3>
                        
                        <hr>
                        <h3>Total Amount </h3>
                    </div>
                    <div class=\"col-md-6\">
                        <h3>₱$price</h3>
                        <h3 class=\"text-success\"></h3>
                        <hr>
                        <h3>₱$price</h3>
                    </div>
            </div>
            <br>
            <h3>Payment Option</h3>
            <form action=\"placeorder.php\" method=\"post\">
            <input type=\"radio\" id=\"payment1\" name=\"payment\" value=\"30\">
            <label for=\"payment1\">Gcash</label><br>
            <input type=\"radio\" id=\"payment2\" name=\"payment\" value=\"60\">
            <label for=\"payment2\">Cash on delivery</label><br>  
                
            
            <button type=\"submit\" class=\"btn\" name=\"order\">Place order</button>";
            
          
        ?>  
        </div>
    </div>
</div>
</form>
</div>  
<?php
	include_once'footer.php';
?>

