<?php
    include_once'header.php';
    include_once'includes/components.inc.php';

?>

<?php
    if(isset($_SESSION['usersuid'])){
        if (isset($_POST['Bid'])){
            $_SESSION['Bid']=$_POST['Bid'];
            header("location: ../infinitegreen/Bidding.php");
        }
    }else{
        if(isset($_POST['Bid'])){
            header("location: ../infinitegreen/login.php");
            }
    }
?>
<br>
<h2 class="title">Auction</h2>
<table class="table">
    <thead>
      <tr>
        <th>Plant</th>
        <th>Name</th>
        <th>End Date</th>
        <th>Price</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

    <tbody>
    <?php
        if (isset($_SESSION["usersuid"])){
            $seller = $_SESSION["usersuid"];
        
        
            include 'includes/config.inc.php';

            $sql = "SELECT * FROM myads WHERE NOT seller = '$seller'";
            $result = mysqli_query($connect,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    auction_post($row['image'], $row['title'], $row['end_date'], $row['price'], $row['AdsId']);
                }
            }else{
                echo 'No Posts';
            }
        }else{
            include 'includes/config.inc.php';

            $sql = "SELECT * FROM myads";
            $result = mysqli_query($con,$sql);

            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    auction_post($row['image'], $row['title'], $row['end_date'], $row['price'], $row['AdsId']);
                }
            }else{
                echo 'No Posts';
            }
        }
        

    ?>
        
    </tbody>
</table>
</div>
<?php
	include_once'footer.php';
?>