<?php
	include_once'header.php';
    include_once'includes/components.inc.php';
?>


<?php


if (isset($_SESSION["usersuid"])){
    $seller = $_SESSION["usersuid"];

}

if(isset($_POST['upload'])){

    include 'includes/config.inc.php';

    $target = "images/".basename($_FILES['image']['name']);

    $title = $_POST['product_name'];
    $image = $_FILES['image']['name'];
    $price = $_POST['starting_price'];
    $end_date = $_POST['end_date'];
    $product_description = $_POST['product_description'];

   
    

    

    if(empty($title) || empty($image) || empty($price) || empty($end_date) || empty($product_description)){
        header("location: ../infinitegreen/upload-auction.php?error");
        exit();
    }
    else{
        $sql = "INSERT INTO myads (title, image, seller, description, price, end_date) VALUES ('$title', '$image', '$seller', '$product_description', '$price', '$end_date')";
        mysqli_query($con, $sql);
        header("location: ../infinitegreen/upload-auction.php?success");
        exit();
        
    }

}
if (isset($_POST['view'])){
    $_SESSION['Ads_Id']=$_POST['Ads_Id'];
    header("location: ../infinitegreen/auction-info.php");
    }
?>



<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <div class="profile-menu">
		        <div class="image-container">
			        <img src="images/profile.jpg" alt="" class="profile-image">
	    	    </div>
			
			<ul>
				
					
				<?php 
					if (isset($_SESSION["usersuid"])){
						echo "<li class=\"active\"><a href=\"profile.php\">". $_SESSION["usersuid"] ."</a>";
	
					}
				?>
				
			
				
				
				
				<li class="act"><a href="">Notifications</a></li>
				
				<li class="act"><a href="uploadplants.php">Sell Plants</a></li>
				
				<li class="act"><a href="">Auction Plants</a></li>
				
				<li class="act"><a href="includes/logout.inc.php">Logout</a></li>
			</ul>
		
	        </div>  
        </div>
        <div class="col-2">
            <div class="profile-container">
                <div class= upload-container>
                    <h2>Auction Plant</h2>
                    <hr>
                    <form action="upload-auction.php" method="POST" enctype = "multipart/form-data">
        
                        <input type="hidden" name="size" value="1000000">
                        <br>
                        <div> 
                            <input type="file" name="image" id="inpfile">
                        </div>
                        
                        
                        <div> 
                             <input type="text"  name="product_name" placeholder="Product name">
                            
                             <div class="imagepreview" id="imagePreview">
                                <img src="" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text">Image Preview</span>
                            </div>
                        
                        </div>
                        <div> 
                             <input type="text" name="starting_price" placeholder="Starting Price">
                        </div>
                        <div>
                            <label>Auction End Date: </label>
                            <input type="date" id="end_date" name="end_date" value="2022-01-1-">
                            <p id="demo2"></p>
                        </div>

                        <script>

                            function aucfunc() {
                                var x = document.getElementById("end_date").value;
                                document.getElementById("demo2").innerHTML = x;

                            }

                        </script>
                        
                        <div>
                            <textarea name="product_description" id="" cols="40" rows="4" placeholder="Product Description"></textarea>
                        </div>
                        <div>
                            <input type="submit" name="upload" value="upload image">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<h2 class="title">My Auction Post</h2>


<table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include 'includes/config.inc.php';
        $sql = "SELECT * FROM myads WHERE seller = '$seller'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                auction($row['image'], $row['title'], $row['AdsId']);
            }
        }else{
            echo 'No Post';
        }
        

    ?>
        
    </tbody>

</table>


<script>
    const inpfile = document.getElementById("inpfile");
    const previewContainer = document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const previewDefaultText= previewContainer.querySelector(".image-preview__default-text");

   inpfile.addEventListener("change", function(){
       const file = this.files[0];

       if (file) {
           const reader = new FileReader();

           previewDefaultText.style.display = "none";
           previewImage.style.display = "block";

           reader.addEventListener("load", function(){
                
                previewImage.setAttribute("src", this.result);
           });

           reader.readAsDataURL(file);
       }else{
           previewDefaultText.style.display = null;
           previewImage.style.display = null;
           previewImage.setAttribute("src", "");
       }
   });

</script>

</div>
<?php
	include_once'footer.php';
?>