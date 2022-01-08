<?php
    include_once'header.php';
    include_once'includes/components.inc.php';
?>
<br>
<h2 class="title">Auction Post Info</h2>
<?php
  if (isset($_SESSION["usersuid"])){
    $seller = $_SESSION["usersuid"];

  }
  include 'includes/config.inc.php';
  $AdsId = $_SESSION['Ads_Id'];
  $sql = "SELECT * FROM myads WHERE seller = '$seller'";
  $result = mysqli_query($con,$sql);

        
  while($row = mysqli_fetch_assoc($result)){
    if($row['AdsId'] == $AdsId){
      auction_info($row['image'], $row['title'], $row['price'], $row['description'], $row['end_date']);
    }
  }
       
        

?>

<br>
<h2 class="title">Bid info</h2>	
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Price</th>
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
    
  
      <?php
         include 'includes/config.inc.php';
         $AdsId = $_SESSION['Ads_Id'];
         $sql = "SELECT * FROM mybids WHERE AdsId = '$AdsId'";
         $result = mysqli_query($con,$sql);
 
         if(mysqli_num_rows($result)>0){
             while($row = mysqli_fetch_assoc($result)){
              bidders($row['Buyer'], $row['buyer_email'], $row['phone'], $row['price'], $row['bid_date']);
             }
         }else{
             echo 'No Bidder';
         }
         
 
      ?>
   
    </tbody>
    
    
</table>
</div>

<?php
  include_once'footer.php';
?>
