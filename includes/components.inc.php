<?php

function components($productname, $productprice, $productimg, $productid){
    $element = "
    <div class=\"col-4\">
    <form action=\"allproducts.php\" method=\"post\">
       <img src=\"images/$productimg\">
        <h4>$productname</h4>
        <div class=\"rating\">
		    <i class=\"fa fa-star\"></i>
		    <i class=\"fa fa-star\"></i>
    	    <i class=\"fa fa-star\"></i>
		    <i class=\"fa fa-star\"></i>
		    <i class=\"fa fa-star-half-o\"></i>
	    </div>
	    <p>₱$productprice</p>
        <button type=\"submit\" class=\"btn\" name=\"add\">Add to Cart</button>
        <button type=\"submit\" class=\"btn\" name=\"view\">Product details</button>
        <input type='hidden' name='product_id' value='$productid'>
    
        
    </form>

    </div>
    ";
    echo $element;

}
function cartElement($productimg,$productname,$productprice,$productid){
    $element="
    <form action=\"cart1.php\" method=\"post\" class=\"cart-items\">
    <div class=\"border rounded\">
        <div class=\"row bg-white\">
            <div class=\"col-md-3\">
                <img src=\"images/$productimg\" alt=\"image1\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-6\">
                <h5 class=\"pt-2\">$productname</h5>
                <small class=\"text-secondary\">IGC</small>
                <h5 class=\"pt-2\">₱$productprice</h5>
                <button type=\"submit\" class=\"btn-warning\" name='place_order' value='$productid'>Buy Now</button>
                <button type=\"submit\" class=\"btn-danger mx-2\" name='remove' value='$productid'>Remove</button>
            </div>
            <div class=\"col-md-3 py-2\">
                <div>
                   
                </div>
            </div>

        </div>
    </div>
</form>
    ";
    echo $element;


}

function productdetail($productimg,$productname,$productprice,$productid,$productdescription){
    $element="
    <form action=\"productdetails.php\" method=\"post\">    
	<div class=\"small-container single-product\">
    <div class=\"row\">
        <div class=\"col-2\">
            <img src=\"images/$productimg\" width=\"100%\" class=\"ProductImg\" alt=\"product\">
        </div>
        <div class=\"col-2\">
            <p>Home/Plant</p>
            <h1>$productname</h1>
            <h4>₱$productprice</h4>
            
            <button type=\"submit\" class=\"btn\" name=\"add\">Add to cart</button>
            <input type='hidden' name='product_id' value='$productid'>
            <br>
            <br>
            <br>
            <h3>Product details<i class=\"fa fa-indent\"></i></h3>
            <br>
            <p>$productdescription
            </p>
        </div>
    </div>
</div>
</form>
    ";
    echo $element;
}


