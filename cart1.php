<!DOCTYPE html>
<head id="header">
	<meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
</html>
<?php
	include_once'header.php';


    require_once("includes/CreateDb.php");
    require_once("includes/components.inc.php");

   
    
    if(isset($_SESSION["usersuid"])){
        if(isset($_POST['remove'])){
            $_SESSION['productid']=$_POST['remove'];
            $id = $_SESSION['productid'];
		    $buyer = $_SESSION['usersuid'];
            
            include 'includes/config.inc.php';
            $sql="DELETE FROM cart where product_id = '$id' and product_buyer = '$buyer'";
            $result = mysqli_query($connect,$sql);
               
            echo "<script>alert('Product has been remove')</script>";
            echo "<script>window.location = 'cart1.php'</script>";
                    
                
        }
    }
    if(isset($_POST['place_order'])){
        $_SESSION['productid']=$_POST['place_order'];
		header("location: ../infinitegreen/placeorder.php");
    }
    

?>
		
	</div>
	</div>
	<!-----------Cart Items Details-------->
    <div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My Cart</h6>
                <hr>

                <?php
               
                    
                    $total = 0;
                    if(isset($_SESSION["usersuid"])){
                           $buyer = $_SESSION['usersuid'];
                               include 'includes/config.inc.php';
                                  $sql = "SELECT * FROM cart where product_buyer = '$buyer'";
                                  $result = mysqli_query($connect,$sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['product_id']);
                                        $total = $total + (int)$row['product_price'];
                                        $sql = "SELECT COUNT(product_buyer) AS output FROM cart where product_buyer = '$buyer'";
                                        $result1 = mysqli_query($connect,$sql);
                                        $row = mysqli_fetch_assoc($result1);
                                        $count = $row['output'];
                                    }
                                }else{
                                    echo 'Cart is empty.';
                                }		
                    }
                    
                    

                ?>

            </div>
        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <h6>Price (items <?php echo $count;?>)</h6>
                        
                        <hr>
                        <h6>Amount Payable</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>₱<?php echo $total; ?></h6>
                        <h6 class="text-success"></h6>
                        <hr>
                        <h6>₱<?php
                            echo $total;
                            ?></h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
