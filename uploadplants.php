<?php
 include_once'header.php';
 include_once'includes/components.inc.php';
 
?>


<?php
  
    if (isset($_SESSION["usersuid"])){
        $seller = $_SESSION["usersuid"];

    }


    $msg="";
    if (isset($_POST['upload'])){
        $target = "images/".basename($_FILES['image']['name']);

        $db = mysqli_connect("localhost", "root", "", "infinitegreendb");
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $image = $_FILES['image']['name'];
        $product_description = $_POST['product_description'];


        if(empty($product_name) || empty($product_price) || empty($image) || empty($product_description)){
            header("location: ../infinitegreen/myshop.php?error=emptyinput");
            exit();
        }
        else{
            $sql = "INSERT INTO producttb (product_name, product_price, product_image, seller, product_description) VALUES ('$product_name', ' $product_price', '$image', '$seller', '$product_description')";
            mysqli_query($db, $sql);
            header("location: ../infinitegreen/uploadplants.php?success");
            exit();
            
        }
       
       
       
        

        
    }
    if (isset($_POST['product_id'])){
		$_SESSION['productid']=$_POST['product_id'];
		header("location: ../infinitegreen/seller_productdetails.php");
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

                <li class="act"><a href="upload-auction.php">Auction Plants</a></li>
				
				<li class="act"><a href="includes/logout.inc.php">Logout</a></li>
			</ul>
		
	        </div>  
        </div>
        <div class="col-2">
            <div class="profile-container">
                <div class= upload-container>
                    <h2>Sell Plant</h2>
                    <hr>
                    <form action="uploadplants.php" method="POST" enctype = "multipart/form-data">
                        <br>
                        <br>
                        <input type="hidden" name="size" value="1000000">
                        
                        <div> 
                            <input type="file" name="image" id="inpfile">
                        
                        </div>
                        <div> 
                             <input type="text" name="product_name" placeholder="Product name">
                            <div class="imagepreview" id="imagePreview">
                                <img src="" alt="Image Preview" class="image-preview__image">
                                <span class="image-preview__default-text">Image Preview</span>
                            </div>
                        </div>
                        <div> 
                             <input type="text" name="product_price" placeholder="Product Price">
                        </div>
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
<h2 class="title">My Plants</h2>

<table class="table">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
        include 'includes/config.inc.php';
        $sql = "SELECT * FROM producttb WHERE seller = '$seller'";
        $result = mysqli_query($connect,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                myplant($row['product_image'], $row['product_name'], $row['product_id']);
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