function auction($productimg, $productname, $AdsId){
    $element="
    
      <tr>
      <form action=\"upload-auction.php\"method=\"POST\">
        <td><img src=\"images/$productimg\"></td>
        <td>$productname</td>
        <td>
            <button type=\"submit\" class=\"btn\" name =\"view\">View</button>
            <input type='hidden' name='Ads_Id' value='$AdsId'>
        </td>
        
      </form>
      </tr>
    
  
    ";
    echo $element;
}
function auction_info($productimage, $productname, $productprice, $productdescription, $end_date){

    $element="
  
    
    <table class=\"table\">
    <thead>
      <tr>
        <th>Auction Post Details</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
       <td>
         Time Left:
       </td>
      </tr>
      <tr>
        <td>
        <p id=\"demo\"></p>
        <script>
        // Set the date we're counting down to
        var countDownDate = new Date(\"$end_date\").getTime();
    
        // Update the count down every 1 second
        var x = setInterval(function() {
    
        // Get today's date and time
        var now = new Date().getTime();
        
         // Find the distance between now and the count down date
         var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id=\"demo\"
         document.getElementById(\"demo\").innerHTML = days + \"d \" + hours + \"h \"
        + minutes + \"m \" + seconds + \"s \";
        
        // If the count down is over, write some text 
        if (distance < 0) {
        clearInterval(x);
        document.getElementById(\"demo\").innerHTML = \"EXPIRED\";
        }
        }, 1000);
        </script>
        </td>
      </tr>
      <tr>
        <td>
            End Date: $end_date
        </td>
      </tr>
      <tr>
        <td>
        <form action=\"productdetails.php\" method=\"post\">    
        <div class=\"small-container single-product\">
        <div class=\"row\">
            <div class=\"col-2\">
                <img src=\"images/$productimage\"  class=\"ProductImg\">
            </div>
            <div class=\"col-2\">
                <p>Home/Plant</p>
                <h1>$productname</h1>
                <h4>₱$productprice</h4>
                <h3>Product details<i class=\"fa fa-indent\"></i></h3>
                <br>
                <p>$productdescription
                </p>
            </div>
        </div>
        </div>
        </form>
           
            
        </td>
      </tr>
      
    </tbody>
    
    
    </table>
    ";
    echo $element;
}

function auction_post($productimage, $productname, $end_date, $productprice, $AdsId){

    $element = "
    <tr>
    <form action=\"auction.php\"method=\"POST\">
      <td><img src=\"images/$productimage\"></td>
      <td>$productname</td>
      <td>$end_date</td>
      <td>$productprice</td>
      
      <td>
          <button type=\"submit\" class=\"btn\" name =\"Bid\">Bid</button>
          <input type='hidden' name='Bid' value='$AdsId'>
      </td>
      
    </form>
    </tr>
  

    ";
    echo $element;
}

function bidding_info($productimage, $productname, $productprice, $productdescription, $end_date){

    $element="
  
    
    
    <thead>
      <tr>
        <th>Auction Post Details</th>
        
      </tr>
    </thead>
    <tbody>
      <tr>
       <td>
         Time Left:
       </td>
      </tr>
      <tr>
        <td>
        <p id=\"demo\"></p>
        <script>
        // Set the date we're counting down to
        var countDownDate = new Date(\"$end_date\").getTime();
    
        // Update the count down every 1 second
        var x = setInterval(function() {
    
        // Get today's date and time
        var now = new Date().getTime();
        
         // Find the distance between now and the count down date
         var distance = countDownDate - now;
        
        // Time calculations for days, hours, minutes and seconds
         var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Output the result in an element with id=\"demo\"
         document.getElementById(\"demo\").innerHTML = days + \"d \" + hours + \"h \"
        + minutes + \"m \" + seconds + \"s \";
        
        // If the count down is over, write some text 
        if (distance < 0) {
        clearInterval(x);
        document.getElementById(\"demo\").innerHTML = \"EXPIRED\";
        }
        }, 1000);
        </script>
        </td>
      </tr>
      <tr>
        <td>
            End Date: $end_date
        </td>
      </tr>
      <tr>
        <td>
        <form action=\"\" method=\"post\">    
        <div class=\"small-container single-product\">
        <div class=\"row\">
            <div class=\"col-2\">
                <img src=\"images/$productimage\"  class=\"ProductImg\">
            </div>
            <div class=\"col-2\">
                
                <h1>$productname</h1>
                <h4>Starting Price: ₱$productprice</h4>
                <h3>Product details<i class=\"fa fa-indent\"></i></h3>
                <br>
                <p>$productdescription
                </p>
            </div>
            
    ";
    echo $element;
}
function highest_bid($highest_bid){
  $element="
  <div class=\"col-2\">
                
  <h1>Highest Bid</h1>
  <br>
  <h2>Price: ₱ $highest_bid</h2>
  <br>
  
  </div>
  ";
  echo $element;
}

function myplant($productimg, $productname, $product_id){
  $element="
  
    <tr>
    <form action=\"uploadplants.php\"method=\"POST\">
      <td><img src=\"images/$productimg\"></td>
      <td>$productname</td>
      <td>
          <button type=\"submit\" class=\"btn\" name =\"view\">View</button>
          <input type='hidden' name='product_id' value='$product_id'>
      </td>
      
    </form>
    </tr>
  

  ";
  echo $element;
}

function seller_productdetail($productimg,$productname,$productprice,$productdescription){
  $element="
  <form action=\"productdetails.php\" method=\"post\">    
<div class=\"small-container single-product\">
  <div class=\"row\">
      <div class=\"col-2\">
          <img src=\"images/$productimg\" width=\"100%\" class=\"ProductImg\" alt=\"product\">
      </div>
      <div class=\"col-2\">
          <p>Home/Plant</p>
          <h1>$productname</h1>
          <h4>₱$productprice</h4>
          <br>
         
          <h3>Product details<i class=\"fa fa-indent\"></i></h3>
          <br>
          <p>$productdescription
          </p>
      </div>
  </div>
</div>
</form>

<br>
<br>
<br>
<br>
  ";
  echo $element;
}

function bidders($bidder_name, $bidder_email, $bidder_phone, $bidder_price, $bid_date){
  $element = "
  <tr>
  <td>$bidder_name</td>
  <td>$bidder_email</td>
  <td>$bidder_phone</td>
  <td>$bidder_price</td>
  <td>$bid_date</td>
  </tr>
  ";
  echo $element;
}

function placeorder($productimg,$productname,$productprice,$productid){
  $element="
  <form action=\"placeorder.php\" method=\"post\">    
<div class=\"small-container single-product\">
  <div class=\"row\">
      <div class=\"col-2\">
          <img src=\"images/$productimg\" width=\"100%\" class=\"ProductImg\" alt=\"product\">
          <h1>$productname</h1>
      </div>

  ";
  echo $element;
}
?>

