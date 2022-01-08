<?php
    include_once'header.php';
    include_once'includes/components.inc.php';

?>
<?php

  if(isset($_POST['bid'])){
  
    include 'includes/config.inc.php';
  
    $target = "images/".basename($_FILES['image']['name']);
  
    $buyer = $_SESSION["usersname"];
    $phonenumber = $_SESSION["userphonenumber"];
    $bid = $_POST['bidprice'];
    $AdsId = $_SESSION['Bid'];
    $buyer_email = $_SESSION["usersemail"];
  
  
    if(empty($bid)){
        header("location: ../bidding/auction.php?error=emptyinput");
        exit();
    }
    else{
        $sql = "INSERT INTO mybids (Buyer, phone, buyer_email, price, AdsId, bid_date) VALUES ('$buyer', '$phonenumber', '$buyer_email', '$bid', '$AdsId', NOW())";
        mysqli_query($con, $sql);
        echo "<script>alert('Bid Success')</script>";
        echo "<script>window.location = 'bidding.php'</script>";
        exit();
        
    }
  
  }
?>

<table class="table">
<?php
  
    
  if (isset($_SESSION["usersuid"])){
    $seller = $_SESSION["usersuid"];

  }
  include 'includes/config.inc.php';
  $AdsId = $_SESSION['Bid'];
  $sql = "SELECT * FROM myads";
  $result = mysqli_query($con,$sql);

        
  while($row = mysqli_fetch_assoc($result)){
    if($row['AdsId'] == $AdsId){
      bidding_info($row['image'], $row['title'], $row['price'], $row['description'], $row['end_date']);
    }
  }
       
        


?>

<?php
    if (isset($_SESSION["usersuid"])){
      $seller = $_SESSION["usersuid"];
  
    }
    include 'includes/config.inc.php';
    $AdsId = $_SESSION['Bid'];
    
    $sql = "SELECT Max(price) as prices FROM mybids where AdsId = '$AdsId'";
    
    $result = mysqli_query($con,$sql);
  
          
    while($row = mysqli_fetch_assoc($result)){
      
      
        highest_bid($row['prices']);
      
    }

?>

            
            <div class="col-2">
              <br>
              
              <div class="bidding">
              <form action="bidding.php" method="POST" enctype = "multipart/form-data">
                
                <div>
                  <input type="text"  name="bidprice" placeholder="Bid">
                </div>
                
                <button type="submit" name="bid">Submit</button>
              </form>  
              </div>
            </div>
        </div>
        </div>
        </form>
           
            
        </td>
      </tr>
      
    </tbody>
    
    
    </table>



</div>
<?php
	include_once'footer.php';
?>